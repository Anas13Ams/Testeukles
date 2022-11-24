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
    
    $client = DB::table('lien')->join('clients', 'clients.id', '=', 'lien.client_id')->join('materiels','materiels.id','=','lien.materiel_id')
    ->where('lien.quantite', '>', '30', 'AND', '(lien.quantite * materiels.prix)', '>', '30000')
    ->groupBy('clients.id')
    ->orderBy('lien.materiel_id', 'DESC')
    ->get() ;
    
     
   
  
    return $client;

    
    
    
    

    return response()->json(['client' => $client]);
       
   }

  
}