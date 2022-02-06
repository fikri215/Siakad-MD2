@extends('template_backend.home')
@section('heading', 'Dashboard')
@section('page')
@endsection
@section('precontent')
@if (Auth::user()->role == "Guru")
  @if (Auth::user()->guru(Auth::user()->id_card) == $guru)
    <div class="row">
      <div class="col-lg-4 col-md-12 col-sm-12 col-12">
          <a href="{{ route('jadwal.guru') }}">
              <div class="card card-statistic-1">
              <div class="card-icon bg-info">
                  <i class="fas fa-calendar"></i>
              </div>
              <div class="card-wrap">
                  <div class="card-header">
                  <h5>Jadwal</h5>
                  </div>
                  <div class="card-body mt-n1">
                  {{ $tjadwal }}
                  </div>
              </div>
              </div>
          </a>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 col-12">
          <a href="{{ route('ulangan.index') }}">
              <div class="card card-statistic-1">
              <div class="card-icon bg-danger">
                  <i class="fas fa-home"></i>
              </div>
              <div class="card-wrap">
                  <div class="card-header">
                  <h5>Kelas Mengajar</h5>
                  </div>
                  <div class="card-body mt-n1">
                  {{ $tkelas }}
                  </div>
              </div>
              </div>
          </a>
      </div>
    </div>
  @else
  @endif
@elseif (Auth::user()->role == "Siswa")
  @if (Auth::user()->siswa(Auth::user()->no_induk) == $siswa)
    <div class="row">
      <div class="col-lg-4 col-md-12 col-sm-12 col-12">
          <a href="{{ route('jadwal.siswa') }}">
              <div class="card card-statistic-1">
              <div class="card-icon bg-info">
                  <i class="fas fa-calendar"></i>
              </div>
              <div class="card-wrap">
                  <div class="card-header">
                  <h5>Jadwal</h5>
                  </div>
                  <div class="card-body mt-n1">
                  {{ $tjadwal }}
                  </div>
              </div>
              </div>
          </a>
      </div>
    </div>
    @endif
@endif

@endsection
    
@section('content')
    <div class="col-md-12" id="load_content">
      <div class="card-header">
        <h3>Jadwal Hari Ini</h3>
      </div>
        <div class="card-body">
              <table id="example1" class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Jam Pelajaran</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Ruang Kelas</th>
                  </tr>
                </thead>
                <tbody id="data-jadwal">
                    @php
                      $hari = date('D');
                      $jam = date('H:i');
                      $day = array(
                          'Sun' => 'Minggu',
                          'Mon' => 'Senin',
                          'Tue' => 'Selasa',
                          'Wed' => 'Rabu',
                          'Thu' => 'Kamis',
                          'Fri' => 'Jumat',
                          'Sat' => 'Sabtu'
                      );
                    @endphp
                    @if (Auth::user()->role == 'Admin')
                      @if ( $jadwal->count() > 0 )
                        @foreach ($jadwal as $data)
                        <tr>
                            <td>{{ $data->jam_mulai.' - '.$data->jam_selesai }}</td>
                            <td>
                              <h6 class="card-title mt-2 mb-n1">{{ $data->mapel->nama_mapel }}</h6>
                              <p class="card-text text-muted">{{ $data->guru->nama_guru }}</small></p>
                            </td>
                            <td>{{ $data->kelas->nama_kelas }}</td>
                            <td>{{ $data->ruangan }}</td>
                          </tr>
                        @endforeach
                      @else
                        <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Tidak Ada Jadwal Pelajaran Hari ini!</td>
                      @endif
                    
                    @elseif (Auth::user()->role == "Guru")
                      @if (Auth::user()->guru(Auth::user()->id_card) == $guru)
                        @if ( $jadwalguru->count() > 0 )
                          @foreach ($jadwalguru as $data)
                          <tr>
                              <td>{{ $data->jam_mulai.' - '.$data->jam_selesai }}</td>
                              <td>
                                <h6 class="card-title mt-2 mb-n1">{{ $data->mapel->nama_mapel }}</h6>
                                <p class="card-text text-muted">{{ $data->guru->nama_guru }}</small></p>
                              </td>
                              <td>{{ $data->kelas->nama_kelas }}</td>
                              <td>{{ $data->ruangan }}</td>
                            </tr>
                          @endforeach
                        @else
                          <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Tidak Ada Jadwal Mengajar Hari ini!</td>
                        @endif
                      @else
                      @endif
                    
                    @elseif (Auth::user()->role == "Siswa")
                      @if (Auth::user()->siswa(Auth::user()->no_induk) == $siswa)
                        @if ( $jadwalsiswa->count() > 0 )
                          @foreach ($jadwalguru as $data)
                          <tr>
                              <td>{{ $data->jam_mulai.' - '.$data->jam_selesai }}</td>
                              <td>
                                <h6 class="card-title mt-2 mb-n1">{{ $data->mapel->nama_mapel }}</h6>
                                <p class="card-text text-muted">{{ $data->guru->nama_guru }}</small></p>
                              </td>
                              <td>{{ $data->kelas->nama_kelas }}</td>
                              <td>{{ $data->ruangan }}</td>
                            </tr>
                          @endforeach
                        @else
                          <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Tidak Ada Jadwal Belajar Hari ini!</td>
                        @endif
                      @else
                      @endif   
                        
                    @endif
            </tbody>
          </table>
        </div>
      </div>

