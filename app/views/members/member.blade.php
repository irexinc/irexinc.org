<td>
    <b class="name">{{ $member->getName() }}</b><br>

  @if (!is_null($member->title))
    <em><b>{{ $member->title }}</b></em><br>
  @endif

  @if (!is_null($member->company))
    {{ $member->company }}<br>
  @endif

  @if ($member->getCityStateZip() != "")
    {{ $member->getCityStateZip() }}<br>
  @endif

  @if ($member->getPhone() != "")
    {{ $member->getPhone() }}<br>
  @endif

  @if (!is_null($member->email))
    <a href="mailto:{{ $member->email }}">{{ $member->email }}</a>
  @endif
</td>