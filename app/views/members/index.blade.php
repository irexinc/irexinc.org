@extends('layouts.default')

@section('title')
Members &middot; Indiana Real Estate Exchangors, Inc.
@stop

@section('content')

  @foreach($roles as $role)

    @if (count($role->members) > 0)

      <div class="content-block">
        <div class="title">{{{ $role->getName() }}}</div>

        <table class="members">
          <?php $count = 0; ?>

          @foreach ($role->members as $member)

            @if ($count == 0)
              <tr>
            @endif

            @include('members.member')
            <?php $count++; ?>

            @if ($count == 3)
              </tr>
              <?php $count = 0; ?>
            @endif

          @endforeach

          @if ($count > 0 and $count < 3)
            @for ($index = $count; ($index < 3); $index++)
              <td></td>
            @endfor
            </tr>
          @endif

        </table>

      </div>

    @endif

  @endforeach

@stop
