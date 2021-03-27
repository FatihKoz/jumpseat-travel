@extends('admin.app')
@section('title', 'JumpSeat Travel Module')

@section('content')
  <div class="card border-blue-bottom">
    <div class="content">
      <p>This module is designed to provide JumpSeat Travel capability to phpVms through a configurable widget.</p>
      <p>&nbsp;</p>
      <p>
        3 types of JumpSeat travel are possible; Free of charge, fixed price and automatic price according to travel distance.<br>
        For automatic price calculation, defining a base price (per nautical mile) is also possible but not mandatory.<br>
        While using the widget you can define the options as below;
      </p>
      <p>
        <b>@widget('Modules\JumpSeat\Widgets\JumpSeat')</b> this is module default, provides free travel<br>
        <b>@widget('Modules\JumpSeat\Widgets\JumpSeat', ['price' => 'free'])</b> Same as above, free travel<br>
        <b>@widget('Modules\JumpSeat\Widgets\JumpSeat', ['price' => 150])</b> for fixed ticket price (uses your settings -> currency)<br>
        <b>@widget('Modules\JumpSeat\Widgets\JumpSeat', ['price' => 'auto'])</b> for automatic ticket price calculation with the default base price<br>
        <b>@widget('Modules\JumpSeat\Widgets\JumpSeat', ['price' => 'auto', 'base' => 0.20])</b> for automatic price calculation with your base price per nautical miles<br><br>
        The base price is directly multiplied with the great circle distance between airports, so setting them anything above 0.50 may hurt your pilots' budgets.
      </p>
      <p>Thanks Nabeel and Andreas for their support during the development of this module.</p>
      <p>By <a href="https://github.com/FatihKoz" target="_blank">B.Fatih KOZ</a> &copy; @php echo date('Y'); @endphp</p>
    </div>
  </div>
@endsection
