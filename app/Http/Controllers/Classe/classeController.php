<?php

namespace App\Http\Controllers\Classe;

use App\Models\Classe;
use App\Models\Anne_classe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class classeController extends Controller
{
    public function index()
    {
        return view('Admins.Classes.index');
    }

    public function getAllClasse()
    {
       $classes = Classe::all(); 
       return response()->json($classes);
    }
    public function active(Request $request)
    {
        // return $request;

               $classeById = Classe::find($request->id_classe);
                $classeById -> status = 1;
                $classeById -> save();
                $Anne_classe=new Anne_classe();
                $Anne_classe->anne_id=$request->id_anne;
                $Anne_classe->classe_id=$request->id_classe;
                $Anne_classe->save();
                 return response()->json("Ok");
    }
    
    public function getClasseById(Request $request)
    {
        $classe=Classe::find($request->id);
        return  response()->json($classe);
    }

    public function editClasseCapaciter(Request $request){
        
        $classe = Classe::find($request->id_hidden);
        $classe->capaciter=$request->CapaciteModcls;
        $classe->save();
         return response()->json();
    }

    public function getPrixById(Request $request)
    {
        $classe=Classe::find($request->id);
        return  response()->json($classe);
    }
    
    public function editClassePrix(Request $request){
        
        $classe = Classe::find($request->id_hidden);
        $classe->prix=$request->PrixModcls;
        $classe->save();
         return response()->json();
    }


    public function changeStatus(Request $request)
    {
        $classe = Classe::find($request -> id_Classe);
        if ($classe -> status == 0) {
             $classe -> status = 1;
             $classe -> save();
        } else {
            $classe -> status = 0;
            $classe -> save();
        }
        
        return response()->json($classe);
    }


}
