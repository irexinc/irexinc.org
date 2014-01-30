@extends('layouts.default')

@section('title')
Home &middot; Indiana Real Estate Exchangors, Inc.
@stop

@section('content')
  @if ( !empty($next_meeting) )
  <div class="content-block next-meeting">
    <div class="title">{{ $next_meeting['title'] }}

      @if ( !is_null($next_meeting['location']) && $next_meeting['location'] != "TBD" )

        It will be located at

        @if ( !empty($next_meeting['address']) )
          <a href="https://maps.google.com/maps?q={{ $next_meeting['address'] }}&mp;z=12" target="_blank"> {{ $next_meeting['location'] }}</a>.
        @else
          {{ $next_meeting['location'] }}.
        @endif

      @endif
    </div>
  </div>
  @endif

  <div class="content-block">
    <div class="title">Randie Dial speaks February 13th</div>

    <p>We are pleased to welcome Randie Dial from <a href="http://www.cliftonlarsonallen.com">CliftonLarsonAllen</a> to our meeting on <u>February 13th</u>. Randie will be speaking about business valuations and transfer issues related to new regulations.</p>

  </div>

  <div class="content-block">
    <div class="title">Welcome</div>

    <p>We meet the <u>Second (2nd) and Fourth (4th) Thursday</u> of the month. Meetings
    take place at <strong><a href="https://maps.google.com/maps?q=1912%20N.%20Meridian,%20Indianapolis,%20IN&mp;z=12">MIBOR</a></strong>.</p>

    <p>Networking starts around 8:45am and the meeting starts promptly at 9:00am.</p>

    <p>Coffee and doughnuts will be served.</p>

    <p>Actively licensed realtors/brokers are welcome as guests and encouraged to become a regular member.</p>
  </div>

  <div class="content-block">
    <div class="title">Did you know?</div>

    <p>Indiana Real Estate Exchangors is on <a href="/facebook" target="_blank">Facebook</a>.</p>
  </div>
@stop