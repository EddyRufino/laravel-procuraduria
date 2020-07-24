<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;

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

    public function expiredFile($pendientes)
    {
        // foreach ($pendientes as $pendiente) {
            // $au = $pendiente->fechaAudiencia;
            $na = $pendientes->map(function($pendiente, $key) {
                if($pendiente == '2020-07-23')
                {
                    $pendiente->push('$pendiente');
                }
            });
        // }

        dd($na);

        return $na;
    }

    // public function syncTags($tags) {

    //     $tagIds = collect($tags)->map(function($tag) {
  
    //       return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
    //     });
  
    //     return $this->tags()->sync($tagIds);
    // }

}

