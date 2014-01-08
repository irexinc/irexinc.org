@extends('layouts.default')

@section('title')
Calendar &middot; Indiana Real Estate Exchangors, Inc.
@stop

@section('content')
<div class="content-block">
  <div class="title">2014 Meeting Schedule - Indiana Real Estate Exchangors, Inc.</div>
  <div class="sub-title">Normal Meeting Time is 9:00 AM to Noon.</div>

  <p class="informational-meeting">Meetings listed in orange are for informational purposes only.</p>
  <p class="canceled-meeting">Meetings listed in red have been canceled.</p>

  <table>
    <tr class="header">
      <td>Date</td>
      <td>Title</td>
      <td>Location</td>
    </tr>

    @each('calendar.event', $events, 'event')

  </table>
</div>
@stop