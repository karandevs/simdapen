<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\PktGol;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pegawai::with('jabatan','pktgol')->paginate(10);
        $jabatan = Jabatan::all();
        $pktgol = PktGol::all();
        return view('menu.pegawai', compact('data', 'jabatan', 'pktgol'));
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
        $this->validate($request, [
            'nip' => ['required', 'string', 'max:60', 'unique:pegawais'],
            'nama'=> ['required', 'string', 'max:60'],
            'pktgol_id' => ['required','string','max:60'],
            'jabatan_id' => ['required','string','max:60'],
            'tgl_lahir' => ['required','date'],
            'tgl_masuk' => ['required','date']
        ]);

        $pegawai = Pegawai::create([
            'nip' => $request['nip'],
            'nama' => $request['nama'],
            'pktgol_id' => $request['pktgol_id'],
            'jabatan_id' => $request['jabatan_id'],
            'tgl_lahir' => $request['tgl_lahir'],
            'tgl_masuk' => $request['tgl_masuk']
        ]);

        if ($pegawai) {
            return redirect()->back()->with('success','Data berhasil ditambahkan!');
        } else {
            return redirect()->back()->withErrors($request);
        }
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

        if ($request->nip != $pegawai->nip && $request->nip != "") {
            $validator = $request->validate([
                'nip' => ['string', 'max:60'],
            ]);
            $pegawai->update([
                'nip' => $request->nip
            ]);
        }

        if ($request->nama != $pegawai->nama && $request->nama != "") {
            $validator = $request->validate([
                'nama' => ['string', 'max:60'],
            ]);
            $pegawai->update([
                'nama' => $request->nama
            ]);
        }

        if ($request->pktgol_id != $pegawai->pktgol_id && $request->pktgol_id != "") {
            $validator = $request->validate([
                'pktgol_id' => ['string', 'max:60'],
            ]);
            $pegawai->update([
                'pktgol_id' => $request->pktgol_id
            ]);
        }

        if ($request->jabatan_id != $pegawai->jabatan_id && $request->jabatan_id != "") {
            $validator = $request->validate([
                'jabatan_id' => ['string', 'max:60'],
            ]);
            $pegawai->update([
                'jabatan_id' => $request->jabatan_id
            ]);
        }

        if ($request->tgl_lahir != $pegawai->tgl_lahir && $request->tgl_lahir != "") {
            $validator = $request->validate([
                'tgl_lahir' => ['date'],
            ]);
            $pegawai->update([
                'tgl_lahir' => $request->tgl_lahir
            ]);
        }

        if ($request->tgl_masuk != $pegawai->tgl_masuk && $request->tgl_masuk != "") {
            $validator = $request->validate([
                'tgl_masuk' => ['date'],
            ]);
            $pegawai->update([
                'tgl_masuk' => $request->tgl_masuk
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
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        if ($pegawai) {
            return redirect()->back()->with('success','Data berhasil dihapus!');
        }
    }
}
