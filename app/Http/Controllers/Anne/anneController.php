<?php

namespace App\Http\Controllers\Anne;

use App\Http\Controllers\Controller;
use App\Models\Anne;
use Illuminate\Http\Request;
use Whoops\Exception\Formatter;

class anneController extends Controller
{
    public function index(){
        return view("Admins.Annes.index");
    }

    public function active($id_anne)
    {
        
        $annes = Anne::all();

        foreach ($annes as  $anne) {
            $anne -> status = 0;
            $anne -> save();
        }
        
         $anneById = Anne::find($id_anne);
                $anneById -> status = 1;
                $anneById -> save();
                 return response()->json("Ok");

    }
    public function getAnne()
    {
       $annes = Anne::all(); 
       return response()->json($annes);
    }

    public function anneActive(){
        $anne = Anne::where('status',1)->get();
        return response()->json($anne);
    }
    public function insertion(Request $request)
    {
        $anne=new Anne();
        $anne->libelle=$request->libelle;
        $anne->status=0;
        
        $anne->save();
        return response()->json(
            [
                'success'=> true
            ]

        ) ;

    }
}
