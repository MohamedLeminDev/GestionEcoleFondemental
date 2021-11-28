<?php 

use App\Models\Anne;

 function anneActive()
{
    $anne=Anne::where('status',1)->first();
    return $anne->libelle;
}