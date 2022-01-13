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
            <div class="col-md-1 mb-4"></div>
            <div class="col-md-3">
                <h5 class="card-title card-text mb-2 text-dark">Nama </h5><hr>
                <h5 class="card-title card-text mb-2 text-dark">NIP  </h5><hr>
                <h5 class="card-title card-text mb-2 text-dark">No Id Card </h5><hr>
                <h5 class="card-title card-text mb-2 text-dark">Guru Mapel </h5><hr>
                <h5 class="card-title card-text mb-2 text-dark">Kode Jadwal </h5><hr>
                <h5 class="card-title card-text mb-2 text-dark">Jenis Kelamin </h5><hr>
                <h5 class="card-title card-text mb-2 text-dark">Tempat Lahir </h5><hr>
                <h5 class="card-title card-text mb-2 text-dark">Tanggal Lahir </h5><hr>
                <h5 class="card-title card-text mb-2 text-dark">No. Telepon </h5><hr>
            </div>
            <div class="col-md-3">
                <h5 class="card-title card-text mb-2">: {{ $guru->nama_guru }}</h5><hr>
                <h5 class="card-title card-text mb-2">: {{ $guru->nip }}</h5><hr>
                <h5 class="card-title card-text mb-2">: {{ $guru->id_card }}</h5><hr>
                <h5 class="card-title card-text mb-2">: {{ $guru->mapel->nama_mapel }}</h5><hr>
                <h5 class="card-title card-text mb-2">: {{ $guru->kode }}</h5><hr>
                @if ($guru->jk == 'L')
                    <h5 class="card-title card-text mb-2">: Laki-laki</h5><hr>
                @else
                    <h5 class="card-title card-text mb-2">: Perempuan</h5><hr>
                @endif
                <h5 class="card-title card-text mb-2">: {{ $guru->tmp_lahir }}</h5><hr>
                <h5 class="card-title card-text mb-2">: {{ date('l, d F Y', strtotime($guru->tgl_lahir)) }}</h5><hr>
                <h5 class="card-title card-text mb-2">: {{ $guru->telp }}</h5><hr>
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