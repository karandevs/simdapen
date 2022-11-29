<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PktGol;

class PktGolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PktGol::paginate(10);
        return view('menu.pktgol', compact('data'));
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
            'pangkat' => ['required', 'string', 'max:32', 'unique:pkt_gols'],
            'golongan' => ['required', 'string', 'max:32', 'unique:pkt_gols']
        ]);

        $pktgol = PktGol::create([
            'pangkat' => $request['pangkat'],
            'golongan' => $request['golongan']
        ]);

        if ($pktgol) {
            return redirect()->back()->with('success','Data berhasil ditambah!');
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
        $pktgol = PktGol::findOrFail($id);

        if ($request->pangkat != $pktgol->pangkat && $request->pangkat != "") {
            $validator = $request->validate([
                'pangkat' => ['string', 'max:32','unique:pkt_gols'],
            ]);
            $pktgol->update([
                'pangkat' => $request->pangkat
            ]);
        }

        if ($request->golongan != $pktgol->golongan && $request->golongan != "") {
            $validator = $request->validate([
                'golongan' => ['string', 'max:32','unique:pkt_gols'],
            ]);
            $pktgol->update([
                'golongan' => $request->golongan
            ]);
        }

        if ($pktgol) {
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
        $pktgol = PktGol::findOrFail($id);
        $pktgol->delete();

        if ($pktgol) {
            return redirect()->back()->with('success','Data berhasil dihapus!');
        }
    }
}
