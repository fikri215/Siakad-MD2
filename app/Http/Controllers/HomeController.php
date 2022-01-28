<?php

namespace App\Http\Controllers;

use Auth;
use App\Jadwal;
use App\Guru;
use App\Kehadiran;
use App\Kelas;
use App\Siswa;
use App\Mapel;
use App\User;
use App\Jurusan;
use App\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hari = date('D');
        $day = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $jam = date('H:i');
        $jadwal = Jadwal::OrderBy('jam_mulai')->OrderBy('jam_selesai')->OrderBy('kelas_id')->where('hari', $day[$hari])->get();

        // $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        // $jadwalguru = Jadwal::OrderBy('jam_mulai')->where('hari', $day[$hari])->where('guru_id', $guru->id)->get();

        // $siswa = Siswa::where('no_induk', Auth::user()->no_induk)->first();
        // $kelas = Kelas::findorfail($siswa->kelas_id);
        // $jadwalsiswa = Jadwal::OrderBy('jam_mulai')->where('hari', $day[$hari])->get();

        // $pengumuman = Pengumuman::first();
        // $kehadiran = Kehadiran::all();
        return view('home', compact('jadwal'));
        // return view('home', compact('jadwal', 'guru', 'jadwalguru'));
    }

    public function admin()
    {
        $jadwal = Jadwal::count();
        $guru = Guru::count();
        $gurulk = Guru::where('jk', 'L')->count();
        $gurupr = Guru::where('jk', 'P')->count();
        $siswa = Siswa::count();
        $siswalk = Siswa::where('jk', 'L')->count();
        $siswapr = Siswa::where('jk', 'P')->count();
        $kelas = Kelas::count();
        $ak = Kelas::where('jurusan_id', '1')->count();
        $ap = Kelas::where('jurusan_id', '2')->count();
        $pm = Kelas::where('jurusan_id', '3')->count();
        $mapel = Mapel::count();
        $user = User::count();
        $paket = Jurusan::all();
        return view('admin.index', compact(
            'jadwal',
            'guru',
            'gurulk',
            'gurupr',
            'siswalk',
            'siswapr',
            'siswa',
            'kelas',
            'ak',
            'ap',
            'pm',
            'mapel',
            'user',
            'paket'
        ));
    }
}
