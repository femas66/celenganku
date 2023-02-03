@extends('layout.master')
@section('content')
<style>
  .x {
    margin: 0 15px;
    text-decoration: none;
    color: rgb(131, 131, 131);
    font-size: 18px;
    position: relative;
    letter-spacing: 5px;
  }
  .x:hover {
    color: black;
  }
  .x:after {
    content: "";
    width: 0%;
    height: 2px;
    bottom: -2px;
    left: 50%;
    position: absolute;
    background-color: black;
    transition: .3s;
  }
  .x:hover:after {
    width: 100%;
    left: 0;
  }
  .f {
    margin: 0 15px;
    text-decoration: none;
    color: rgb(255, 0, 0);
    font-size: 18px;
    position: relative;
    letter-spacing: 5px;
  }
  .f:hover {
    color: rgb(255, 0, 0);
  }
  .f:after {
    content: "";
    width: 0%;
    height: 2px;
    bottom: -2px;
    left: 50%;
    position: absolute;
    background-color: rgb(255, 0, 0);
    transition: .3s;
  }
  .f:hover:after {
    width: 100%;
    left: 0;
  }
</style>
@if (Session::get('msg'))
  <script>Swal.fire(
    'Berhasil!',
    'Berhasil menghapus',
    'success'
  )</script>
@endif
<div class="container">
  <h2>Dashboard</h2>
  <hr>
  <a class="x" href="{{ route('tambahcelengan') }}">Buat Celengan</a>
  <a class="x f" href="{{ route('logout') }}" style="color: red;">Logout</a>
  <hr>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($celengan as $item)
      <?php
        $gambar = '/img/' . $item->img;
      ?>
      <div class="col">
        <div class="card">
          <a href="/tabungan/{{ $item->id }}"><img src="{{ url($gambar) }}" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <h5 class="card-title">{{ $item->harga_barang }}</h5>
            <p class="card-text">Uang terkumpul : {{ $item->terkumpul }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection