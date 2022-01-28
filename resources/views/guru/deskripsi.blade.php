@extends('template_backend.home')
@section('heading', 'Data Nilai')
@section('page')
  <div class="breadcrumb-item active">Deskripsi Nilai</div>
@endsection
@section('content')
@php
    $no = 1;
@endphp
<div class="col-md-12">
  <div class="card-body">
    <table id="example2" class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th rowspan="2">No.</th>
          <th rowspan="2">Mapel</th>
          <th rowspan="2">KKM</th>
          <th colspan="4" class="text-center">Predikat</th>
          <th rowspan="2" style="width: 150px">Aksi</th>
        </tr>
        <tr>
          <th>A</th>
          <th>B</th>
          <th>C</th>
          <th>D</th>
        </tr>
      </thead>
      <tbody>
          @if ( $nilai == null )
          <tr>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>
              <a href="{{ route('nilai.form') }}" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit"></i> &nbsp; Tambah </a> 
            </td>
          </tr>
          {{-- <a class=" btn btn-primary" href="{{ route('nilai.form') }}">Isi Deskripsi Nilai</a>     --}}
          @else
          <tr>
              <td>{{ $no }}</td>
              <td>{{ $guru->mapel->nama_mapel }}</td>
              <td>{{ $nilai->kkm }}</td>
              <td>{{ $nilai->deskripsi_a }}</td>
              <td>{{ $nilai->deskripsi_b }}</td>
              <td>{{ $nilai->deskripsi_c }}</td>
              <td>{{ $nilai->deskripsi_d }}</td>
              <td>
                <form action="{{ route('nilai.kill', $nilai->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{ route('nilai.form',Crypt::encrypt($nilai->id)) }}" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a> 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return myFunction()"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                </form>
            </td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
@endsection
@section('script')
    <script>
        function myFunction() {
            if(!confirm("Anda Yakin Ingin Menghapus Data Ini?"))
            event.preventDefault();
        };

        $("#Nilai").addClass("active");
        $("#liNilai").addClass("menu-open");
        $("#Deskripsi").addClass("active");
    </script>
@endsection