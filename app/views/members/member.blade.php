<td>
  <b class="name">{{ $member->getFullName() }}</b><br>
  @if (!empty($member->title))
    <em><b>{{ $member->title }}</b></em><br>
  @endif
  @if (!empty($member->company))
    {{ $member->company }}<br>
  @endif
  @if ($member->getCityStateZip() != "")
    {{ $member->getCityStateZip() }}<br>
  @endif
  @if ($member->getPhone() != "")
    {{ $member->getPhone() }}<br>
  @endif
  @if (!empty($member->email))
    <a href="mailto:{{ $member->email }}">{{ $member->email }}</a>
  @endif
</td>
