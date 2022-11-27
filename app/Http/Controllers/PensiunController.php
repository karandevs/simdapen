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

        if ($request->berkas_skcpns != $pegawai->berkas_skcpns && $request->berkas_skcpns != "") {
            $validator = $request->validate([
                'berkas_skcpns' => ['tinyint', 'max:1'],
            ]);
            $pegawai->update([
                'berkas_skcpns' => $request->berkas_skcpns
            ]);
        }

        if ($request->berkas_skpns != $pegawai->berkas_skpns && $request->berkas_skpns != "") {
            $validator = $request->validate([
                'berkas_skpns' => ['tinyint', 'max:1'],
            ]);
            $pegawai->update([
                'berkas_skpns' => $request->berkas_skpns
            ]);
        }

        if ($request->berkas_skpktterakhir != $pegawai->berkas_skpktterakhir && $request->berkas_skpktterakhir != "") {
            $validator = $request->validate([
                'berkas_skpktterakhir' => ['tinyint', 'max:1'],
            ]);
            $pegawai->update([
                'berkas_skpktterakhir' => $request->berkas_skpktterakhir
            ]);
        }

        if ($request->berkas_skjabatan != $pegawai->berkas_skjabatan && $request->berkas_skjabatan != "") {
            $validator = $request->validate([
                'berkas_skjabatan' => ['tinyint', 'max:1'],
            ]);
            $pegawai->update([
                'berkas_skjabatan' => $request->berkas_skjabatan
            ]);
        }

        if ($request->berkas_kgbterakhir != $pegawai->berkas_kgbterakhir && $request->berkas_kgbterakhir != "") {
            $validator = $request->validate([
                'berkas_kgbterakhir' => ['tinyint', 'max:1'],
            ]);
            $pegawai->update([
                'berkas_kgbterakhir' => $request->berkas_kgbterakhir
            ]);
        }

        if ($request->berkas_karpeg != $pegawai->berkas_karpeg && $request->berkas_karpeg != "") {
            $validator = $request->validate([
                'berkas_karpeg' => ['tinyint', 'max:1'],
            ]);
            $pegawai->update([
                'berkas_karpeg' => $request->berkas_karpeg
            ]);
        }

        if ($request->berkas_drp != $pegawai->berkas_drp && $request->berkas_drp != "") {
            $validator = $request->validate([
                'berkas_drp' => ['tinyint', 'max:1'],
            ]);
            $pegawai->update([
                'berkas_drp' => $request->berkas_drp
            ]);
        }

        if ($request->berkas_skhukuman != $pegawai->berkas_skhukuman && $request->berkas_skhukuman != "") {
            $validator = $request->validate([
                'berkas_skhukuman' => ['tinyint', 'max:1'],
            ]);
            $pegawai->update([
                'berkas_skhukuman' => $request->berkas_skhukuman
            ]);
        }

        if ($request->berkas_dsk != $pegawai->berkas_dsk && $request->berkas_dsk != "") {
            $validator = $request->validate([
                'berkas_dsk' => ['tinyint', 'max:1'],
            ]);
            $pegawai->update([
                'berkas_dsk' => $request->berkas_dsk
            ]);
        }

        if ($request->berkas_suratnikah != $pegawai->berkas_suratnikah && $request->berkas_suratnikah != "") {
            $validator = $request->validate([
                'berkas_suratnikah' => ['tinyint', 'max:1'],
            ]);
            $pegawai->update([
                'berkas_suratnikah' => $request->berkas_suratnikah
            ]);
        }

        if ($request->berkas_akteanak != $pegawai->berkas_akteanak && $request->berkas_akteanak != "") {
            $validator = $request->validate([
                'berkas_akteanak' => ['tinyint', 'max:1'],
            ]);
            $pegawai->update([
                'berkas_akteanak' => $request->berkas_akteanak
            ]);
        }

        if ($request->berkas_kpt != $pegawai->berkas_kpt && $request->berkas_kpt != "") {
            $validator = $request->validate([
                'berkas_kpt' => ['tinyint', 'max:1'],
            ]);
            $pegawai->update([
                'berkas_kpt' => $request->berkas_kpt
            ]);
        }

        if ($request->berkas_dpcp != $pegawai->berkas_dpcp && $request->berkas_dpcp != "") {
            $validator = $request->validate([
                'berkas_dpcp' => ['tinyint', 'max:1'],
            ]);
            $pegawai->update([
                'berkas_dpcp' => $request->berkas_dpcp
            ]);
        }

        if ($request->berkas_ppk2thnterakhir != $pegawai->berkas_ppk2thnterakhir && $request->berkas_ppk2thnterakhir != "") {
            $validator = $request->validate([
                'berkas_ppk2thnterakhir' => ['tinyint', 'max:1'],
            ]);
            $pegawai->update([
                'berkas_ppk2thnterakhir' => $request->ppk2thnterakhir
            ]);
        }

        if ($request->berkas_pasphoto != $pegawai->berkas_pasphoto && $request->berkas_pasphoto != "") {
            $validator = $request->validate([
                'berkas_pasphoto' => ['tinyint', 'max:1'],
            ]);
            $pegawai->update([
                'berkas_pasphoto' => $request->berkas_pasphoto
            ]);
        }

        if ($pegawai) {
            return redirect()->back()->with('success','Data berhasil diubah!');
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
