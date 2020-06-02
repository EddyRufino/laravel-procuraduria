<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
	protected $guarded = [];

    public function expediente()
    {
    	return $this->belognsTo(Expediente::class);
    }
}
