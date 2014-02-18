<div class="next-meeting-container">
    <h4>{{ $meeting['date'] }} at <a href="https://www.google.com/maps/preview/place/{{ $meeting['address'] }}" target="_blank">{{ $meeting['location'] }}</a>.</h4>

    @if (!empty($meeting['speaker']))
    {{ $meeting['speaker'] }}
    @endif
</div>