@endsection
@section('script')
    <script>
      $(document).ready(function () {
        setInterval(function() {
          var date = new Date();
          var hari = date.getDay();
          var h = date.getHours();
          var m = date.getMinutes();
          h = (h < 10) ? "0" + h : h;
          m = (m < 10) ? "0" + m : m;
          var jam = h + ":" + m;
          
          if (hari == 'Minggu' || hari == 'Jumat') {
            $("#data-jadwal").html(
              `<tr>
                <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Sekalah Libur!</td>
              </tr>`
            );
          } else {
            if (jam <= '07:00') {
              $("#data-jadwal").html(
                `<tr>
                  <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Jam Pelajaran Hari ini Akan Segera Dimulai!</td>
                </tr>`
              );
            } else if (
              hari == 'Senin' && jam >= '16:15' ||
              hari == 'Selasa' && jam >= '16:00' ||
              hari == 'Rabu' && jam >= '16:00' ||
              hari == 'Kamis' && jam >= '16:00' ||
              hari == 'Jumat' && jam >= '15:40'
            ) {
              $("#data-jadwal").html(
                `<tr>
                  <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Jam Pelajaran Hari ini Sudah Selesai!</td>
                </tr>`
              );
            } else {
              if (
                hari == 'Senin' && jam >= '09:45' && jam <= '10:15' ||
                hari == 'Senin' && jam >= '12:30' && jam <= '13:15' ||
                hari == 'Selasa' && jam >= '09:15' && jam <= '09:45' ||
                hari == 'Selasa' && jam >= '12:00' && jam <= '13:00' ||
                hari == 'Rabu' && jam >= '09:15' && jam <= '09:45' ||
                hari == 'Rabu' && jam >= '12:00' && jam <= '13:00' ||
                hari == 'Kamis' && jam >= '09:15' && jam <= '09:45' ||
                hari == 'Kamis' && jam >= '12:00' && jam <= '13:00' ||
                hari == 'Jumat' && jam >= '09:00' && jam <= '09:15' ||
                hari == 'Jumat' && jam >= '11:15' && jam <= '13:00'
              ) {
                $("#data-jadwal").html(
                  `<tr>
                    <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Waktunya Istirahat!</td>
                  </tr>`
                );
              } else if (hari == 'Senin' && jam >= '07:00' && jam <= '07:30') {
                $("#data-jadwal").html(
                  `<tr>
                    <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Waktunya Upacara Bendera!</td>
                  </tr>`
                );
              } else {
                $.ajax({
                  type:"GET",
                  data: {
                    hari : hari,
                    jam : jam
                  },
                  dataType:"JSON",
                  url:"{{ url('/jadwal/sekarang') }}",
                  success:function(data){
                    var html = "";
                    $.each(data, function (index, val) {
                        html += "<tr>";
                          html += "<td>" + val.jam_mulai + ' - ' + val.jam_selesai + "</td>";
                          html += "<td><h5 class='card-title'>" + val.mapel + "</h5><p class='card-text'><small class='text-muted'>" + val.guru + "</small></p></td>";
                          html += "<td>" + val.kelas + "</td>";
                          html += "<td>" + val.ruangan + "</td>";
                          if (val.ket != null) {
                            html += "<td><div style='margin-left:20px;width:30px;height:30px;background:#"+val.ket+"'></div></td>";
                          } else {
                            html += "<td></td>";
                          }
                        html += "</tr>";
                    });
                    $("#data-jadwal").html(html);
                  },
                  error:function(){
                  }
                });
              }
            }
          }
        }, 60 * 1000);
      });
      
      $("#Dashboard").addClass("active");
      $("#liDashboard").addClass("menu-open");
      $("#Home").addClass("active");
    </script>
@endsection
