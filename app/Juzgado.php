<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juzgado extends Model
{
	protected $guarded = [];

    public function expediente()
    {
    	return $this->belognsTo(Expediente::class);
    }
}
