@extends('template_backend.home')
@section('heading', 'Data Kelas')
@section('page')
  <div class="breadcrumb-item active">Data Kelas</div>
@endsection
@section('content')
<div class="col-md-12">
  <div class="card-header">
    <button type="button" class="btn btn-primary btn-sm" onclick="getCreateKelas()" data-toggle="modal" data-target="#form-kelas">
        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Kelas
    </button>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="table-responsive">
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
            @foreach ($kelas as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama_kelas }}</td>
                <td>{{ $data->jurusan->ket }}</td>
                <td>{{ $data->guru->nama_guru }}</td>
                <td>
                  <form action="{{ route('kelas.destroy', $data->id) }}" method="post">
                    @csrf
                    @method('delete') 
                    <a href="{{ route('siswa.kelas', Crypt::encrypt($data->id)) }}" class="btn btn-info btn-sm"><i class="nav-icon fas fa-users"></i> &nbsp; Lihat Siswa</a>
                    <a href="{{ route('jadwal.show', Crypt::encrypt($data->id)) }}" class="btn btn-warning btn-sm"><i class="nav-icon fas fa-calendar-alt"></i> &nbsp; Lihat Jadwal</a>
                        <button type="button" class="btn btn-success btn-sm" onclick="getEditKelas({{$data->id}})" data-toggle="modal" data-target="#form-kelas">
                          <i class="nav-icon fas fa-edit"></i> &nbsp; Edit
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="return myFunction()"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  <!-- /.card-body -->
  </div>
    <!-- /.card -->
</div>
<!-- /.col -->

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-md" id="form-kelas" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="judul"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('kelas.store') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <input type="hidden" id="id" name="id">
              <div class="form-group" id="form_nama"></div>
              <div class="form-group" id="form_jurusan"></div>
              <div class="form-group">
                <label for="guru_id">Wali Kelas *</label>
                <select id="guru_id" name="guru_id" class="select2bs4 form-control form-select @error('guru_id') is-invalid @enderror">
                  <option value="">-- Pilih Wali Kelas --</option>
                  @foreach ($guru as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
            <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
      </form>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
  <script>
    function getCreateKelas(){
      $("#judul").text('Tambah Data Kelas');
      $('#id').val('');
      $('#form_nama').html(`
        <label for="nama_kelas">Nama Kelas *</label>
        <input type='text' id="nama_kelas" onkeyup="this.value = this.value.toUpperCase()" name='nama_kelas' class="form-control @error('nama_kelas') is-invalid @enderror" placeholder="{{ __('Nama Kelas') }}">
      `);
      $('#nama_kelas').val('');
      $('#form_jurusan').html('');
      $('#form_jurusan').html(`
        <label for="jurusan_id">Jurusan *</label>
        <select id="jurusan_id" name="jurusan_id" class="select2bs4 form-control form-select @error('jurusan_id') is-invalid @enderror">
          <option value="">-- Pilih Jurusan --</option>
          @foreach ($paket as $data)
            <option value="{{ $data->id }}">{{ $data->ket }}</option>
          @endforeach
        </select>
      `);
      $('#guru_id').val('');
    }

    function getEditKelas(id){
      var parent = id;
      var form_jurusan = (`
        <input type="hidden" id="jurusan_id" name="jurusan_id">
        <input type="hidden" id="nama_kelas" name="nama_kelas">
      `);
      $.ajax({
        type:"GET",
        data:"id="+parent,
        dataType:"JSON",
        url:"{{ url('/kelas/edit/json') }}",
        success:function(result){
            // console.log(result);
          if(result){
            $.each(result,function(index, val){
              $("#judul").text('Edit Data Kelas ' + val.nama);
              $('#id').val(val.id);
              $('#form_nama').html('');
              $('#form_jurusan').html('');
              $("#form_jurusan").append(form_jurusan);
              $('#nama_kelas').val(val.nama);
              $("#jurusan_id").val(val.jurusan_id);
              $('#guru_id').val(val.guru_id);
            });
          }
        },
        error:function(){
          toastr.error("Errors 404!");
        },
        complete:function(){
        }
      });
    }

    function myFunction() {
      if(!confirm("Anda Yakin Ingin Menghapus Data Ini?"))
      event.preventDefault();
    };

    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataKelas").addClass("active");
    
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
    })
  </script>
@endsection