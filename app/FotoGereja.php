<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoGereja extends Model
{
    protected $table = 'foto_gereja';

    public function gereja()
    {
    	return $this->belongsTo('App\Gereja', 'gereja_id');
    }
}
