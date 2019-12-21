@extends('layouts.main')
@section('content')

<h1> Edit page </h1>

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
<form action="{{ route('update', $student->id) }}" method="POST">

  {{ csrf_field() }}

  <!-- Grid row -->
  <div class="form-row">
    <!-- Grid column -->
    <div class="col-md-6">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="fname" name="firstname" value="{{ $student->first_name }}">
        <label for="fname">First Name</label>
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-6">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="lname" name="lastname" value="{{ $student->last_name }}">
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
        <input type="email" class="form-control" id="mailto" name="email" value="{{ $student->email }}">
        <label for="mailto">Email Address</label>
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-12">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="nope" name="phone" value="{{ $student->phone }}">
        <label for="nope">Phone</label>
      </div>
    </div>
    <!-- Grid column -->
  </div>
  <!-- Grid row -->
  <button type="submit" class="btn btn-primary btn-md">Update Data</button>
</form>
<!-- Extended material form grid -->
</div>

<br>

@endsection
