@if(Auth::check())
  {{ Form::open(array('action' => '\Modules\JumpSeat\Http\Controllers\JumpSeatController@jstravel', 'method' => 'post')) }}
    @if(empty($dest))
      <div class="card mb-2">
        <div class="card-header p-1"><h5 class="m-1 p-0"><i class="fas fa-ticket-alt float-right"></i>@lang('JumpSeat::jstravel.jstitle')</h5></div>
        <div class="card-body p-1">
          <select name="newloc" id="destination" class="form-group input-group select2 mt-1 mb-1 p-1">
            <option value="">@lang('JumpSeat::jstravel.jsdropdown')</option>
            @foreach($jairports as $destination)
              <option value="{{ $destination->id }}">{{ $destination->id }} : {{ $destination->name }} ({{ $destination->location }})</option>
            @endforeach
          </select>
        </div>
        <div class="card-footer p-1 text-right">
          @if ($price === 'free')
            <i class="fas fa-id-card fa-2x text-success float-left" title="@lang('JumpSeat::jstravel.iconfree')"></i>
          @elseif ($price === 'auto')
            <i class="fas fa-money-bill-wave fa-2x text-danger float-left" title="@lang('JumpSeat::jstravel.iconauto')"></i>
          @elseif ($price != 'free' && $price != 'auto')
            <i class="fas fa-money-bill fa-2x text-info float-left" title="@lang('JumpSeat::jstravel.iconfixed') {{ $price }} {{ setting('units.currency') }}"></i>
          @endif
          <button class="btn btn-sm btn-primary" type="submit">@lang('JumpSeat::jstravel.jsbutton')</button>
        </div>
      </div>
    @elseif($dest && Auth::user()->curr_airport_id != $dest)
      <button class="btn btn-sm btn-primary" type="submit">@lang('JumpSeat::jstravel.jsbutton') | {{ strtoupper($dest) }}</button>
      <input type="hidden" name="newloc" value="{{ $dest }}">
    @endif
    <input type="hidden" name="price" value="{{ $price }}">
    <input type="hidden" name="basep" value="{{ $basep }}">
    <input type="hidden" name="croute" value="{{ url()->full() }}">
  {{ Form::close() }}
@endif
