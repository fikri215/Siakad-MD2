@extends('template_backend.home')
@section('heading', 'Dashboard')
@section('page')
  <div class="breadcrumb-item active">Dashboard</div>
@endsection
@section('precontent')

    <div class="row">
        <div class="col-lg-4 col-md-8 col-sm-8 col-12">
            <a href="{{ route('jadwal.index') }}">
                <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h5>Jadwal</h5>
                    </div>
                    <div class="card-body mt-n1">
                    {{ $jadwal }}
                    </div>
                </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-8 col-sm-8 col-12">
            <a href="{{ route('guru.index') }}">
                <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h5>Guru</h5>
                    </div>
                    <div class="card-body mt-n1">
                    {{ $guru }}
                    </div>
                </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-8 col-sm-8 col-12">
            <a href="{{ route('siswa.index') }}">
                <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h5>Siswa</h5>
                    </div>
                    <div class="card-body mt-n1">
                    {{ $siswa }}
                    </div>
                </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-8 col-sm-8 col-12">
            <a href="{{ route('kelas.index') }}">
                <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h5>Kelas</h5>
                    </div>
                    <div class="card-body mt-n1">
                    {{ $kelas }}
                    </div>
                </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-8 col-sm-8 col-12">
            <a href="{{ route('mapel.index') }}">
                <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h5>Mata Pelajaran</h5>
                    </div>
                    <div class="card-body mt-n1">
                    {{ $mapel }}
                    </div>
                </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-8 col-sm-8 col-12">
            <a href="{{ route('user.index') }}">
                <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                    <h5>User Terdaftar</h5>
                    </div>
                    <div class="card-body mt-n1">
                    {{ $user }}
                    </div>
                </div>
                </div>
            </a>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                            <span class="text-bold text-lg">Data Guru</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-success">
                                <i class="fas fa-arrow-up"></i> {{ $guru }}
                            </span>
                        </p>
                    </div>
                    <div class="position-relative mb-4">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive">
                                    <canvas id="pieChartGuru" height="200"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <ul class="chart-legend clearfix">
                                    <li><i class="far fa-circle text-primary"></i> Laki-laki</li>
                                    <li><i class="far fa-circle text-danger"></i> Perempuan</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                            <span class="text-bold text-lg">Data Siswa</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-success">
                                <i class="fas fa-arrow-up"></i> {{ $siswa }}
                            </span>
                        </p>
                    </div>
                    <div class="position-relative mb-4">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive">
                                    <canvas id="pieChartSiswa" height="200"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <ul class="chart-legend clearfix">
                                    <li><i class="far fa-circle text-primary"></i> Laki-laki</li>
                                    <li><i class="far fa-circle text-danger"></i> Perempuan</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">Kelas / Jurusan </span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i> {{ $kelas }}
                        </span>
                    </p>
                </div>
                <div class="position-relative mb-4">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart-responsive">
                                <canvas id="pieChartPaket" height="150"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="chart-legend clearfix">
                                <li><i class="far fa-circle" style="color: #999999"></i> Akuntansi</li>
                                <li><i class="far fa-circle" style="color: #0b2e75"></i> Administrasi Perkantoran</li>
                                <li><i class="far fa-circle" style="color: #7980f7"></i> Pemasaran</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            'use strict'

            var pieChartCanvasGuru = $('#pieChartGuru').get(0).getContext('2d')
            var pieDataGuru        = {
                labels: [
                    'Laki-laki', 
                    'Perempuan',
                ],
                datasets: [
                    {
                    data: [{{ $gurulk }}, {{ $gurupr }}],
                    backgroundColor : ['#007BFF', '#DC3545'],
                    }
                ]
            }
            var pieOptions     = {
                legend: {
                    display: false
                }
            }
            var pieChart = new Chart(pieChartCanvasGuru, {
                type: 'doughnut',
                data: pieDataGuru,
                options: pieOptions      
            })

            var pieChartCanvasSiswa = $('#pieChartSiswa').get(0).getContext('2d')
            var pieDataSiswa        = {
                labels: [
                    'Laki-laki', 
                    'Perempuan',
                ],
                datasets: [
                    {
                    data: [{{ $siswalk }}, {{ $siswapr }}],
                    backgroundColor : ['#007BFF', '#DC3545'],
                    }
                ]
            }
            var pieOptions     = {
                legend: {
                    display: false
                }
            }
            var pieChart = new Chart(pieChartCanvasSiswa, {
                type: 'doughnut',
                data: pieDataSiswa,
                options: pieOptions      
            })

            
            var pieChartCanvasPaket = $('#pieChartPaket').get(0).getContext('2d')
            var pieDataPaket        = {
                labels: [
                    'Akuntansi',
                    'Administrasi Perkantoran',
                    'Pemasaran',
                ],
                datasets: [
                    {
                    data: [{{ $ak }}, {{ $ap }}, {{ $pm }}],
                    backgroundColor : ['#999999', '#0b2e75', '#7980f7'],
                    }
                ]
            }
            var pieOptions     = {
                legend: {
                    display: false
                }
            }
            var pieChart = new Chart(pieChartCanvasPaket, {
                type: 'doughnut',
                data: pieDataPaket,
                options: pieOptions      
            })
        })
        
        $("#Dashboard").addClass("active");
        $("#liDashboard").addClass("menu-open");
        $("#AdminHome").addClass("active");
    </script>
@endsection