@extends('layouts.default')

@section('title')
Home &middot; Indiana Real Estate Exchangors, Inc.
@stop

@section('content')
  @if ( !empty($next_meeting) )
  <div class="content-block next-meeting">
    <div class="title">{{ $next_meeting['title'] }}

      @if ( $next_meeting['location'] != "TBD" )

        It will be located at

        @if ( !empty($next_meeting['address']) )
          <a href="https://maps.google.com/maps?q={{ $next_meeting['address'] }}&z=12" target="_blank"> {{ $next_meeting['location'] }}</a>.
        @else
          {{ $next_meeting['location'] }}.
        @endif

      @endif
    </div>
  </div>
  @endif

  <div class="content-block">
    <div class="title">Testimonial</div>

    <em>
      <p>Good afternoon,</p>

      <p>Networking works! Since I joined IREX, I have worked with about 30% of our
      members which resulted in ordering real estate support services from Affiliate
      Members, exchanges, sales, leases, lending relationships, and partner relationships.
      They include:</p>

      <table>
        <tr>
          <td>Brad Barkley</td>
          <td>Craig Heindel</td>
          <td>Jeff Watkins</td>
          <td>Chad Riddle</td>
        </tr>

        <tr>
          <td>Terry Winton</td>
          <td>Chance Bunger</td>
          <td>Phil Thrasher</td>
          <td>Greg Buttrey</td>
        </tr>

        <tr>
          <td>Matt Huffine</td>
          <td>Ron Tedrow</td>
          <td>Frank Redivide</td>
          <td>Donn Wray</td>
        </tr>

        <tr>
          <td>Clint Fultz</td>
          <td>Kelli Membreno</td>
          <td>Joy Kleinmaier</td>
          <td>Paul Littrell</td>
        </tr>

        <tr>
          <td>Bob Young</td>
          <td>Dale Smith</td>
          <td>Keith Kleinmaier</td>
          <td>Naji Ropkey</td>
        </tr>

        <tr>
          <td>Hugh Kennerk</td>
          <td>Kellie Taube</td>
          <td>Larry Oliver</td>
          <td>Gary Nicholson</td>
        </tr>
      </table>

      <p>Transactions included:

      <ul>
        <li>Services provided: tax appeals, title work, advertising, Phase I and II environmental studies, environmental legal representation, construction management contract; ranging from $500 to $400,000.
        <li>Individual retail leases with tenants’ gross rents ranging from $4,000 to over $300,000.
        <li>Dozens of other real estate transactions (mortgage loans, "hard money" loans, sales, and 1031 exchanges) ranging from $10,000 to over $5,000,000 dollars.
      </ul></p>

      <p>As a token of my appreciation and as an incentive to our members to promote
      membership growth for our IREX organization, <strong>I am offering a $50.00
      credit to any current
      <a href="{{ URL::to('by-laws') }}#membership">Active Member</a>
      (definition: Real Estate Broker or Salesperson) toward their membership dues
      for next year, 2014</strong>. Provided he/she brings in
      a new Active Member between now and our annual meeting in December 2013,
      when checks will be presented.</p>

      <p>In closing, I wish to express my sincere appreciation to you all and to our
      board of directors for your dedicated service to our organization.
      I have enjoyed being a member of IREX for the past 12 years and for which I have had
      the honor of serving as secretary, vice-president, president and board member.</p>

      <p>Thank You and Best Regards,<br>
      <strong>Ted Kleinmaier, CCIM</strong></p>
    </em>
  </div>

  <div class="content-block">
    <div class="title">Welcome</div>

    <p>We meet the <u>Second (2nd) and Fourth (4th) Thursday</u> of the month. Meetings
    take place at <strong><a href="https://maps.google.com/maps?q=1912%20N.%20Meridian,%20Indianapolis,%20IN&z=12">MIBOR</a></strong>.</p>

    <p>Networking starts around 8:45am and the meeting starts promptly at 9:00am.</p>

    <p>Coffee and doughnuts will be served.</p>

    <p>Actively licensed realtors/brokers are welcome as guests and encouraged to become a regular member.</p>
  </div>

  <div class="content-block">
    <div class="title">Did you know?</div>

    <p>Indiana Real Estate Exchangors is on <a href="/facebook" target="_blank">Facebook</a>.</p>
  </div>
@stop