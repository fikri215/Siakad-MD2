@extends('template_backend.home')
@section('heading', 'Nilai Ulangan')
@section('page')
  <div class="breadcrumb-item active"><a class="text-decoration-none" href="{{ route('ulangan-kelas') }}">Nilai Ulangan</a></div>
  <div class="breadcrumb-item active">{{ $kelas->nama_kelas }}</div>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
      <div class="card-header">
        <h3 class="card-title">
            <a href="{{ route('ulangan-kelas') }}" class="btn btn-default btn-sm"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Kembali</a>
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <table id="example1" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Siswa</th>
                  <th>No. Induk</th>
                  <th>Aksi</th>
              </thead>
              <tbody>
                @foreach ($siswa as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_siswa }}</td>
                    <td>{{ $data->no_induk }}</td>
                    <td><a href="{{ route('ulangan-show', Crypt::encrypt($data->id)) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-eye"></i> &nbsp; Lihat Ulangan</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
</div>
@endsection
@section('script')
    <script>
        $("#Nilai").addClass("active");
        $("#liNilai").addClass("menu-open");
        $("#Ulangan").addClass("active");
    </script>
@endsection