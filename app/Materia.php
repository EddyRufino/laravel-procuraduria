<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $guarded = [];

    public function expediente()
    {
    	return $this->belognsTo(Expediente::class);
    }
}
