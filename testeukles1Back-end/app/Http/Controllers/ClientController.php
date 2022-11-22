<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
class ClientController extends Controller

{
    //


   public function index(){
       return view('client');
   }

   // CRUD
   // 1. CREATE
   public function createClient(Request $request)
    {
        try{
        $request->validate([
            'name' => 'required',
            'refachat'=> 'required',
            'quantite'=> 'required',
          

            
        ]);
            Client::create($request->all());
            return ('Bravo, Client crée avec succès !');
        } catch (\Exception $e){
            return response()->json(['error' =>$e->getMessage()], 500);
        }
    }
   // 2. READ
  
     public function getAllClient(Request $request)
   {
       $client = Client::all();
       return response()->json(['client' => $client]);
       
   }

   public function getResult(Request $request)
   {
    // $client = DB::table('clients')
    // ->join('materiels', 'clients.refachat', '=', 'materiels.refachat')
   
    // ->select(DB::RAW('clients.name', 'clients.quantite','SUM(materiels.prix) as total'))
    // ->groupByRaw('clients.name')
    // ->havingRaw('SUM(materiels.prix) > 10')
    // ->get();

    //route get result pour afficher resulta
   //$client = DB::table('clients')->get();
    

    //->select()
    
    $client = DB::table('lien')->join('clients', 'clients.id', '=', 'lien.client_id')->join('materiels','materiels.id','=','lien.materiel_id')
    ->where('lien.quantite', '>', '30', 'AND', '(lien.quantite * materiels.prix)', '>', '30000')->get() ;
     
    //  SELECT * from lien INNER JOIN clients ON clients.id = lien.client_id INNER JOIN materiels ON materiels.id = lien.materiel_id WHERE lien.quantite > 30 AND (lien.quantite * materiels.prix) > 30000
    //  ->get();

    return $client;

    
    
    
    

    return response()->json(['client' => $client]);
       
   }

  
}