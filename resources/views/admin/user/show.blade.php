@extends('template_backend.home')
@section('heading')
  Data User @foreach ($role as $d => $data) {{ $d }} @endforeach
@endsection
@section('page')
  <div class="breadcrumb-item active"><a class="text-decoration-none" href="{{ route('user.index') }}">User</a></div>
  @foreach ($role as $d => $data)
    <div class="breadcrumb-item active">{{ $d }}</div>
  @endforeach
@endsection
@section('content')
<div class="col-md-12">
  <div class="card-header">
    <a href="{{ route('user.index') }}" class="btn btn-default btn-sm"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Kembali</a>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped table-hover">
      <thead>
          <tr>
              <th>No.</th>
              <th>Username</th>
              <th>Email</th>
              @foreach ($role as $d => $data)
                @if ($d == 'Guru')
                  <th>No Id Card</th>
                @elseif ($d == 'Siswa')
                  <th>No Induk Siswa</th>
                @else
                    
                @endif
              @endforeach
              {{-- <th>Tanggal Register</th> --}}
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
        @if ($user->count() > 0)
          @foreach ($user as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td class="text-capitalize">{{ $data->name }}</td>
              <td>{{ $data->email }}</td>
              @if ($data->role == 'Siswa')
                <td>{{ $data->no_induk }}</td>
              @elseif ($data->role == 'Guru')
                <td>{{ $data->id_card }}</td>
              @else
              @endif
              {{-- <td>{{ $data->created_at->format('l, d F Y') }}</td> --}}
              <td>
                <form action="{{ route('user.destroy', $data->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-sm" onclick="return myFunction()"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Silahkan Buat Akun Terlebih Dahulu!</td>
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

        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataUser").addClass("active");
    </script>
@endsection