<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Expediente extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    
    public function materia()
    {
    	return $this->belongsTo(Materia::class);
    }

    public function juzgado()
    {
    	return $this->belongsTo(Juzgado::class);
    }

    public function proceso()
    {
    	return $this->belongsTo(Proceso::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // public function syncTags($tags) {

    //     $tagIds = collect($tags)->map(function($tag) {
  
    //       return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
    //     });
  
    //     return $this->tags()->sync($tagIds);
    // }

}

