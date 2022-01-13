@extends('template_backend.home')
@section('heading', 'Trash Data Mapel')
@section('page')
  <div class="breadcrumb-item active">Trash Mapel</div>
@endsection
@section('content')
@php
    $no = 1;
@endphp
<div class="col-md-12">
  <div class="card-header">
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped table-hover">
      <thead>
          <tr>
              <th>No.</th>
              <th>Nama Mapel</th>
              <th>Jurusan</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
        @if ( $mapel->count() > 0 )
        @foreach ($mapel as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->nama_mapel }}</td>
            @if ( $data->paket_id == 9 )
              <td>{{ 'Semua' }}</td>
            @else
              <td>{{ $data->paket->ket }}</td>
            @endif
            <td>
                <form action="{{ route('mapel.kill', $data->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{ route('mapel.restore', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-undo"></i> &nbsp; Restore</a>
                    <button class="btn btn-danger btn-sm mt-2"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
            <tr>
              <td colspan='8' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Trash Mapel Kosong!</td>
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
        $("#TrashMapel").addClass("active");
    </script>
@endsection