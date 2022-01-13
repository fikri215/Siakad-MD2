@extends('template_backend.home')
@section('heading', 'Jadwal Guru')
@section('heading')
    Jadwal Guru {{ Auth::user()->guru(Auth::user()->id_card)->nama_guru }}
@endsection
@section('page')
  <div class="breadcrumb-item active">Jadwal Guru</div>
@endsection
@section('content')
<div class="col-md-12">
        <div class="card-header"></div>
        <div class="card-body">
          <table id="" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Kelas</th>
                    <th>Jam Mengajar</th>
                    <th>Ruang Kelas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $data)
                <tr>
                    <td>{{ $data->hari}}</td>
                    <td>{{ $data->kelas->nama_kelas }}</td>
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
        $("#JadwalGuru").addClass("active");
    </script>
@endsection