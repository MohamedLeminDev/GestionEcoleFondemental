<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anne extends Model
{
    use HasFactory;
    protected $fillable=['libelle','status','created_at','updated_at'];
    
    //has one many classe  && anne

     public function classes()
    {
        return $this->belongsToMany('App\Models\Classe','classe_id','anne_id','id','id');
    }
}
