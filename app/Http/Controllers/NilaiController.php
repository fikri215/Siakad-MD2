<?php

namespace App\Http\Controllers;

use Auth;
use App\DescNilai;
use App\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = DescNilai::where('guru_id', $guru->id)->first();
        return view('guru.deskripsi', compact('nilai', 'guru'));
    }

    public function detail()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $nilai = DescNilai::where('guru_id', $guru->id)->first();
        return view('guru.nilai', compact('nilai', 'guru'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::orderBy('kode')->get();
        return view('admin.nilai.index', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guru = Guru::where('kode', $request->guru_id)->first();

        DescNilai::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'guru_id' => $guru->id,
                'kkm' => $request->kkm,
                'deskripsi_a' => $request->predikat_a,
                'deskripsi_b' => $request->predikat_b,
                'deskripsi_c' => $request->predikat_c,
                'deskripsi_d' => $request->predikat_d,
            ]
        );

        return redirect('/nilai')->with('success', 'Data nilai kkm dan predikat berhasil diperbarui!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function kill($id)
    {
        $nilai = DescNilai::findorfail($id);
        $nilai->delete();
        return redirect()->back()->with('success', 'Deskripsi Nilai berhasil dihapus secara permanent');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
