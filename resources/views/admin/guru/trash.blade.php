@extends('template_backend.home')
@section('heading', 'Trash Data Guru')
@section('page')
  <div class="breadcrumb-item active">Trash Guru</div>
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
                @if ( $guru->count() > 0 )
                @foreach ($guru as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ asset($data->foto) }}" data-toggle="lightbox" data-title="Foto {{ $data->nama_guru }}" data-gallery="gallery" data-footer='<a href="{{ route('guru.ubah-foto', Crypt::encrypt($data->id)) }}" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                            <img src="{{ asset($data->foto) }}" width="130px" class="img-fluid mb-2">
                        </a>
                        {{-- https://siakad.didev.id/guru/ubah-foto/{{$data->id}} --}}
                    </td>
                    <td>{{ $data->nama_guru }}</td>
                    <td>{{ $data->id_card }}</td>
                    <td>{{ $data->nip }}</td>
                    <td>{{ $data->jk }}</td>
                    <td>{{ $data->mapel->nama_mapel }}</td>
                    <td>
                        <form action="{{ route('guru.kill', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('guru.restore', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-undo"></i> &nbsp; Restore</a>
                            <button class="btn btn-danger btn-sm mt-2"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan='8' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Trash Guru Kosong!</td>
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
        $("#TrashGuru").addClass("active");
    </script>
@endsection