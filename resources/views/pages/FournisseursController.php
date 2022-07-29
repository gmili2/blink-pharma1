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
    return view('pages/fournisseur/liste',compact('fournisseurs'));
}


public function store(Request $req)
{
   // dd($req->input());
    $client = new Fournisseur();
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
    
    session()->flash('success','Fournisseur ajouté avec succés');	
    return redirect('fournisseurs');
}


public function delete($id)
{
    $client = Fournisseur::find($id);
    $client->delete();
    session()->flash('success','Fournisseur supprimé avec succés');	
    return redirect('fournisseurs');
}

public function update(Request $req,$id)
{
    $client = Fournisseur::find($id);
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
    
    session()->flash('success','Fournisseur modifié avec succés');	
    return redirect('fournisseurs');
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
