@extends('layouts.main')
@section('content')

<div class="container">
<h1> Home Page </h1>

@if (session('pesanSukses'))

<div class="alert alert-success" role="alert">
 {{ session('pesanSukses') }}
</div>

@endif

<table class="table table-responsive-md">

  <thead class="blue white-text">
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email </th>
      <th>Phone </th>
      <th>Action </th>
    </tr>
  </thead>

  <tbody>
  @if (count($students) > 0)
    
    @foreach($students as $student)

    <tr>
      <th scope="row">{{ $student->id }}</th>
      <td>{{ $student->first_name }}</td>
      <td>{{ $student->last_name }}</td>
      <td>{{ $student->email }}</td>
      <td>{{ $student->phone }}</td>
      <td><a class="btn btn-raised btn-primary btn-sm" href="{{ route('edit', $student->id) }}"> <i class="far fa-edit" aria-hidden="true"></i> </a>

       ||

          <form method="POST" id="delete-form-{{ $student->id }}" action="{{ route('delete', $student->id) }}" style="display: none;">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          </form>

          <button onclick="if (confirm('Are you sure to delete this data?')) {
          event.preventDefault();
          document.getElementById('delete-form-{{ $student->id }}').submit();
          
          } else {
            event.preventDefault();
          }
          " class="btn btn-raised btn-danger btn-sm"> <i class="far fa-trash-alt" aria-hidden="true"></i> </button>
     </td>
    </tr>

    @endforeach

    @else

    <tr>
        <th scope="row">-</th>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
    </tr>

    @endif

  </tbody>

</table>

          {{ $students->links() }}

</div>

@endsection
