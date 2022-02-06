@extends('template_backend.home')
@section('heading', 'Lihat Ulangan')
@section('page')
  <div class="breadcrumb-item active">Lihat Ulangan</div>
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
                        <td>No Induk Siswa</td>
                        <td>:</td>
                        <td>{{ $siswa->no_induk }}</td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td>:</td>
                        <td>{{ $siswa->nama_siswa }}</td>
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
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="ctr">No.</th>
                                <th>Mata Pelajaran</th>
                                <th class="ctr">UH 1</th>
                                <th class="ctr">UH 2</th>
                                <th class="ctr">UTS</th>
                                <th class="ctr">UH 3</th>
                                <th class="ctr">UH 4</th>
                                <th class="ctr">UH 5</th>
                                <th class="ctr">UH 6</th>
                                <th class="ctr">UAS</th>
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
                                            $result = $data->cekUlangan($jsonData);
                                        @endphp
                                        @if ( $result == null )
                                        <td class="ctr">-</td>
                                        <td class="ctr">-</td>
                                        <td class="ctr">-</td>
                                        <td class="ctr">-</td>
                                        <td class="ctr">-</td>
                                        <td class="ctr">-</td>
                                        <td class="ctr">-</td>
                                        <td class="ctr">-</td>
                                        @else
                                        <td class="ctr">{{ $data->cekUlangan($jsonData)['ulha_1'] }}</td>
                                        <td class="ctr">{{ $data->cekUlangan($jsonData)['ulha_2'] }}</td>
                                        <td class="ctr">{{ $data->cekUlangan($jsonData)['uts'] }}</td>
                                        <td class="ctr">{{ $data->cekUlangan($jsonData)['ulha_3'] }}</td>
                                        <td class="ctr">{{ $data->cekUlangan($jsonData)['ulha_4'] }}</td>
                                        <td class="ctr">{{ $data->cekUlangan($jsonData)['ulha_5'] }}</td>
                                        <td class="ctr">{{ $data->cekUlangan($jsonData)['ulha_6'] }}</td>
                                        <td class="ctr">{{ $data->cekUlangan($jsonData)['uas'] }}</td>
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
    <!-- /.card -->
</div>
@endsection
@section('script')
    <script>
        $("#Nilai").addClass("active");
        $("#liNilai").addClass("menu-open");
        $("#Ulangan").addClass("active");
    </script>
@endsection
