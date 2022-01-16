@extends('template_backend.home')
@section('heading', 'Dashboard')
@section('page')
@endsection
@section('content')
    <div class="col-md-12" id="load_content">
      <div class="card-header">
        <h3>Jadwal Hari Ini</h3>
      </div>
        <div class="card-body">
              <table class="table table-striped table-hover">
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
                      $hari = date('w');
                      $jam = date('H:i');
                    @endphp
                    {{-- @if ( $jadwal->count() > 0 )
                      @if ( $hari == 'Senin' || $hari == 'Selasa' || $hari == 'Rabu' || $hari == 'Kamis' || $hari == 'Jumat')
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
                      @elseif ($hari == 'Minggu' || $hari == 'Jumat')
                      <tr>
                        <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Sekolah Libur!</td>
                      </tr>
                      @endif
                    @else
                      <tr>
                        <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Tidak ada data jadwal!</td>
                      </tr>
                    @endif --}}
                    @if ( $jadwal->count() > 0 )
                      @if (
                        $hari == 'Senin' && $jam >= '09:45' && $jam <= '10:15' ||
                        $hari == 'Senin' && $jam >= '12:30' && $jam <= '13:15' ||
                        $hari == 'Selasa' && $jam >= '09:15' && $jam <= '09:45' ||
                        $hari == 'Selasa' && $jam >= '12:00' && $jam <= '13:00' ||
                        $hari == 'Rabu' && $jam >= '09:15' && $jam <= '09:45' ||
                        $hari == 'Rabu' && $jam >= '12:00' && $jam <= '13:00' ||
                        $hari == 'Kamis' && $jam >= '09:15' && $jam <= '09:45' ||
                        $hari == 'Kamis' && $jam >= '12:00' && $jam <= '13:00' ||
                        $hari == 'Jumat' && $jam >= '09:00' && $jam <= '09:15' ||
                        $hari == 'Jumat' && $jam >= '11:15' && $jam <= '13:00'
                      )
                      <tr>
                        <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Waktunya Istirahat!</td>
                      </tr>
                      @else
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
                      @endif
                  {{-- @elseif ($jam <= '07:00')
                    <tr>
                      <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Jam Pelajaran Hari ini Akan Segera Dimulai!</td>
                    </tr>
                @elseif (
                  $hari == 'Senin' && $jam >= '16:15' ||
                  $hari == 'Selasa' && $jam >= '16:00' ||
                  $hari == 'Rabu' && $jam >= '16:00' ||
                  $hari == 'Kamis' && $jam >= '16:00' ||
                  $hari == 'Jumat' && $jam >= '15:40'
                )
                  <tr>
                    <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Jam Pelajaran Hari ini Sudah Selesai!</td>
                  </tr>
                @elseif ($hari == 'Minggu' || $hari == 'Jumat')
                  <tr>
                    <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Sekolah Libur!</td>
                  </tr> --}}
                @else
                  <tr>
                    <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Tidak Ada Data Jadwal!</td>
                  </tr>
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
