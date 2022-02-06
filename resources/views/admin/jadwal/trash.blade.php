@extends('template_backend.home')
@section('heading', 'Trash Data Jadwal')
@section('page')
  <div class="breadcrumb-item active">Trash Jadwal</div>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card-header">
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Hari</th>
                    <th>Jadwal</th>
                    <th>Kelas</th>
                    <th>Jam Pelajaran</th>
                    <th>Ruang Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ( $jadwal->count() > 0 )
                @foreach ($jadwal as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->hari }}</td>
                    <td>
                        <h6 class="card-title mt-2 mb-n1">{{ $data->mapel->nama_mapel }}</h6>
                        <p class="card-text"><small class="text-muted">{{ $data->guru->nama_guru }}</small></p>
                    </td>
                    <td>{{ $data->kelas->nama_kelas }}</td>
                    <td>{{ $data->jam_mulai }} - {{ $data->jam_selesai }}</td>
                    <td>{{ $data->ruangan}}</td>
                    <td>
                        <form action="{{ route('jadwal.kill', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('jadwal.restore', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-undo"></i> &nbsp; Restore</a>
                            <button class="btn btn-danger btn-sm mt-2"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan='8' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Trash Jadwal Kosong!</td>
                    </tr>
                @endif
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $("#ViewTrash").addClass("active");
        $("#liViewTrash").addClass("menu-open");
        $("#TrashJadwal").addClass("active");
    </script>
@endsection