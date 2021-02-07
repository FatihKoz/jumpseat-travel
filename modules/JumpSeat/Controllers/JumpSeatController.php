<?php

namespace Modules\JumpSeat\Controllers;

use App\Contracts\Controller;
use App\Models\User;
use App\Services\AirportService;
use App\Services\FinanceService;
use App\Support\Money;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Carbon;

class JumpSeatController extends Controller
{
  public function jstravel(Request $request)
  {
    // Get User Details
    $userid = Auth::user()->id;
    $user = User::find($userid);
    $userloc = $user->curr_airport_id;
    if (!$userloc) { $userloc = $user->home_airport_id; }
    // Get Form Values
    $price = $request->input('price');
    $basep = $request->input('basep');
    $croute = $request->input('croute');
    $newloc = $request->input('newloc');
    // Return If No Destination Set Or User Is Already At Selected Destination
    if (!$newloc || $newloc == $userloc) {
      flash()->error('JumpSeat travel not possible without a valid destination!');
      return redirect(url($croute));
    }
    // If Travel Is Free Move Pilot And Return
    if ($price === 'free') {
      $user->curr_airport_id = $newloc;
      $user->save();

      flash()->success('JumpSeat travel completed, you are at '.$newloc.' now.');
      return redirect(url($croute));
    }
    // If Automatic Price Is Set Calculate Distance And Define Ticket Price
    if ($price === 'auto') {
      $AirportSvc = app(AirportService::class);
      $traveldistance = $AirportSvc->calculateDistance($userloc, $newloc);
      $ticketprice = $basep * (string)$traveldistance;
    } else {
      $ticketprice = $price;
    }
    // Make Money Out Of Thin Air
    $ticketprice = Money::createFromAmount(ceil($ticketprice));
    // Check User Balance And Decide What To Do
    if ($ticketprice > $user->journal->balance) {   
      // User Can Not Afford The Ticket Price   
      flash()->error('JumpSeat travel not possible, not enough funds! You need at least '.$ticketprice);
      return redirect(url($croute));

    } elseif ($ticketprice < $user->journal->balance) {
      // Balance Is OK Proceed Transaction 
      $financeSvc = app(FinanceService::class);
      // Debit Ticket Price From User
        $financeSvc->debitFromJournal(
          $user->journal,
          $ticketprice,
          $user,
          'JumpSeat Travel',
          'JumpSeat',
          'jumpseat',
          Carbon::now()->format('Y-m-d')
        );
      // Credit Ticket Price To Airline
        $financeSvc->creditToJournal(
          $user->airline->journal,
          $ticketprice,
          $user,
          'JumpSeat Travel',
          'JumpSeat',
          'jumpseat',
          Carbon::now()->format('Y-m-d')
        );
      // Move Pilot To Destination
        $user->curr_airport_id = $newloc;
        $user->save();
      // Set Flash Messages With Relevant Information
      if ($price === 'auto') {
        flash()->success('JumpSeat travel completed, you are at '.$newloc.' now. Ticket price was '.$ticketprice.' for '.$traveldistance.' nm');
      } else {
        flash()->success('JumpSeat travel completed, you are at '.$newloc.' now. Ticket price was '.$ticketprice);
      }
      return redirect(url($croute));
    }
  }
  // Admin Page
  public function admin() { return view('JumpSeat::admin'); }
}
