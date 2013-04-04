@extends('layouts.default')

@section('content')
  <div class="content-block next-meeting">
    <div class="title">The next meeting is on {{ $next_meeting }}.</div>
  </div>

  <div class="content-block">
    <div class="title">Welcome</div>

    <p>We meet the <u>Second (2nd) and Fourth (4th) Thursday</u> of the month. Meetings
    take place at the <a href="/calendar#knights-of-columbus">Knights of Columbus</a>.</p>

    <p>Networking starts around 8:45am and the meeting starts promptly at 9:00am.</p>

    <p>Coffee and doughnuts will be served.</p>

    <p>Actively licensed realtors/brokers are welcome as guests and encouraged to become a regular member.</p>
  </div>

  <div class="content-block">
    <div class="title">Did you know?</div>

    <p>Indiana Real Estate Exchangors is on <a href="/facebook" target="_blank">Facebook</a>.</p>
  </div>
@stop