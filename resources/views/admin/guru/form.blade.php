@extends('template_backend.home')
@section('heading', 'Tambah Guru')
@section('page')
  <div class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('guru.index') }}">Guru</a></div>
  <div class="breadcrumb-item active">Tambah Guru</div>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card-header">
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('guru.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                    <label for="nama_guru">Nama Guru</label>
                    <input type="text" id="nama_guru" name="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror">
            </div>
            <div class="form-group">
                    <label for="tmp_lahir">Tempat Lahir</label>
                    <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control @error('tmp_lahir') is-invalid @enderror">
            </div>
            <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror">
            </div>
            <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
            </div>
            <div class="form-group">
                    <label for="telp">Nomor Telpon/HP</label>
                    <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)" class="form-control @error('telp') is-invalid @enderror">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" id="nip" name="nip" onkeypress="return inputAngka(event)" class="form-control @error('nip') is-invalid @enderror">
            </div>
            <div class="form-group">
                    <label for="mapel_id">Mapel</label>
                    <select id="mapel_id" name="mapel_id" class="select2bs4 form-control @error('mapel_id') is-invalid @enderror">
                        <option value="">-- Pilih Mapel --</option>
                        @foreach ($mapel as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
                        @endforeach
                    </select>
            </div>
            @php
                    $kode = $max+1;
                    if (strlen($kode) == 1) {
                        $id_card = "0000".$kode;
                    } else if(strlen($kode) == 2) {
                        $id_card = "000".$kode;
                    } else if(strlen($kode) == 3) {
                        $id_card = "00".$kode;
                    } else if(strlen($kode) == 4) {
                        $id_card = "0".$kode;
                    } else {
                        $id_card = $kode;
                    }
                @endphp
            <div class="form-group">
                    <label for="id_card">Nomor ID Card</label>
                    <input type="text" id="id_card" name="id_card" maxlength="5" onkeypress="return inputAngka(event)" value="{{ $id_card }}" class="form-control @error('id_card') is-invalid @enderror" readonly>
            </div>
            <div class="form-group">
                    <label for="kode">Kode Jadwal</label>
                    <input type="text" id="kode" name="kode" maxlength="3" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('kode') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="foto">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input @error('foto') is-invalid @enderror" id="foto">
                        <label class="custom-file-label" for="foto">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <a href="{{ route('guru.index') }}"class="btn btn-secondary"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
        <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
    </div>
    </form>
    <!-- /.card -->
</div>
@endsection