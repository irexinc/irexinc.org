@extends('layouts.default')

@section('content')
  @foreach ($speakers as $index => $speaker)

    <div class="content-block">
      <div class="title">{{ $speaker['date'] }} - {{ $speaker['name'] }}</div>
      {{ $speaker['view'] }}
    @if ($index == 11)
      <?php echo $speakers->links(); ?>
      </div>
    @else
      </div>
    @endif

  @endforeach

@endsection
