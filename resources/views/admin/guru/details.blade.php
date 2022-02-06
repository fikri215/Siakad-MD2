@extends('template_backend.home')
@section('heading', 'Detail Guru')
@section('page')
  <div class="breadcrumb-item active"><a class="text-decoration-none" href="{{ route('guru.index') }}">Guru</a></div>
  <div class="breadcrumb-item active">Detail Guru</div>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card-header">
        <a href="{{ route('guru.index') }}" class="btn btn-default btn-sm"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a>
    </div>
    <div class="card-body">
        <div class="row no-gutters ml-2 mb-2 mr-2">
            <div class="col-md-4">
                <img src="{{ asset($guru->foto) }}" class="card-img img-details" style="height: 500px;" alt="...">
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
            <table class="table">
                    <tr>
                        <td><b>Nama</b></td>
                        <td>:</td>
                        <td>{{ $guru->nama_guru }}</td>
                    </tr>
                    <tr>
                        <td><b>NIP</b></td>
                        <td>:</td>
                        <td>{{ $guru->nip }}</td>
                    </tr>
                    <tr>
                        <td><b>No ID Card</b></td>
                        <td>:</td>
                        <td>{{ $guru->id_card }}</td>
                    </tr>
                    <tr>
                        <td><b>Guru Mapel</b></td>
                        <td>:</td>
                        <td>{{ $guru->mapel->nama_mapel}}</td>
                    </tr>
                    <tr>
                        <td><b>Kode Jadwal</b></td>
                        <td>:</td>
                        <td>{{ $guru->kode }}</td>
                    </tr>
                    <tr>
                        <td><b>Jenis Kelamin</b></td>
                        <td>:</td>
                        @if ($guru->jk == 'L')
                            <td>Laki-laki</td>
                        @else
                            <td>Perempuan</td>
                        @endif
                    </tr>
                    <tr>
                        <td><b>Tempat Lahir</b></td>
                        <td>:</td>
                        <td>{{ $guru->tmp_lahir }}</td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Lahir</b></td>
                        <td>:</td>
                        <td>{{ date('l, d F Y', strtotime($guru->tgl_lahir)) }}</td>
                    </tr>
                    <tr>
                        <td><b>No Telepon</b></td>
                        <td>:</td>
                        <td>{{ $guru->telp }}</td>
                    </tr>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataGuru").addClass("active");
    </script>
@endsection