<tr<?php echo $event->getOutOfState() ?>>
  <td>{{ $event->getDate() }}</td>
  <td>{{ $event->title }}</td>
  @if (trim($event->location) == "Knights of Columbus")
  <td><a href="#knights-of-columbus">{{ $event->location }}</a></td>
  @elseif (trim($event->address) != "")
  <td><a href="https://maps.google.com/maps?q={{{ $event->address }}}&z=12">{{ $event->location }}</a></td>
  @else
  <td>{{ $event->location }}</td>
  @endif
</tr>
