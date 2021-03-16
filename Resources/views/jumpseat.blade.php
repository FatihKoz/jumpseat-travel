@if(Auth::check())
  {{ Form::open(array('action' => '\Modules\JumpSeat\Controllers\JumpSeatController@jstravel', 'method' => 'get')) }}
    <div class="card mb-2">
      <div class="card-header p-1"><h5 class="m-1 p-0"><i class="fas fa-ticket-alt float-right"></i>JumpSeat Travel</h5></div>
      <div class="card-body p-1">
        <select name="newloc" id="destination" class="form-group input-group mt-1 mb-1 p-1">
          <option value="">Please Select Your Destination</option>
          @foreach($jairports as $destination)
            <option value="{{ $destination->id }}">{{ $destination->id }} : {{ $destination->name }} ({{ $destination->location }})</option>
          @endforeach
        </select>
      </div>
      <div class="card-footer p-1 text-right">
        @if ($price === 'free')
          <i class="fas fa-id-card fa-2x text-success float-left" title="Free ID Travel For Flight Crew"></i>
        @elseif ($price === 'auto')
          <i class="fas fa-money-bill-wave fa-2x text-danger float-left" title="Automatic Ticket Price Calculation"></i>
        @elseif ($price != 'free' && $price != 'auto')
          <i class="fas fa-money-bill fa-2x text-info float-left" title="Fixed Ticket Price: {{ $price }} {{ setting('units.currency') }}"></i>
        @endif
        <button class="btn btn-sm btn-primary" type="submit">Travel</button>
      </div>
      <input type="hidden" name="price" value="{{ $price }}">
      <input type="hidden" name="basep" value="{{ $basep }}">
      <input type="hidden" name="croute" value="{{ url()->full() }}">
    </div>
  {{ Form::close() }}
@endif
