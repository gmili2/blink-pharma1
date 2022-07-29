<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\DB;
use Auth;

class ClientsController extends Controller
{
public function index()
{
    $clients = Client::all();

    $clients= DB::table('clients')
    ->select('clients.*')
    ->where('clients.creer_par',Auth::User()->id)
    ->whereNull('clients.deleted_at')
    ->get(); 
    return view('pages/client/client',compact('clients'));
}


public function store(Request $req)
{
    $client=new Client();
    DB::beginTransaction();
    try{
        if($req->image!=null)
        {
        $image = time() . '-' . $req->nom . '.' . $req->image->extension();
        $req->image->move(public_path('images'), $image);
        $client->image = $image;
        } 
        $client->name=$req->nom;
        $client->cin=$req->cin;
        $client->cnss=$req->cnss;
        $client->email=$req->email;
        $client->type=$req->type;
        $client->tele=$req->tel;
        $client->ville=$req->ville;
        $client->adresse=$req->adresse;
        $client->code_postale=$req->codeposal;
        $client->plafan_credit=$req->plafancredit;
        $client->organisme=$req->organisme;
        $client->num_immatriculation=$req->num_immatriculation;
        $client->num_affiliation=$req->num_affiliation;
        $client->description=$req->description;
        $client->creer_par=Auth::user()->id;
        $client->save();
        DB::commit();
        session()->flash('success','Client ajouté avec succés');	
        return redirect('clients');
    }
        catch(QueryException $ex){
            DB::rollBack();
        $req->session()->flash('warning', 'erreur base donnée');
            return redirect('clients');
        }  
        
    
}


public function delete($id)
{
    DB::beginTransaction();
    try{
    $client = Client::find($id);
    $client->delete();
    DB::commit();
    session()->flash('success','Client supprimé avec succés');	
    return redirect('clients');
}
catch(QueryException $ex){
    DB::rollBack();
session()->flash('warning', 'erreur base donnée');
    return redirect('clients');
}  
}

public function update(Request $req,$id)
{
    DB::beginTransaction();
    try{
    $client = Client::find($id);
    if($req->image!=null)
    {
    $image = time() . '-' . $req->nom . '.' . $req->image->extension();
    $req->image->move(public_path('images'), $image);
    $client->image = $image;
    } 
    $client->name=$req->nom;
    $client->cin=$req->cin;
    $client->cnss=$req->cnss;
    $client->email=$req->email;
    $client->type=$req->type;
    $client->tele=$req->tel;
    $client->ville=$req->ville;
    $client->adresse=$req->adresse;
    $client->code_postale=$req->codeposal;
    $client->plafan_credit=$req->plafancredit;
    $client->organisme=$req->organisme;
    $client->num_immatriculation=$req->num_immatriculation;
    $client->num_affiliation=$req->num_affiliation;
    $client->description=$req->description;
    $client->creer_par=Auth::user()->id;
    $client->save();
    DB::commit();
    
    session()->flash('success','Client modifié avec succés');	
    return redirect('clients');}

catch(QueryException $ex){
    DB::rollBack();
session()->flash('warning', 'erreur base donnée');
    return redirect('clients');
}  
    
}


public function showclient($id)
{
    $clients = Client::find($id);
//    dd($clients);
    return view('pages/client/informationclient',compact('clients'));
}

public function modifyclient($id)
{
    $clients = Client::find($id);
    return view('pages/client/clientdetails',compact('clients'));
}



}
