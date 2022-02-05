@extends('template_backend.home')
@section('heading', 'Data Guru')
@section('page')
  <div class="breadcrumb-item active">Data Guru</div>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card-header">
            <a href="{{ route('guru.form') }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-folder-plus"></i> &nbsp; TAMBAH GURU</a>       
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="myTable" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Id Card</th>
                <th>NIP</th>
                <th>JK</th>
                <th>Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guru as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="{{ asset($data->foto) }}" data-toggle="lightbox" data-title="Foto {{ $data->nama_guru }}" data-gallery="gallery" data-footer='<a href="{{ route('guru.ubah-foto', Crypt::encrypt($data->id)) }}" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                        <img src="{{ asset($data->foto) }}" width="60px" class="img-fluid mb-2">
                    </a>
                    {{-- https://siakad.didev.id/guru/ubah-foto/{{$data->id}} --}}
                </td>
                <td>{{ $data->nama_guru }}</td>
                <td>{{ $data->id_card }}</td>
                <td>{{ $data->nip }}</td>
                <td>{{ $data->jk }}</td>
                <td>{{ $data->mapel->nama_mapel }}</td>
                <td>
                    <form action="{{ route('guru.destroy', $data->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('guru.show', Crypt::encrypt($data->id)) }}" class="btn btn-info btn-sm mt-2"><i class="nav-icon fas fa-id-card"></i> &nbsp; Detail</a>
                        <a href="{{ route('guru.edit', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
                        <a href="{{ route('guru.ubah-foto', Crypt::encrypt($data->id)) }}" class="btn btn-warning btn-sm mt-2"><i class="nav-icon fas fa-edit"></i> &nbsp; Ubah Foto</a>
                        <button class="btn btn-danger btn-sm mt-2" onclick="return myFunction()"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>

@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataGuru").addClass("active");

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