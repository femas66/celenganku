@extends('layout.master')
@section('content')
<div class="container">
  <h2>Tambah</h2>
  <hr>
  <form action="{{ route('tambahtabungan') }}" method="post">
    @csrf
    <input type="hidden" value="{{ $id_data }}" name="id">
    <input class="form-control" type="number" name="uang" id="uang" placeholder="Uang...">
    <textarea name="deskripsi" id="" cols="30" rows="10"></textarea>
    <hr>
    <button class="btn btn-primary" type="submit">Tambah</button>
  </form>
</div>
@endsection