@extends('template_backend.home')
@section('heading', 'Data Jadwal')
@section('page')
  <div class="breadcrumb-item active">Jadwal</div>
@endsection
@section('content')
<div class="col-md-12">
    
      <div class="card-header">
            <a href="{{ route('jadwal.form') }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-folder-plus"></i> &nbsp; TAMBAH JADWAL</a>   
          </div>
        
        <div class="card-body">
          <div class="table-responsive">
            <table id="myTable" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kelas</th>
                    <th>Hari</th>
                    <th>Mata Pelajaran</th>
                    <th>Jam Pelajaran</th>
                    <th>Ruang Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->kelas->nama_kelas }}</td>
                    <td>{{ $data->hari }}</td>
                    <td>
                        <h6 class="card-title mt-2 mb-n1">{{ $data->mapel->nama_mapel }}</h6>
                        <p class="card-text text-muted">{{ $data->guru->nama_guru }}</class=></p>
                    </td>
                    <td>{{ $data->jam_mulai }} - {{ $data->jam_selesai }}</td>
                    <td>{{ $data->ruangan }}</td>
                    <td>
                      <form action="{{ route('jadwal.destroy', $data->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('jadwal.edit',Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
                        <button class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                      </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>

          </div>
        </div>
        <!-- /.card-body -->
    
    <!-- /.card -->
</div>
<!-- /.col -->

<!-- Extra large modal -->
{{-- <div class="modal fade bd-example-modal-lg tambah-jadwal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Tambah Data Jadwal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('jadwal.store') }}" method="post">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="hari_id">Hari</label>
                  <select id="hari_id" name="hari_id" class="form-control @error('hari_id') is-invalid @enderror select2bs4">
                      <option value="">-- Pilih Hari --</option>
                      @foreach ($hari as $data)
                          <option value="{{ $data->id }}">{{ $data->nama_hari }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="kelas_id">Kelas</label>
                  <select id="kelas_id" name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror select2bs4">
                      <option value="">-- Pilih Kelas --</option>
                      @foreach ($kelas as $data)
                          <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="guru_id">Kode Mapel</label>
                  <select id="guru_id" name="guru_id" class="form-control @error('guru_id') is-invalid @enderror select2bs4">
                      <option value="">-- Pilih Kode Mapel --</option>
                      @foreach ($guru as $data)
                          <option value="{{ $data->id }}">{{ $data->kode }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jam_mulai">Jam Mulai</label>
                  <input type='text' id="jam_mulai" name='jam_mulai' class="form-control @error('jam_mulai') is-invalid @enderror jam_mulai" placeholder="{{ Date('H:i') }}">
                </div>
                <div class="form-group">
                  <label for="jam_selesai">Jam Selesai</label>
                  <input type='text' id="jam_selesai" name='jam_selesai' class="form-control @error('jam_selesai') is-invalid @enderror" placeholder="{{ Date('H:i') }}">
                </div>
                <div class="form-group">
                  <label for="ruang_id">Ruang Kelas</label>
                  <select id="ruang_id" name="ruang_id" class="form-control @error('ruang_id') is-invalid @enderror select2bs4">
                      <option value="">-- Pilih Ruang Kelas --</option>
                      @foreach ($ruang as $data)
                          <option value="{{ $data->id }}">{{ $data->nama_ruang }}</option>
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
  </div> --}}
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataJadwal").addClass("active");
        $("#jam_mulai,#jam_selesai").timepicker({
            timeFormat: 'HH:mm'
        });
    </script>

    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
@endsection
