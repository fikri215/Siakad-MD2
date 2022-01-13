@extends('template_backend.home')
@section('heading', 'Nilai Rapot')
@section('page')
  <div class="breadcrumb-item active">Nilai Rapot</div>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
      <div class="card-header">
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <table id="example2" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Kelas</th>
                  <th>Aksi</th>
              </thead>
              <tbody>
                @foreach ($kelas as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_kelas }}</td>
                    <td><a href="{{ route('rapot-siswa', Crypt::encrypt($data->id)) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-eye"></i> &nbsp; Details</a></td>
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
      $("#Rapot").addClass("active");
    </script>
@endsection