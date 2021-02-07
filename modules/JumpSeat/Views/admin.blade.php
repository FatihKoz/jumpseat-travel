@extends('admin.app')
@section('title', 'JumpSeat Travel Module')

@section('content')
  <div class="card border-blue-bottom">
    <div class="content">
      <p>This module is designed to provide JumpSeat Travel capability to phpVms through a configurable widget.</p>
      <p>&nbsp;</p>
      <p>
        3 types of JumpSeat travel is possible, free of charge, fixed price and automatic price according to travel distance.<br>
        For automatic price calculation, defining a base price (per nautical mile) is also possible but not mandatory.<br>
        While calling the widget you can define the options as below;
      </p>
      <p>
        <b>Widget::JumpSeat(['price' => 'free'])</b> or just <b>Widget::JumpSeat()</b> for free travel<br>
        <b>Widget::JumpSeat(['price' => 150])</b> for fixed ticket price (uses your settings -> currency)<br>
        <b>Widget::JumpSeat(['price' => 'auto'])</b> for automatic ticket price calculation with the default base price<br>
        <b>Widget::JumpSeat(['price' => 'auto', 'base'=> 0.22])</b> for automatic price calculation with your base price per nautical miles<br><br>
        The base price is directly multiplied with the great circle distance between airports, so setting them anything above 0.50 may hurt your pilots' budgets.
      </p>
      <p>Thanks Nabeel for his support during the development of this module. Until he makes the real deal for JumpSeat travel, enjoy this solution.</p>
      <p>By <a href="https://github.com/FatihKoz" target="_blank">B.Fatih KOZ</a> &copy; @php echo date('Y'); @endphp</p>
    </div>
  </div>
@endsection
