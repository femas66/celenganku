@extends('layout.master')
@section('content')
<div class="container">
  <h2>Detail</h2>
  <hr>
  <?php
  $gambar = '/img/' . $celengan->img;
  ?>
  <img src='{{ url($gambar) }}' class="img-fluid">
  <br>
  <p class="fw-bold" style="text-align: center;">Rp. {{ $celengan->harga_barang }}</>
  <hr>
  <center><h4>{{ $celengan->rencana }}</h4></center>
  <p class="fw-normal" style="text-align: center;">Progres</p>
  @if (($celengan->terkumpul / $celengan->harga_barang) * (100) > 100)
    <div class="progress">
      <p class="fw-normal" style="text-align: center;">100%</p>
      <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  @else
    <div class="progress">
      <div class="progress-bar" role="progressbar" style="width: {{ ($celengan->terkumpul / $celengan->harga_barang) * (100) }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><p class="fw-normal" style="text-align: center;">{{ ($celengan->terkumpul / $celengan->harga_barang) * (100) > 100 }}</p></div>
    </div>
  @endif
  <hr>
  <div class="table-responsive">
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th>Terkumpul</th>
        <th>Kurang</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Rp. {{ $celengan->terkumpul }}</td>
        @if ($celengan->harga_barang - $celengan->terkumpul <= 0)
            <td>Rp. 0</td>
        @else
            <td>Rp. {{ $celengan->harga_barang - $celengan->terkumpul }}</td>
        @endif
      </tr>
      @if ($celengan->harga_barang - $celengan->terkumpul <= 0)
        <tr>
          <td colspan="2"><b style="text-align: center;"><center>Selesai :D</center></b></td>
        </tr>
      @endif
    </tbody>
  </table>
  </div>
  <div class="btn-group" role="group" aria-label="Basic mixed styles example">
  @if (($celengan->terkumpul / $celengan->harga_barang) * (100) >= 100)
    <a href="/hapus/id/{{ $celengan->id }}" class="btn btn-warning">Hapus</a>
  @else
    @if ($celengan->terkumpul <= 0)
    <a href="/tabungan/tambah/{{ $celengan->id }}" class="btn btn-primary">Tambah</a>
    <a href="/hapus/id/{{ $celengan->id }}" class="btn btn-warning">Hapus</a>
    @else
    <a href="/tabungan/tambah/{{ $celengan->id }}" class="btn btn-primary">Tambah</a>
    <a href="/tabungan/kurang/{{ $celengan->id }}" class="btn btn-primary">Kurang</a>
    <a href="/hapus/id/{{ $celengan->id }}" class="btn btn-warning">Hapus</a>
    @endif  
    
  @endif
  </div>
  <br>
  <hr>
</div>
@endsection