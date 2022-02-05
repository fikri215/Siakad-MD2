@extends('template_backend.home')
@section('heading', 'Tambah Siswa')
@section('page')
  <div class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('siswa.index') }}">Siswa</a></div>
  <div class="breadcrumb-item active">Tambah Siswa</div>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
      <div class="card-header">
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="row">
           <div class="col-md-6">
                <div class="form-group">
                        <label for="no_induk">Nomor Induk *</label>
                        <input type="text" id="no_induk" name="no_induk" value="{!! old('no_induk', $no_induk ?? '') !!}" onkeypress="return inputAngka(event)" class="form-control @error('no_induk') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa *</label>
                    <input type="text" id="nama_siswa" name="nama_siswa" value="{!! old('nama_siswa', $nama_siswa ?? '') !!}" class="form-control @error('nama_siswa') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin *</label>
                    <select id="jk" name="jk" class="select2bs4 form-control form-select @error('jk') is-invalid @enderror">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tmp_lahir">Tempat Lahir *</label>
                    <input type="text" id="tmp_lahir" name="tmp_lahir" value="{!! old('tmp_lahir', $tmp_lahir ?? '') !!}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input @error('foto') is-invalid @enderror" id="foto">
                            <label class="custom-file-label" for="foto">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nis">NISN *</label>
                    <input type="text" id="nis" name="nis" value="{!! old('nis', $nis ?? '') !!}" onkeypress="return inputAngka(event)" class="form-control @error('nis') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="kelas_id">Kelas *</label>
                    <select id="kelas_id" name="kelas_id" class="select2bs4 form-control form-select @error('kelas_id') is-invalid @enderror">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($kelas as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir *</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="{!! old('tgl_lahir', $tgl_lahir ?? '') !!}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="telp">Nomor Telpon/HP</label>
                    <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)" class="form-control @error('telp') is-invalid @enderror">
                </div>
            </div>
          </div>
          <label for=""><i>*) Wajib diisi</i></label>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <a href="{{ route('siswa.index') }}"class="btn btn-secondary"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
          <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
</div>
@endsection