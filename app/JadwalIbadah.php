<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalIbadah extends Model
{
    protected $table = 'jadwal_ibadah';

    public function gereja()
    {
    	return $this->belongsTo('App\Gereja', 'gereja_id');
    }
}
