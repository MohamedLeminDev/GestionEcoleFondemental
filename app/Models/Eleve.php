<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    protected $fillable=[
        'nni','nom','numero_parent','date_inscription','numero_rang',
        'sexe','classe_id','created_at','updated_at'
                ];
                public function classe()
                {
                    return $this->belongsTo('App\Models\Classe','classe_id');
                }
   

}
