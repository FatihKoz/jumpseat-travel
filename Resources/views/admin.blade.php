@extends('admin.app')
@section('title', 'JumpSeat Travel Module')

@section('content')
  <div class="card border-blue-bottom">
    <div class="content">
      <p>This module is designed to provide JumpSeat Travel capability to phpVms through a configurable widget.With language support. Currently English, German and Spanish translations are provided.</p>
      <p>&bull; Possible options and usage examples are below;</p>
      <table class="table medium table-striped text-left" style="width: 80%; margin: 5px;">
        <tr>
          <th>@@widget('Modules\JumpSeat\Widgets\JumpSeat')</th>
          <td>This is module default, provides free travel</td>
        </tr>
        <tr>
          <th>@@widget('Modules\JumpSeat\Widgets\JumpSeat', ['price' => 'free'])</th>
          <td>Same as default, free travel</td>
        </tr>
        <tr>
          <th>@@widget('Modules\JumpSeat\Widgets\JumpSeat', ['price' => 150])</th>
          <td>Fixed ticket price (example: 150 {{ setting('units.currency') }})</td>
        </tr>
        <tr>
          <th>@@widget('Modules\JumpSeat\Widgets\JumpSeat', ['price' => 'auto'])</th>
          <td>Automatic ticket price calculation with the default base price</td>
        </tr>
        <tr>
          <th>@@widget('Modules\JumpSeat\Widgets\JumpSeat', ['price' => 'auto', 'base' => 0.20])</th>
          <td>Automatic price calculation with your base price per nautical miles (example: 0.20 {{ setting('units.currency') }}/nm)</td>
        </tr>
      </table>
      <p>&bull; The base price is directly multiplied with the great circle distance between airports, so setting them anything above 0.50 may hurt your pilots' budgets.</p>
      <hr>
      <p><b>Optional Theming</b></p>
      <p>
        Widget is visually compatible with my themes (Disposable v1) by default, but if you wish you can copy the widget blade file to your own theme folder and make visual changes there.
        To do this please create a folder inside your theme folder called <b>modules</b> and another one under it called <b>JumpSeat</b> (case sensetive) then copy <b>jumpseat.blade.php</b>
        file from <b>phpvms root: modules/JumpSeat/Resources/views/</b> to this new folder.<br>
        Final path will like <b>phpvms root: resources/views/layouts/Your Theme Folder/modules/JumpSeat/jumpseat.blade.php</b>
      </p>
      <p>&bull; You can repeat this step for every theme you have if you want customized blade for each of them.</p>
      <hr>
      <p>Thanks Nabeel, Andreas and translators (ARV187, Maco & GAE074) for their support during the development of this module.</p>
      <p>By <a href="https://github.com/FatihKoz" target="_blank">B.Fatih KOZ</a> &copy; @php echo date('Y'); @endphp</p>
    </div>
  </div>
@endsection
