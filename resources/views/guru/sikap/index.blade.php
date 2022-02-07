@extends('template_backend.home')
@section('heading', 'Absensi')
@section('page')
  <div class="breadcrumb-item active">Absensi</div>
@endsection
@section('content')
<div class="col-md-12">
  <div class="card-body">
    <div class="row">
      
      <div class="col-md-12">
        <table id="example2" class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>Nama Kelas</th>
              <th>Aksi</th>
          </thead>
          <tbody>
            @foreach ($kelas as $val => $data)
              @if(Auth::user()->guru(Auth::user()->id_card)->id == $data[0]->rapot($val)->guru->id)
                <tr>
                  <td>{{ $data[0]->rapot($val)->nama_kelas }}</td>
                  <td><a href="{{ route('absensi.show', Crypt::encrypt($val)) }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-pen"></i> &nbsp; Input Absensi</a></td>
                </tr>
              @else
              @endif
            @endforeach
          {{-- @else
          <tr>
            <td colspan="3">Anda Bukan Wali Kelas!</td>
          </tr>
          @endif --}}
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
  <script>
    $("#NilaiGuru").addClass("active");
    $("#liNilaiGuru").addClass("menu-open");
    $("#SikapGuru").addClass("active");
  </script>
@endsection