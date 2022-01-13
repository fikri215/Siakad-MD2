@extends('template_backend.home')
@section('heading')
  Data Siswa Kelas {{ $kelas->nama_kelas }}
@endsection
@section('page')
  <div class="breadcrumb-item active"><a class="text-decoration-none" href="{{ route('siswa.index') }}">Siswa</a></div>
  <div class="breadcrumb-item">{{ $kelas->nama_kelas }}</div>
@endsection
@section('content')
<div class="col-md-12">
        <div class="card-header">
            <a href="{{ route('kelas.index') }}" class="btn btn-default btn-sm"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="myTable" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Foto</th>
                    <th>Nama Siswa</th>
                    <th>JK</th>
                    <th>No Induk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="{{ asset($data->foto) }}" data-toggle="lightbox" data-title="Foto {{ $data->nama_siswa }}" data-gallery="gallery" data-footer='<a href="{{ route('siswa.ubah-foto', Crypt::encrypt($data->id)) }}" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                                <img src="{{ asset($data->foto) }}" width="60px" class="img-fluid mb-2">
                            </a>
                            {{-- https://siakad.didev.id/siswa/ubah-foto/{{$data->id}} --}}
                        </td>
                        <td>{{ $data->nama_siswa }}</td>
                        <td>{{ $data->jk }}</td>
                        <td>{{ $data->no_induk }}</td>
                        <td>
                            <form action="{{ route('siswa.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('siswa.show', Crypt::encrypt($data->id)) }}" class="btn btn-info btn-sm mt-2"><i class="nav-icon fas fa-id-card"></i> &nbsp; Detail</a>
                                <a href="{{ route('siswa.edit', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
                                <button class="btn btn-danger btn-sm mt-2"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
</div>
<!-- /.col -->
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataSiswa").addClass("active");
    </script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
@endsection