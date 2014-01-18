@extends('layouts.default')

@section('title')
Members &middot; Indiana Real Estate Exchangors, Inc.
@stop

@section('content')
  <div class="content-block">
    <div class="title">Board Members</div>

    <table class="members">
      <?php $count = 0; ?>

      @foreach ($members as $member)

        @if ($count == 0)
          <tr>
        @endif

        @if ( $member->isBoardMember() )
          @include('members.member')
          <?php $count++; ?>
        @endif

        @if ($count == 3)
          </tr>
          <?php $count = 0; ?>
        @endif

      @endforeach

      @if ($count > 0 and $count < 3)
        @for ($index = $count; ($index <= 3); $index++)
          <td></td>
        @endfor
        </tr>
      @endif

    </table>

  </div>

  <div class="content-block">
    <div class="title">Regular Members</div>

    <table class="members">
      <?php $count = 0; ?>

      @foreach ($members as $member)

        @if ($count == 0)
          <tr>
        @endif

        @if ( !$member->isBoardMember() )
          @include('members.member')
          <?php $count++; ?>
        @endif

        @if ($count == 3)
          <?php $count = 0; ?>
          </tr>
        @endif
      @endforeach

      @if ($count > 0 and $count < 3)
        @for ($index = $count; ($index <= 3); $index++)
          <td></td>
        @endfor
        </tr>
      @endif

    </table>

  </div>
@stop