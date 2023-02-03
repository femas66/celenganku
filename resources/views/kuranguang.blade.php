@extends('layout.master')
@section('content')
<div class="container">
  <h2>Kurang</h2>
  <hr>
  <form action="{{ route('kurangtabungan') }}" method="post">
    @csrf
    <input type="hidden" value="{{ $id_data }}" name="id">
    <input class="form-control" type="number" name="uang" id="uang" placeholder="Uang...">
    <hr>
    <button type="submit" class="btn btn-primary">Tambah</button>
  </form>
</div>
@endsection