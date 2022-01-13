@extends('template_backend.home')
@section('heading', 'Trash User')
@section('page')
  <div class="breadcrumb-item active">Trash User</div>
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
            <th>Username</th>
            <th>Email</th>
            <th>Level User</th>
            <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
        @if ( $user->count() > 0 )
        @foreach ($user as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="text-capitalize">{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->role }}</td>
            <td>
                <form action="{{ route('user.kill', $data->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{ route('user.restore', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-undo"></i> &nbsp; Restore</a>
                    <button class="btn btn-danger btn-sm mt-2"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                </form>
            </td>
          </tr>
        @endforeach
        @else
            <tr>
              <td colspan='8' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Trash User Kosong!</td>
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
        $("#TrashUser").addClass("active");
    </script>
@endsection