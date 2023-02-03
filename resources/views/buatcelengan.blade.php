@extends('layout.master')
@section('content')
<div class="container">
  <h2>Buat Celengan</h2>
  <hr>
  <form action="{{ route('actiontambahcelengan') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="formFile" class="form-label">Gambar</label>
      <input class="form-control" type="file" id="formFile" name="file">
    </div>
    <div class="mb-3">
      <label for="nama_tabungan" class="form-label">Nama tabungan</label>
      <input type="text" class="form-control" id="nama_tabungan" placeholder="Nama tabungan" name="nama_tabungan">
    </div>
    <div class="mb-3">
      <label for="target" class="form-label">Target tabungan</label>
      <input type="number" class="form-control" id="target" placeholder="Target tabungan" name="target">
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" id="inlineRadio1" value="harian" name="rencana">
      <label class="form-check-label" for="inlineRadio1">Harian</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" id="inlineRadio2" value="mingguan" name="rencana">
      <label class="form-check-label" for="inlineRadio2">Mingguan</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" id="inlineRadio3" value="bulanan" name="rencana">
      <label class="form-check-label" for="inlineRadio3">Bulanan</label>
    </div>
    <hr>
    <div class="mb-3">
      <label for="nominal" class="form-label">Nominal</label>
      <input type="number" class="form-control" id="nominal" placeholder="Nominal" name="nominal">
    </div>
    <button type="submit" class="btn btn-primary">Buat</button>
  </form>
</div>
@endsection