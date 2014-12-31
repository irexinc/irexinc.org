<div class="next-meeting-container">
  @if (!empty($meeting['address']))
    <h4>{{ $meeting['date'] }} at <a href="https://www.google.com/maps/preview/place/{{ $meeting['address'] }}" target="_blank">{{ $meeting['location'] }}</a>.</h4>
  @else
    <h4>{{ $meeting['date'] }} at {{ $meeting['location'] }}.</h4>
  @endif

  @if (!empty($meeting['speaker']))
  @include($meeting['speaker'])
  @endif
</div>
