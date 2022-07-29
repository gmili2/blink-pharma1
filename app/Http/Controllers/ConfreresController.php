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
        // $confreres = Confrere::all();
        $confreres= DB::table('confreres')
        ->select('confreres.*')
        ->where('confreres.creer_par',Auth::User()->id)
        ->whereNull('confreres.deleted_at')
        ->get(); 
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
    DB::beginTransaction();
    try{
    $client = Confrere::find($id);
    $client->delete();
    DB::commit();

    session()->flash('success','Confrere supprimé avec succés');	
    return redirect('confrere');
}catch(QueryException $ex){
        DB::rollBack();
        $request->session()->flash('warning', 'erreur base donnée');
        return redirect('confrere');
    }  
    
   

}


public function store(Request $req)
{
    //dd($req->input());
    DB::beginTransaction();
    try{
    $client = new Confrere();
    if($req->image!=null)
    {
    $image = time() . '-' . $req->nom . '.' . $req->image->extension();
    $req->image->move(public_path('images'), $image);
    $client->image = $image;
    }
    $client->name=$req->nom;
    $client->email=$req->email;
    $client->tele=$req->tel;
    $client->ville=$req->ville;
    $client->adresse=$req->adresse;
    $client->code_postale=$req->codeposal;
    $client->description=$req->description;
    $client->creer_par=Auth::user()->id;
    $client->save();
    DB::commit();
    
    session()->flash('success','Confrere Confrere avec succés');	
    return redirect('confrere');}catch(QueryException $ex){
        DB::rollBack();
        $request->session()->flash('warning', 'erreur base donnée');
        return redirect('confrere');
    }  
    
   
}



public function update(Request $req,$id)
{
    DB::beginTransaction();
    try{
    $client = Confrere::find($id);
    if($req->image!=null)
    {
    $image = time() . '-' . $req->nom . '.' . $req->image->extension();
    $req->image->move(public_path('images'), $image);
    $client->image = $image;
    } 
    $client->name=$req->nom;
    $client->email=$req->email;
    $client->tele=$req->tel;
    $client->ville=$req->ville;
    $client->adresse=$req->adresse;
    $client->code_postale=$req->codeposal;
    $client->description=$req->description;
    $client->creer_par=Auth::user()->id;
    $client->save();
    DB::commit();
    
    session()->flash('success','Confrere modifié avec succés');	
    return redirect('confrere');
}catch(QueryException $ex){
    DB::rollBack();
    $request->session()->flash('warning', 'erreur base donnée');
    return redirect('confrere');
}  
}




}
