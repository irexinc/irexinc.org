@extends('layouts.default')

@section('title')
Home &middot; Indiana Real Estate Exchangors, Inc.
@stop

@section('content')

  <div class="content-block next-meeting">
    <div class="title">Upcoming Meetings</div>

    <!-- Meetings -->
    <div class="left">
      @each('news.meeting', $meetings, 'meeting')
    </div>
    <!-- End Meetings -->

<!--
     <div class="right">
      <div class="schedule">
        <h4>Schedule</h4>

        <ul>
          <li><span>8:45am</span>Networking</li>
          <li><span>9:00am</span>Meeting Starts</li>
          <li><span>10:00am</span>Speaker(s)</li>
          <li><span>11:00am</span>Meeting Ends</li>
        </ul>

        <p>Donuts and coffee will be served.</p>
      </div>
    </div>
-->

  </div>


  <div class="content-block">
    <div class="title">Did you know?</div>

    <p>Indiana Real Estate Exchangors is on <a href="/facebook" target="_blank">Facebook</a>.</p>
  </div>
@stop