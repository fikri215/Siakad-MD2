@extends('template_backend.home')
@section('heading', 'Lihat Rapot')
@section('page')
  <div class="breadcrumb-item active">Lihat Rapot</div>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
      <div class="card-header">
      </div>
      <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="example2" class="table" style="margin-top: -10px;">
                        <tr>
                            <td>Nama Siswa</td>
                            <td>:</td>
                            <td>{{ $siswa->nama_siswa }}</td>
                        </tr>
                        <tr>
                            <td>No Induk Siswa</td>
                            <td>:</td>
                            <td>{{ $siswa->no_induk }}</td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td>{{ $siswa->nis }}</td>
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
                </div>
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
                                @foreach ($mapel as $val => $data)
                                    <?php $data = $data[0]; ?>
                                    <tr>
                                        @php
                                            $array = array('mapel' => $val, 'siswa' => $siswa->id);
                                            $jsonData = json_encode($array);
                                            $result = $data->cekSikap($jsonData);
                                        @endphp
                                        @if ( $result == null )
                                        @else
                                        <td class="ctr">{{ $data->cekSikap($jsonData)['sikap_1'] }}</td>
                                        <td class="ctr">{{ $data->cekSikap($jsonData)['sikap_2'] }}</td>
                                        <td class="ctr">{{ $data->cekSikap($jsonData)['sikap_3'] }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                
                    <div class="col-md-12">
                        <h5 class="mb-3">B. Pengetahuan dan Keterampilan</h5>
                        <table id="example2" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="ctr" rowspan="2">No.</th>
                                    <th rowspan="2">Mata Pelajaran</th>
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
                                        <?php $data = $data[0]; ?>
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->mapel->nama_mapel }}</td>
                                            @php
                                                $array = array('mapel' => $val, 'siswa' => $siswa->id);
                                                $jsonData = json_encode($array);
                                                $result = $data->cekRapot($jsonData);
                                            @endphp

                                            @if ( $result == null )
                                            <td class="ctr">-</td>
                                            <td class="ctr">-</td>
                                            <td class="ctr">-</td>
                                            <td class="ctr">-</td>
                                            <td class="ctr">-</td>
                                            <td class="ctr">-</td>
                                            @else
                                            <td class="ctr">{{ $data->cekRapot($jsonData)['p_nilai'] }}</td>
                                            <td class="ctr">{{ $data->cekRapot($jsonData)['p_predikat'] }}</td>
                                            <td class="ctr">{{ $data->cekRapot($jsonData)['p_deskripsi'] }}</td>
                                            <td class="ctr">{{ $data->cekRapot($jsonData)['k_nilai'] }}</td>
                                            <td class="ctr">{{ $data->cekRapot($jsonData)['k_predikat'] }}</td>
                                            <td class="ctr">{{ $data->cekRapot($jsonData)['k_deskripsi'] }}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
</div>
@endsection
@section('script')
    <script>
        $("#Nilai").addClass("active");
        $("#liNilai").addClass("menu-open");
        $("#Rapot").addClass("active");
    </script>
@endsection
