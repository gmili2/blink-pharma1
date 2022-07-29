<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Confrere;
use Illuminate\Support\Facades\DB;
use Auth;

class ConfreresController extends Controller
{
    //
    public function index()
    {
        $confreres = Confrere::all();
        return view('pages/confreres/liste',compact('confreres'));
    }
    
    public function showConfrere($id)
{
    $confreres = Confrere::find($id);

    return view('pages/confreres/informationconfreres',compact('confreres'));
}

public function modifyConfrere($id)
{
    $confreres = Confrere::find($id);
    return view('pages/confreres/confreredetails',compact('confreres'));
}

public function delete($id)
{
    $client = Confrere::find($id);
    $client->delete();
    session()->flash('success','Confrere supprimé avec succés');	
    return redirect('confrere');
}


public function store(Request $req)
{
    //dd($req->input());
    $client = new Confrere();
    $client->name=$req->nom;
    $client->email=$req->email;
    $client->tele=$req->tel;
    $client->ville=$req->ville;
    $client->adresse=$req->adresse;
    $client->code_postale=$req->codeposal;
    $client->description=$req->description;
    $client->creer_par=Auth::user()->id;
    $client->save();
    
    session()->flash('success','Confrere Confrere avec succés');	
    return redirect('confrere');
}



public function update(Request $req,$id)
{
    $client = Confrere::find($id);
    $client->name=$req->nom;
    $client->email=$req->email;
    $client->tele=$req->tel;
    $client->ville=$req->ville;
    $client->adresse=$req->adresse;
    $client->code_postale=$req->codeposal;
    $client->description=$req->description;
    $client->creer_par=Auth::user()->id;
    $client->save();
    
    session()->flash('success','Confrere modifié avec succés');	
    return redirect('confrere');
}




}
