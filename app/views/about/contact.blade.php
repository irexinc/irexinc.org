@extends('layouts.default')

@section('title')
Contact &middot; Indiana Real Estate Exchangors, Inc.
@stop

@section('content')

  <div class="content-block green success" id="success-message">
    <p>Contact successfully submitted.</p>
  </div>

  <div class="content-block">

    {{ Form::open(array('id' => 'contact-form', 'url' => 'contact', 'novalidate')) }}
      <dl class="form">

        <dt class="input-label">
          <label for="name">Name:</label>
        </dt>
        <dd >
          <input type="text" name="name" id="name" data-validation="required" />
        </dd>

        <dt class="input-label">
          <label for="email">E-Mail:</label>
        </dt>
        <dd>
          <input type="email" name="email" id="email" placeholder="example@example.com" data-validation="email" />
        </dd>

        <dt class="input-label">
          <label for="subject">Subject:</label>
        </dt>
        <dd>
          <input type="text" name="subject" id="subject" />
        </dd>

        <dt class="input-label">
          <label for="comments">Body:</label>
        </dt>
        <dd>
          <textarea name="comments" id="comments" placeholder="Details about your contact request." data-validation="required"></textarea>
        </dd>

      </dl>

      <div class="form-actions">
        <input type="reset" value="Clear"> <input type="submit" value="Submit">
      </div>
    {{ Form::close() }}
  </div>
@stop

@section('javascript')
<script>
  $.validate({
    form : '#contact-form',
    validateOnBlur : true,
    errorMessagePosition : 'top',
    scrollToTopOnError : false,
    onSuccess : function() {
      $.ajax({
        url : '/contact',
        type : 'post',
        data : $('#contact-form').serialize(),
        success : function() {
          // Reset the contact form so it looks like we 'reloaded' the page.
          $('#contact-form').get(0).reset();

          // Display the success message.
          $('#success-message').slideDown("slow").delay(3000).slideUp("slow");
        }
      });
      return false;
    }
  });
</script>
@stop