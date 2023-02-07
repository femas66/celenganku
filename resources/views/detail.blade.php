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
  @if ($celengan->rencana == 'harian')
    <center><h4>{{ $celengan->harga_barang / $celengan->nominal }} Hari lagi</h4></center>
  @elseif ($celengan->rencana == 'mingguan')
    <center><h4>{{ $celengan->harga_barang / $celengan->nominal }} Minggu lagi</h4></center>
  @else
    <center><h4>{{ $celengan->harga_barang / $celengan->nominal }} Bulan lagi</h4></center>
  @endif
  @if (($celengan->terkumpul / $celengan->harga_barang) * (100) > 100)
    <p class="fw-normal" style="text-align: center;"><b>Progres : 100%</b></p>
    <div class="progress">
      <p class="fw-normal" style="text-align: center;">100%</p>
      <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  @else
    <p class="fw-normal" style="text-align: center;"><b>Progres : {{ ($celengan->terkumpul / $celengan->harga_barang) * (100) }}%</b></p>
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
  <div class="list-group">
    @for ($a = 0; $a < count($celengan->riwayat); $a++)
      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">{{ $celengan->riwayat[$a]->uang }}</h5>
          <small>{{ $celengan->riwayat[$a]->created_at }}</small>
        </div>
        <p class="mb-1">{{ $celengan->riwayat[$a]->deskripsi }}</p>
      </a>
      @endfor
  </div>
  <hr>
</div>
@endsection