<?php

namespace Modules\JumpSeat\Widgets;

use App\Contracts\Widget;
use App\Models\Airport;

class JumpSeat extends Widget
{
  protected $config = ['price' => 'free', 'base' => 0.13];

  public function run()
  {
    $jairports = Airport::select('id', 'name', 'location', 'country')->orderBy('id')->get();

    return view('JumpSeat::jumpseat', [
      'jairports' => $jairports,
      'price'     => $this->config['price'],
      'basep'     => $this->config['base'],
      ]);
  }
}
