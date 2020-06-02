<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
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

    // public function setConditionAttribute($condition)
    // {
    //     $condition = 1;
    //     $this->attributes['condition'] = 1;
    // }

    // public function syncTags($tags) {

    //     $tagIds = collect($tags)->map(function($tag) {
  
    //       return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
    //     });
  
    //     return $this->tags()->sync($tagIds);
    // }

}
