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

  </div>


  <div class="content-block">
    <div class="title">Did you know?</div>

    <p>Indiana Real Estate Exchangors is on <a href="/facebook" target="_blank">Facebook</a>.</p>
  </div>
@stop