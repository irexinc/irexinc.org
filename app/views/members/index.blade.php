@extends('layouts.default')

@section('content')
  <div class="content-block">
    <div class="title">Board Members</div>

    <table class="members">
      <?php $count = 0; ?>

      @foreach ($members['board'] as $index => $member)
        @if ($index % 3 == 0)
          <tr>
        @endif

@include('members.member')

        @if ($index % 3 == 2)
          </tr>
        @endif

        <?php $count = $index; ?>
      @endforeach

      @if ($count % 3 != 2)
        @for ($index = $count; ($index % 3 != 2); $index++)
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

      @foreach ($members['regular'] as $index => $member)
        @if ($index % 3 == 0)
          <tr>
        @endif

@include('members.member')

        @if ($index % 3 == 2)
          </tr>
        @endif

        <?php $count = $index; ?>
      @endforeach

      @if ($count % 3 != 2)
        @for ($index = $count; ($index % 3 != 2); $index++)
          <td></td>
        @endfor
        </tr>
      @endif

    </table>

  </div>
@stop