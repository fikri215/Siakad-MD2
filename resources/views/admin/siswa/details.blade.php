@extends('template_backend.home')
@section('heading', 'Details Siswa')
@section('page')
  <div class="breadcrumb-item active"><a class="text-decoration-none" href="{{ route('siswa.index') }}">Siswa</a></div>
  <div class="breadcrumb-item active">Detail Siswa</div>
@endsection
@section('content')
<div class="col-md-12">
        <div class="card-header">
            <a href="{{ route('siswa.index') }}" class="btn btn-default btn-sm"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a>
        </div>
        <div class="card-body">
            <div class="row no-gutters ml-2 mb-2 mr-2">
                <div class="col-md-4">
                    <img src="{{ asset($siswa->foto) }}" class="card-img img-details" style="height: 500px" alt="...">
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                <table class="table">
                        <tr>
                            <td><b>Nama</b></td>
                            <td>:</td>
                            <td>{{ $siswa->nama_siswa }}</td>
                        </tr>
                        <tr>
                            <td><b>No Induk</b></td>
                            <td>:</td>
                            <td>{{ $siswa->no_induk }}</td>
                        </tr>
                        <tr>
                            <td><b>NISN</b></td>
                            <td>:</td>
                            <td>{{ $siswa->nis }}</td>
                        </tr>
                        <tr>
                            <td><b>Kelas</b></td>
                            <td>:</td>
                            <td>{{ $siswa->kelas->nama_kelas}}</td>
                        </tr>
                        <tr>
                            <td><b>Jenis Kelamin</b></td>
                            <td>:</td>
                            @if ($siswa->jk == 'L')
                            <td>Laki-laki</td>
                            @else
                            <td>Perempuan</td>
                            @endif
                        </tr>
                        <tr>
                            <td><b>Tempat Lahir</b></td>
                            <td>:</td>
                            <td>{{ $siswa->tmp_lahir }}</td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Lahir</b></td>
                            <td>:</td>
                            <td>{{ date('l, d F Y', strtotime($siswa->tgl_lahir)) }}</td>
                        </tr>
                        <tr>
                            <td><b>No Telepon</b></td>
                            <td>:</td>
                            <td>{{ $siswa->telp }}</td>
                        </tr>
                </table>
                </div>
            </div>
</div>
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataSiswa").addClass("active");
    </script>
@endsection