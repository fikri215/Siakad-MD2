@extends('template_backend.home')
@section('heading', 'Buat Jadwal')
@section('page')
  <div class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('jadwal.index') }}">Jadwal</a></div>
  <div class="breadcrumb-item active">Buat Jadwal</div>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
      <div class="card-header">
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('jadwal.store') }}" method="post">
        @csrf
        <div class="card-body">
          <div class="row">
           <div class="col-md-6">
                <div class="form-group">
                  <label for="hari">Hari</label>
                  @php
                      $hari = array(
                        'Senin' => 'Senin',
                        'Selasa' => 'Selasa',
                        'Rabu' => 'Rabu',
                        'Kamis' => 'Kamis',
                        'Jumat' => 'Jumat'
                      )
                  @endphp
                  <select id="hari" name="hari" class="form-control form-select @error('hari') is-invalid @enderror select2bs4">
                      <option value="">-- Pilih Hari --</option>
                      @foreach ($hari as $val => $h)
                          <option value="{{ $val }}">{{ $h }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="kelas_id">Kelas</label>
                  <select id="kelas_id" name="kelas_id" class="form-control form-select @error('kelas_id') is-invalid @enderror select2bs4">
                      <option value="">-- Pilih Kelas --</option>
                      @foreach ($kelas as $data)
                          <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="guru_id">Kode Mapel</label>
                  <select id="guru_id" name="guru_id" class="form-control form-select @error('guru_id') is-invalid @enderror select2bs4">
                      <option value="">-- Pilih Kode Mapel --</option>
                      @foreach ($guru as $data)
                          <option value="{{ $data->id }}">{{ $data->kode }}</option>
                      @endforeach
                  </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="jam_mulai">Jam Mulai</label>
                  <input type='text' id="jam_mulai" name='jam_mulai' class="form-control @error('jam_mulai') is-invalid @enderror jam_mulai" placeholder="{{ Date('H:i') }}">
                </div>
                <div class="form-group">
                  <label for="jam_selesai">Jam Selesai</label>
                  <input type='text' id="jam_selesai" name='jam_selesai' class="form-control @error('jam_selesai') is-invalid @enderror" placeholder="{{ Date('H:i') }}">
                </div>
                <div class="form-group">
                  <label for="ruangan">Ruang Kelas</label>
                  @php
                      $ruang = array(
                        '10 AK' => '10 AK',
                        '10 AP' => '10 AP',
                        '10 PM' => '10 PM',
                        '11 AK' => '11 AK',
                        '11 AP' => '11 AP',
                        '11 PM' => '11 PM',
                        '12 AK' => '12 AK',
                        '12 AP' => '12 AP',
                        '12 PM' => '12 PM'
                      )
                  @endphp
                  <select id="ruangan" name="ruangan" class="form-control form-select @error('ruangan') is-invalid @enderror select2bs4">
                      <option value="">-- Pilih Ruang Kelas --</option>
                      @foreach ($ruang as $val => $r)
                          <option value="{{ $val }}">{{ $r }}</option>
                      @endforeach
                  </select>
                </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <a href="{{ route('jadwal.index') }}" name="kembali" class="btn btn-secondary" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
          <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
</div>
@endsection