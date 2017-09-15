<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipeGereja;
use App\Gereja;
use Illuminate\Support\Facades\Redirect;

class GerejaController extends Controller
{

	function tambahView()
	{
		$tipeGereja = TipeGereja::all();
		$tipeGerejas = array();
		foreach ($tipeGereja as $tipe) {
			$tipeGerejas[$tipe->id] = $tipe->nama;
		}
		return view('gereja.tambah', ['tipe_gerejas' => $tipeGerejas]);
	}

    function tambah(Request $request)
    {
    	$req = $request->all();
    	$gereja = new Gereja;
    	$gereja->nama = $req['nama_gereja'];
    	$gereja->tipe_id = $req['tipe_gereja'];
    	$gereja->latitude = $req['latitude'];
    	$gereja->longitude = $req['longitude'];
    	$gereja->kota = $req['kota'];
    	$gereja->alamat = $req['alamat'];
    	
    	if($gereja->save()) {
    		return Redirect::to('/')->with('success', 'Data Gereja berhasil dimasukkan');
    	} else {
    		return Redirect::to('/')->with('failed', 'Data Gereja gagal dimasukkan');
    	}
    }

    public function autoCompleteGereja(Request $request)
    {
        $term=$request->term;
        $data = Gereja::where('nama','ILIKE','%'.$term.'%')->get();
        $result=array();

        foreach ($data as $key => $v){
            $result[]=['id'=>$v->id, 'value' =>$v->nama];
        }
        return response()->json($result);
    }
}
