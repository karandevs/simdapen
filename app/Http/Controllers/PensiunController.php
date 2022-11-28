<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PensiunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('menu.pensiun', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $validator = [];
        $pegawai = Pegawai::findOrFail($id);

        if (boolval($request->berkas_skcpns) != $pegawai->berkas_skcpns) {
            $pegawai->update([
                'berkas_skcpns' => boolval($request->berkas_skcpns)
            ]);
        }

        if (boolval($request->berkas_skpns) != $pegawai->berkas_skpns) {
            $pegawai->update([
                'berkas_skpns' => boolval($request->berkas_skpns)
            ]);
        }

        if (boolval($request->berkas_skpktterakhir) != $pegawai->berkas_skpktterakhir) {
            $pegawai->update([
                'berkas_skpktterakhir' => boolval($request->berkas_skpktterakhir)
            ]);
        }

        if (boolval($request->berkas_skjabatan) != $pegawai->berkas_skjabatan) {
            $pegawai->update([
                'berkas_skjabatan' => boolval($request->berkas_skjabatan)
            ]);
        }

        if (boolval($request->berkas_kgbterakhir) != $pegawai->berkas_kgbterakhir) {
            $pegawai->update([
                'berkas_kgbterakhir' => boolval($request->berkas_kgbterakhir)
            ]);
        }

        if (boolval($request->berkas_karpeg) != $pegawai->berkas_karpeg) {
            $pegawai->update([
                'berkas_karpeg' => boolval($request->berkas_karpeg)
            ]);
        }

        if (boolval($request->berkas_drp) != $pegawai->berkas_drp) {
            $pegawai->update([
                'berkas_drp' => boolval($request->berkas_drp)
            ]);
        }

        if (boolval($request->berkas_skhukuman) != $pegawai->berkas_skhukuman) {
            $pegawai->update([
                'berkas_skhukuman' => boolval($request->berkas_skhukuman)
            ]);
        }

        if (boolval($request->berkas_dsk) != $pegawai->berkas_dsk) {
            $pegawai->update([
                'berkas_dsk' => boolval($request->berkas_dsk)
            ]);
        }

        if (boolval($request->berkas_suratnikah) != $pegawai->berkas_suratnikah) {
            $pegawai->update([
                'berkas_suratnikah' => boolval($request->berkas_suratnikah)
            ]);
        }

        if (boolval($request->berkas_akteanak) != $pegawai->berkas_akteanak) {
            $pegawai->update([
                'berkas_akteanak' => boolval($request->berkas_akteanak)
            ]);
        }

        if (boolval($request->berkas_kpt) != $pegawai->berkas_kpt) {
            $pegawai->update([
                'berkas_kpt' => boolval($request->berkas_kpt)
            ]);
        }

        if (boolval($request->berkas_dpcp) != $pegawai->berkas_dpcp) {
            $pegawai->update([
                'berkas_dpcp' => boolval($request->berkas_dpcp)
            ]);
        }

        if (boolval($request->ppk2thnterakhir) != $pegawai->berkas_ppk2thnterakhir) {
            $pegawai->update([
                'berkas_ppk2thnterakhir' => boolval($request->ppk2thnterakhir)
            ]);
        }

        if (boolval($request->berkas_pasphoto) != $pegawai->berkas_pasphoto) {
            $pegawai->update([
                'berkas_pasphoto' => boolval($request->berkas_pasphoto)
            ]);
        }

        if ($pegawai) {
            return redirect()->back()->with('success', 'Data berhasil diubah!');
        } else {
            return redirect()->back()->withErrors($request);
        }
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
