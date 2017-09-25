<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gereja extends Model
{
    protected $table = 'gereja';

    public function fotoGereja()
    {
    	return $this->hasMany('App\FotoGereja', 'gereja_id', 'id');
    }

    public function jadwalIbadah()
    {
    	return $this->hasMany('App\jadwalIbadah', 'gereja_id', 'id');
    }

    public function getFirstImg()
    {
    	$img = asset('images/gereja');//URL::asset('images/gereja/');
    	$file = $this->fotoGereja()->first();
    	if($file) {
    		return $img . '/' . $file->foto;
    	} else {
    		return $img . '/home.png';
    	}
    }
}
