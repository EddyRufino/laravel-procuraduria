<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function expedientes() {

        return $this->belongsToMany(Expediente::class)->withPivot('expediente_id', 'tag_id');
    }
}
