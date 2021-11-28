<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $fillable=['libelle','prix','anne_id','capaciter','status','created_at','updated_at'];
    public function anne(){
        return $this->belongsTo('App\Models\Anne','anne_id');
    }
    public function eleves()
    {
        return $this->hasMany('App\Models\Eleve','classe_id');
    }
    public function annes()
    {
        return $this->belongsToMany('App\Models\Anne','anne_id','classe_id','id','id');
    }

}
