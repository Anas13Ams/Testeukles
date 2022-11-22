<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Materiel;



class MaterielController extends Controller
{
    // CRUD
   // 1. CREATE
   public function createMateriel(Request $request)
   {
       try{
       $request->validate([
           'name' => 'required',
           'refachat'=> 'required',
           'prix'=> 'required',
         

           
       ]);
           Materiel::create($request->all());
           return ('Bravo, Materiel crée avec succès !');
       } catch (\Exception $e){
           return response()->json(['error' =>$e->getMessage()], 500);
       }
   }
  // 2. READ
 
    public function getAllMateriel(Request $request)
  {
      $materiel = Materiel::all();
      return response()->json(['materiel' => $materiel]);
      
  }

    //
}
