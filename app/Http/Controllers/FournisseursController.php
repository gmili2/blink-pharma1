<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fournisseur;
use Illuminate\Support\Facades\DB;
use Auth;

class FournisseursController extends Controller
{
    //


public function index()
{
    $fournisseurs = Fournisseur::all();
    $fournisseurs= DB::table('fournisseurs')
    ->select('fournisseurs.*')
    ->where('fournisseurs.creer_par',Auth::User()->id)
    ->whereNull('fournisseurs.deleted_at')
    ->get(); 
    return view('pages/fournisseur/liste',compact('fournisseurs'));
}


public function store(Request $req)
{


    DB::beginTransaction();
    try{

   // dd($req->input());
    $client = new Fournisseur();
    if($req->image!=null)
    {
    $image = time() . '-' . $req->nom . '.' . $req->image->extension();
    $req->image->move(public_path('images'), $image);
    $client->image = $image;
    } 
   
    $client->name=$req->nom;
    $client->email=$req->email;
    $client->tele=$req->telephone;
    $client->fax=$req->fax;
    $client->site=$req->siteinternet;
    $client->code_postale=$req->codepostal;
    $client->Pays=$req->Pays;
    $client->adresse=$req->adresse;
    $client->ville=$req->ville;
    $client->description=$req->description;
    $client->creer_par=Auth::user()->id;
    $client->save();
    DB::commit();
    
    session()->flash('success','Fournisseur ajouté avec succés');	
    return redirect('fournisseurs');}
    catch(QueryException $ex){
        DB::rollBack();
        $request->session()->flash('warning', 'erreur base donnée');
        return redirect('fournisseurs');
    }  
}


public function delete($id)
{
    DB::beginTransaction();
    try{
    $client = Fournisseur::find($id);
    $client->delete();
    DB::commit();

    session()->flash('success','Fournisseur supprimé avec succés');	
    return redirect('fournisseurs');}
    catch(QueryException $ex){
        
        DB::rollBack();
        $request->session()->flash('warning', 'erreur base donnée');
        return redirect('fournisseurs');
    }
}

public function update(Request $req,$id)
{
    DB::beginTransaction();
    try{
    $client = Fournisseur::find($id);
    if($req->image!=null)
    {
    $image = time() . '-' . $req->nom . '.' . $req->image->extension();
    $req->image->move(public_path('images'), $image);
    $client->image = $image;
    } 
    $client->name=$req->nom;
    $client->email=$req->email;
    $client->tele=$req->telephone;
    $client->fax=$req->fax;
    $client->site=$req->siteinternet;
    $client->code_postale=$req->codepostal;
    $client->Pays=$req->Pays;
    $client->adresse=$req->adresse;
    $client->ville=$req->ville;
    $client->description=$req->description;
    $client->creer_par=Auth::user()->id;
    $client->save();
    DB::commit();
    
    session()->flash('success','Fournisseur modifié avec succés');	
    return redirect('fournisseurs');}
    catch(QueryException $ex){
        
        DB::rollBack();
        $request->session()->flash('warning', 'erreur base donnée');
        return redirect('fournisseurs');
    }
}


public function showfournisseur($id)
{
    $fournisseurs = Fournisseur::find($id);
    return view('pages/fournisseur/informationfournisseur',compact('fournisseurs'));
}

public function modify($id)
{
    $fournisseurs = Fournisseur::find($id);
    return view('pages/fournisseur/modifyfournisseur',compact('fournisseurs'));
}


}
