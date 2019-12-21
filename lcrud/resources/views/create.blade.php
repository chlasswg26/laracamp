@extends('layouts.main')
@section('content')

<h1> Create page </h1>

<br>

<div class="container">

@if ($errors->any())

  @foreach ($errors->all() as $error)
  <div class="alert alert-danger" role="alert">
  {{ $error }}
  </div>
  @endforeach

@endif

<!-- Extended material form grid -->
<form action="{{ route('store') }}" method="POST">

  {{ csrf_field() }}

  <!-- Grid row -->
  <div class="form-row">
    <!-- Grid column -->
    <div class="col-md-6">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="fname" name="firstname">
        <label for="fname">First Name</label>
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-6">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="lname" name="lastname">
        <label for="lname">Last Name</label>
      </div>
    </div>
    <!-- Grid column -->
  </div>
  <!-- Grid row -->

  <!-- Grid row -->
  <div class="row">
    <!-- Grid column -->
    <div class="col-md-12">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="email" class="form-control" id="mailto" name="email">
        <label for="mailto">Email Address</label>
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-12">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="nope" name="phone">
        <label for="nope">Phone</label>
      </div>
    </div>
    <!-- Grid column -->
  </div>
  <!-- Grid row -->
  <button type="submit" class="btn btn-primary btn-md">Add Data</button>
</form>
<!-- Extended material form grid -->
</div>

<br>

@endsection
