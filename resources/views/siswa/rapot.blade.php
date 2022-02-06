@extends('template_backend.home')
@section('heading', 'Nilai Rapot')
@section('page')
  <div class="breadcrumb-item active">Nilai Rapot</div>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
      <div class="card-header">
      </div>
      <!-- /.card-header -->
      <!-- form start -->
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <table class="table" style="margin-top: -10px;">
                    <tr>
                        <td>No Induk / NISN</td>
                        <td>:</td>
                        <td>{{ Auth::user()->no_induk }} / {{ Auth::user()->siswa(Auth::user()->no_induk)->nis }}</td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td>:</td>
                        <td class="text-capitalize">{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td>Nama Kelas</td>
                        <td>:</td>
                        <td>{{ $kelas->nama_kelas }}</td>
                    </tr>
                    <tr>
                        <td>Wali Kelas</td>
                        <td>:</td>
                        <td>{{ $kelas->guru->nama_guru }}</td>
                    </tr>
                    @php
                        $bulan = date('m');
                        $tahun = date('Y');
                    @endphp
                    <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td>
                            @if ($bulan > 6)
                                {{ 'Semester Ganjil' }}
                            @else
                                {{ 'Semester Genap' }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Tahun Pelajaran</td>
                        <td>:</td>
                        <td>
                            @if ($bulan > 6)
                                {{ $tahun }}/{{ $tahun+1 }}
                            @else
                                {{ $tahun-1 }}/{{ $tahun }}
                            @endif
                        </td>
                    </tr>
                </table>
                <hr>
                <h4 class="mb-3">CAPAIAN HASIL BELAJAR</h4>
                <hr>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h5 class="mb-3">A. Absensi</h5>
                        <table class="table table-bordered table-striped table-hover" style="width: 100px">
                            <thead>
                                <tr>
                                    <th class="ctr">Izin</th>
                                    <th class="ctr">Sakit</th>
                                    <th class="ctr">Alpa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (@empty($absen))
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                @else
                                <tr>
                                    <td>{{ $absen->sikap_1 }}</td>
                                    <td>{{ $absen->sikap_2 }}</td>
                                    <td>{{ $absen->sikap_3 }}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 mb-3">
                        <h5 class="mb-3">B. Pengetahuan dan Keterampilan</h5>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th rowspan="2">No.</th>
                                    <th rowspan="2">Mata Pelajaran</th>
                                    <th rowspan="2">KKM</th>
                                    <th class="ctr" colspan="3">Pengetahuan</th>
                                    <th class="ctr" colspan="3">Keterampilan</th>
                                </tr>
                                <tr>
                                    <th class="ctr">Nilai</th>
                                    <th class="ctr">Predikat</th>
                                    <th class="ctr">Deskripsi</th>
                                    <th class="ctr">Nilai</th>
                                    <th class="ctr">Predikat</th>
                                    <th class="ctr">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mapel as $val => $data)
                                    <tr>
                                        <?php $data = $data[0]; ?>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->mapel->nama_mapel }}</td>
                                        @if ( empty($data->nilai($val)) )
                                            
                                        <td class="ctr">-</td>
                                        <td class="ctr">-</td>
                                        <td class="ctr">-</td>
                                        <td class="ctr">-</td>
                                        <td class="ctr">-</td>
                                        <td class="ctr">-</td>
                                        <td class="ctr">-</td>
                                        @else
                                            
                                        {{-- <td class="ctr">{{ $data->kkm($data->guru_id) }}</td> --}}
                                        {{-- <td class="ctr">{{ $data->nilai($val)['p_nilai'] }}</td> --}}
                                        {{-- <td class="ctr">{{ $data->nilai($data->p_nilai) }}</td>
                                        <td class="ctr">{{ $data->nilai($data->p_predikat) }}</td>
                                        <td class="ctr">{{ $data->nilai($data->p_deskripsi) }}</td>
                                        <td class="ctr">{{ $data->nilai($data->k_nilai) }}</td>
                                        <td class="ctr">{{ $data->nilai($data->k_predikat) }}</td>
                                        <td class="ctr">{{ $data->nilai($data->k_deskripsi) }}</td> --}}
                                        <td class="ctr">{{ $data->kkm($data->nilai($val)['guru_id']) }}</td>
                                        <td class="ctr">{{ $data->nilai($val)['p_nilai'] }}</td>
                                        <td class="ctr">{{ $data->nilai($val)['p_predikat'] }}</td>
                                        <td class="ctr">{{ $data->nilai($val)['p_deskripsi'] }}</td>
                                        <td class="ctr">{{ $data->nilai($val)['k_nilai'] }}</td>
                                        <td class="ctr">{{ $data->nilai($val)['k_predikat'] }}</td>
                                        <td class="ctr">{{ $data->nilai($val)['k_deskripsi'] }}</td>
                                        @endif
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
</div>
@endsection
@section('script')
    <script>
        $("#RapotSiswa").addClass("active");
    </script>
@endsection