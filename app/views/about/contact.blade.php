@extends('layouts.default')

@section('title')
Contact &middot; Indiana Real Estate Exchangors, Inc.
@stop

@section('content')
  <div class="content-block">
    {{ Form::open(array('url' => 'contact')) }}
      <dl class="form">

        <dt class="input-label">
          <label for="name">Name:</label>
        </dt>
        <dd >
          <input type="text" name="contact[name]" id="name" autofocus placeholder="Your Name"/>
        </dd>

        <dt class="input-label">
          <label for="email">E-Mail:</label>
        </dt>
        <dd>
          <input type="email" name="contact[email]" id="email" required placeholder="example@example.com" />
        </dd>

        <dt class="input-label">
          <label for="subject">Subject:</label>
        </dt>
        <dd>
          <input type="text" name="contact[subject]" id="subject" placeholder="Subject of Contact Request (Can be left blank)." />
        </dd>

        <dt class="input-label">
          <label for="comments">Body:</label>
        </dt>
        <dd>
          <textarea name="contact[comments]" id="comments" required placeholder="Details about your contact request."></textarea>
        </dd>

      </dl>

      <div class="form-actions">
        <input type="reset" value="Clear"> <input type="submit" value="Submit">
      </div>
    {{ Form::close() }}
  </div>
@stop
