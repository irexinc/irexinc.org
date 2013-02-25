@extends('layouts.default')

@section('content')
<div class="content-block">
  <div class="title">2013 Meeting Schedule - Indiana Real Estate Exchangors, Inc.</div>
  <div class="sub-title">Normal Meeting Time is 9:00 AM to Noon</div>

  <p class="note">Meetings listed in orange are for informational purposes only.</p>

  <table>
    <tr class="header">
      <td>Date</td>
      <td>Title</td>
      <td>Location</td>
    </tr>

    @foreach ($events as $event)

@include('events.event')

    @endforeach

  </table>
</div>

<!-- Google Maps -->
<div id="knights-of-columbus" class="content-block">
  <div class="title">Knights of Columbus</div>
  <iframe src="https://maps.google.com/maps?hl=en&amp;q=1305+North+Delaware+Street,+Indianapolis,+IN&amp;z=11&amp;output=embed"></iframe>
</div>
@stop