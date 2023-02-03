@extends('layout.master')
@section('content')
<div class="container">
  <h2>Login</h2>
  <hr>
</style>
@if (Session::get('msg'))
  <script>Swal.fire(
    'Logout',
    'Berhasil logout',
    'success'
  )</script>
@endif
  <form action="{{ route('actionlogin') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
    </div>
    <div class="mb-3">
      <label for="f" class="form-label">Password</label>
      <input type="password" name="password" id="f" placeholder="*******" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
</div>  
@endsection