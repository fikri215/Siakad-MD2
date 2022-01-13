@extends('template_backend.home')
@section('heading', 'Data Jadwal')
@section('page')
  <div class="breadcrumb-item active">Jadwal</div>
@endsection
@section('content')
<div class="col-md-12">
    
      <div class="card-header">
            <a href="{{ route('jadwal.form') }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-folder-plus"></i> &nbsp; TAMBAH JADWAL</a>   
          </div>
        
        <div class="card-body">
          <div class="table-responsive">
            <table id="myTable" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kelas</th>
                    <th>Hari</th>
                    <th>Mata Pelajaran</th>
                    <th>Jam Pelajaran</th>
                    <th>Ruang Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->kelas->nama_kelas }}</td>
                    <td>{{ $data->hari }}</td>
                    <td>
                        <h6 class="card-title mt-2 mb-n1">{{ $data->mapel->nama_mapel }}</h6>
                        <p class="card-text text-muted">{{ $data->guru->nama_guru }}</class=></p>
                    </td>
                    <td>{{ $data->jam_mulai }} - {{ $data->jam_selesai }}</td>
                    <td>{{ $data->ruangan }}</td>
                    <td>
                      <form action="{{ route('jadwal.destroy', $data->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('jadwal.edit',Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="return myFunction()"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                      </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>

          </div>
        </div>
        <!-- /.card-body -->
    
    <!-- /.card -->
</div>
<!-- /.col -->

  </div>
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataJadwal").addClass("active");
        $("#jam_mulai,#jam_selesai").timepicker({
            timeFormat: 'HH:mm'
        });
    
      function myFunction() {
        if(!confirm("Anda Yakin Ingin Menghapus Data Ini?"))
        event.preventDefault();
      };
    </script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
@endsection
