<?php

namespace App\Http\Controllers;

use App\JadwalIbadah;
use Illuminate\Http\Request;
use App\Gereja;
use Illuminate\Support\Facades\Redirect;

class JadwalIbadahController extends Controller
{
    function tambahView()
    {
        $arrJam = array();
        /*$arrJam[] = '4:00 AM';
        $arrJam[] = '12:00 AM';*/
        return view('gereja.tambahJadwal', ['arrJam' => $arrJam]);
    }

    function tambah(Request $request)
    {
        $req = $request->all();
        foreach ($req['jadwalIbadah'] as $jam) {
            $jadwal = new JadwalIbadah();
            $jadwal->gereja_id = intval($req['gereja_id']);
            $jadwal->jam_ibadah = $jam;
            if($jadwal->save()) continue;
            else return;
        }
        return Redirect::to('/')->with('success', 'Data jadwal ibadah Gereja berhasil dimasukkan');
    }

    public function allJadwalIbadahId($id=null)
    {
        $allJadwal = JadwalIbadah::where('gereja_id', $id)->get();
        $result = array();
        foreach ($allJadwal as $jadwal) {
            $result[] = $jadwal->jam_ibadah;
        }
        return response()->json($result);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\JadwalIbadah  $jadwalIbadah
     * @return \Illuminate\Http\Response
     */
    public function show(JadwalIbadah $jadwalIbadah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JadwalIbadah  $jadwalIbadah
     * @return \Illuminate\Http\Response
     */
    public function edit(JadwalIbadah $jadwalIbadah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JadwalIbadah  $jadwalIbadah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JadwalIbadah $jadwalIbadah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JadwalIbadah  $jadwalIbadah
     * @return \Illuminate\Http\Response
     */
    public function destroy(JadwalIbadah $jadwalIbadah)
    {
        //
    }
}
