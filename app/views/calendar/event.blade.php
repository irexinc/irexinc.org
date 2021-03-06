
@if (!$event->isIREX())
<tr class="informational-meeting">
@elseif ($event->isCanceled())
<tr class="canceled-meeting">
@else
<tr>
@endif
  <td>{{ $event->getDate() }}</td>

  @if (trim($event->url) != "")
  <td><a href="{{{ $event->url }}}" target="_blank">{{ $event->title }}</a></td>
  @else
  <td>{{ $event->title }}</td>
  @endif

  @if (trim($event->location) == "Knights of Columbus")
  <td><a href="#knights-of-columbus">{{ $event->location }}</a></td>
  @elseif (trim($event->address) != "")
  <td><a href="https://www.google.com/maps/preview/place/{{{ $event->address }}}" target="_blank">{{ $event->location }}</a></td>
  @else
  <td>{{ $event->location }}</td>
  @endif
</tr>
