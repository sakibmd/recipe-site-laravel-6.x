@extends('layouts.backend.app')

@section('title', 'profile-info')


@section('content')



@if (session()->has('success'))
<div class="alert alert-success m-3 text-center" id="success" role="alert">
  {{ session()->get('success') }}
   </div>
@endif 


<div class="row">
    <div class="col-md-4"></div>
<div class="col-md-4">
    <div class="card">
        <div class="card-body">
          <h3 class="card-title">Profile Info</h3>
          <hr>
        <p>Name: <strong>{{ $user->name }}</strong></p>
        <p>Email: <strong>{{ $user->email }}</strong></p>
        <p>Contact: <strong>{{ $user->contact }}</strong></p>
        <p>Age: <strong>{{ $user->age }}</strong></p>
        <a href="{{ route('admin.profile.edit') }}" class="btn btn-success">Edit</a>
        <a href="{{ URL::previous()  }}" class="btn btn-danger">Back</a>
        </div>
      </div>
</div>
<div class="col-md-4"></div>


</div>

@endsection

<script>
    setTimeout(function() {
      $('#success').fadeOut('fast');
}, 5000);
</script>





