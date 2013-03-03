@extends('layouts.default')

@section('content')
<div class="content-block">
  <div class="title">Forms</div>

  <ul>

    @each('documents.document', $forms, 'document')

  </ul>
</div>

<div class="content-block">
  <div class="title">Past Board Meeting Minutes</div>

  <ul>

    @each('documents.document', $minutes, 'document')

  </ul>
</div>
@stop