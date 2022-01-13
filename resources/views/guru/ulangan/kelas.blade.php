@extends('template_backend.home')
@section('heading', 'Nilai Ulangan')
@section('page')
  <div class="breadcrumb-item active">Nilai Ulangan</div>
@endsection
@section('content')
<div class="col-md-12">
  <div class="card-header"></div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12" style="margin-top: -21px;">
          <table id="example2" class="table">
              <tr>
                  <td>Nama Guru</td>
                  <td>:</td>
                  <td>{{ $guru->nama_guru }}</td>
              </tr>
              <tr>
                  <td>Mata Pelajaran</td>
                  <td>:</td>
                  <td>{{ $guru->mapel->nama_mapel }}</td>
              </tr>
          </table>
          <hr>
      </div>
      <div class="col-md-12">
        <table id="example2" class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Kelas</th>
              <th>Aksi</th>
          </thead>
          <tbody>
            @foreach ($kelas as $val => $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data[0]->rapot($val)->nama_kelas }}</td>
                <td><a href="{{ route('ulangan.show', Crypt::encrypt($val)) }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-pen"></i> &nbsp; Input Nilai</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
  <script>
    $("#NilaiGuru").addClass("active");
    $("#liNilaiGuru").addClass("menu-open");
    $("#UlanganGuru").addClass("active");
  </script>
@endsection