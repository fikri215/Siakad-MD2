@extends('template_backend.home')
@section('heading', 'Input Nilai Ulangan')
@section('page')
  <div class="breadcrumb-item active">Input Nilai Ulangan</div>
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
                        <td>Nama Kelas</td>
                        <td>:</td>
                        <td>{{ $kelas->nama_kelas }}</td>
                    </tr>
                    <tr>
                        <td>Wali Kelas</td>
                        <td>:</td>
                        <td>{{ $kelas->guru->nama_guru }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Siswa</td>
                        <td>:</td>
                        <td>{{ $siswa->count() }}</td>
                    </tr>
                    <tr>
                        <td>Mata Pelajaran</td>
                        <td>:</td>
                        <td>{{ $guru->mapel->nama_mapel }}</td>
                    </tr>
                    <tr>
                        <td>Guru Mata Pelajaran</td>
                        <td>:</td>
                        <td>{{ $guru->nama_guru }}</td>
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
                    <table  id="example2" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="ctr">No.</th>
                                <th>Nama Siswa</th>
                                <th class="ctr">UH 1</th>
                                <th class="ctr">UH 2</th>
                                <th class="ctr">UTS</th>
                                <th class="ctr">UH 3</th>
                                <th class="ctr">UH 4</th>
                                <th class="ctr">UH 5</th>
                                <th class="ctr">UH 6</th>
                                <th class="ctr">UAS</th>
                                <th class="ctr">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="" method="post">
                                @csrf
                                <input type="hidden" name="guru_id" value="{{$guru->id}}">
                                <input type="hidden" name="kelas_id" value="{{$kelas->id}}">
                                @foreach ($siswa as $data)
                                    <input type="hidden" name="siswa_id" value="{{$data->id}}">
                                    <tr>
                                        <td class="ctr">{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $data->nama_siswa }}
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['id'])
                                                <input type="hidden" name="ulangan_id" class="ulangan_id_{{$data->id}}" value="{{ $data->ulangan($data->id)->id }}">
                                            @else
                                                <input type="hidden" name="ulangan_id" class="ulangan_id_{{$data->id}}" value="">
                                            @endif
                                        </td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['ulha_1'])
                                                {{-- <div class="text-center">{{ $data->ulangan($data->id)['ulha_1'] }}</div>
                                                <input type="hidden" name="ulha_1" class="ulha_1_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulha_1'] }}"> --}}
                                                <input type="text" name="ulha_1" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulha_1_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulha_1'] }}" autocomplete="off">
                                            @else
                                                <input type="text" name="ulha_1" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulha_1_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['ulha_2'])
                                                {{-- <div class="text-center">{{ $data->ulangan($data->id)['ulha_2'] }}</div> --}}
                                                {{-- <input name="ulha_2" style="margin: auto;" class="form-control text-center ulha_2_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulha_2'] }}"> --}}
                                                <input type="text" name="ulha_2" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulha_2_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulha_2'] }}" autocomplete="off">
                                            @else
                                                <input type="text" name="ulha_2" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulha_2_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['uts'])
                                                {{-- <div class="text-center">{{ $data->ulangan($data->id)['uts'] }}</div>
                                                <input type="hidden" name="uts" class="uts_{{$data->id}}" value="{{ $data->ulangan($data->id)['uts'] }}"> --}}
                                                <input type="text" name="uts" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center uts_{{$data->id}}" value="{{ $data->ulangan($data->id)['uts'] }}" autocomplete="off">
                                            @else
                                                <input type="text" name="uts" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center uts_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['ulha_3'])
                                                {{-- <div class="text-center">{{ $data->ulangan($data->id)['ulha_3'] }}</div>
                                                <input type="hidden" name="ulha_3" class="ulha_3_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulha_3'] }}"> --}}
                                                <input type="text" name="ulha_3" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulha_3_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulha_3'] }}" autocomplete="off">
                                            @else
                                                <input type="text" name="ulha_3" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulha_3_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['ulha_4'])
                                                {{-- <div class="text-center">{{ $data->ulangan($data->id)['ulha_4'] }}</div>
                                                <input type="hidden" name="ulha_4" class="ulha_4_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulha_4'] }}"> --}}
                                                <input type="text" name="ulha_4" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulha_4_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulha_4'] }}" autocomplete="off">
                                            @else
                                                <input type="text" name="ulha_4" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulha_4_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['ulha_5'])
                                                {{-- <div class="text-center">{{ $data->ulangan($data->id)['ulha_5'] }}</div>
                                                <input type="hidden" name="ulha_5" class="ulha_5_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulha_5'] }}"> --}}
                                                <input type="text" name="ulha_5" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulha_5_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulha_5'] }}" autocomplete="off">
                                            @else
                                                <input type="text" name="ulha_5" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulha_5_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['ulha_6'])
                                                {{-- <div class="text-center">{{ $data->ulangan($data->id)['ulha_6'] }}</div>
                                                <input type="hidden" name="ulha_6" class="ulha_6_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulha_6'] }}"> --}}
                                                <input type="text" name="ulha_6" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulha_6_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulha_6'] }}" autocomplete="off">
                                            @else
                                                <input type="text" name="ulha_6" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulha_6_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['uas'])
                                                {{-- <div class="text-center">{{ $data->ulangan($data->id)['uas'] }}</div>
                                                <input type="hidden" name="uas" class="uas_{{$data->id}}" value="{{ $data->ulangan($data->id)['uas'] }}"> --}}
                                                <input type="text" name="uas" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center uas_{{$data->id}}" value="{{ $data->ulangan($data->id)['uas'] }}" autocomplete="off">
                                            @else
                                                <input type="text" name="uas" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center uas_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr sub_{{$data->id}}">
                                            {{-- @if ($data->ulangan($data->id)) --}}
                                            {{-- @if (!empty($data->ulangan($data->id)['ulha_1']) && !empty($data->ulangan($data->id)['ulha_2']) && !empty($data->ulangan($data->id)['ulha_3'])  && !empty($data->ulangan($data->id)['ulha_4'])  && !empty($data->ulangan($data->id)['ulha_5'])  && !empty($data->ulangan($data->id)['ulha_6'])  && !empty($data->ulangan($data->id)['uts'])  && !empty($data->ulangan($data->id)['uas']))
                                                <i class="fas fa-check" style="font-weight:bold;"></i>
                                            @else
                                            @endif --}}
                                            <button type="button" id="submit-{{$data->id}}" class="btn btn-default btn_click" data-id="{{$data->id}}"><i class="nav-icon fas fa-save"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </form>
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
        $(".btn_click").click(function(){
            var id = $(this).attr('data-id');
            var ulha_1 = $(".ulha_1_"+id).val();
            var ulha_2 = $(".ulha_2_"+id).val();
            var uts = $(".uts_"+id).val();
            var ulha_3 = $(".ulha_3_"+id).val();
            var ulha_4 = $(".ulha_4_"+id).val();
            var ulha_5 = $(".ulha_5_"+id).val();
            var ulha_6 = $(".ulha_6_"+id).val();
            var uas = $(".uas_"+id).val();
            var ulangan_id = $(".ulangan_id_"+id).val();
            var guru_id = $("input[name=guru_id]").val();
            var kelas_id = $("input[name=kelas_id]").val();
            
            $.ajax({
                url: "{{ route('ulangan.store') }}",
                type: "POST",
                dataType: 'json',
                data 	: {
                    _token: '{{ csrf_token() }}',
                    id : ulangan_id,
                    siswa_id : id,
                    kelas_id : kelas_id,
                    guru_id : guru_id,
                    ulha_1 : ulha_1,
                    ulha_2 : ulha_2,
                    uts : uts,
                    ulha_3 : ulha_3,
                    ulha_4 : ulha_4,
                    ulha_5 : ulha_5,
                    ulha_6 : ulha_6,
                    uas : uas,
                },
                success: function(data){
                    toastr.success("Nilai ulangan siswa berhasil ditambahkan!");
                    location.reload();
                },
                error: function (data) {
                    toastr.warning("Errors 404!");
                }
            });
        });
        
        $("#NilaiGuru").addClass("active");
        $("#liNilaiGuru").addClass("menu-open");
        $("#UlanganGuru").addClass("active");
    </script>
@endsection