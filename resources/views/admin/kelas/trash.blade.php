@extends('template_backend.home')
@section('heading', 'Trash Data Kelas')
@section('page')
  <div class="breadcrumb-item active">Trash Kelas</div>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card-header">
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Wali Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ( $kelas->count() > 0 )
            @foreach ($kelas as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama_kelas }}</td>
                <td>{{ $data->jurusan->ket }}</td>
                <td>{{ $data->guru->nama_guru }}</td>
                <td>
                    <form action="{{ route('kelas.kill', $data->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('kelas.restore', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-undo"></i> &nbsp; Restore</a>
                        <button class="btn btn-danger btn-sm mt-2"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
                <tr>
                    <td colspan='8' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Trash Kelas Kosong!</td>
                </tr>
            @endif
        </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
    <script>
        $("#ViewTrash").addClass("active");
        $("#liViewTrash").addClass("menu-open");
        $("#TrashKelas").addClass("active");
    </script>
@endsection