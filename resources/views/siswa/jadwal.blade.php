@extends('template_backend.home')
@section('heading')
    Jadwal Kelas {{ $kelas->nama_kelas }}
@endsection
@section('page')
  <div class="breadcrumb-item active">Jadwal Kelas</div>
@endsection
@section('content')
<div class="col-md-12">
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Mata Pelajaran</th>
                    <th>Jam Pelajaran</th>
                    <th>Ruang Kelas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $data)
                <tr>
                    <td>{{ $data->hari }}</td>
                    <td>
                        <h6 class="card-title mt-2 mb-n1">{{ $data->mapel->nama_mapel }}</h6>
                        <p class="card-text text-muted">{{ $data->guru->nama_guru }}</small></p>
                    </td>
                    <td>{{ $data->jam_mulai }} - {{ $data->jam_selesai }}</td>
                    <td>{{ $data->ruangan }}</td>
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
        $("#JadwalSiswa").addClass("active");
    </script>
@endsection