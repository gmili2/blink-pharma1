<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Vente;
use App\Venteproduit;

use App\Produit;


use Illuminate\Support\Facades\DB;
use Auth;

class VenteController extends Controller
{
    //
    


     public function index()
    {


    $ventes= DB::table('ventes')
    ->select('ventes.*','clients.name as nom_client')
    ->join('clients', 'ventes.client_id', '=', 'clients.id')
    ->where('ventes.creer_par',Auth::User()->id)
    ->whereNull('ventes.deleted_at')
    ->get();
    // dd($ventes) ;


    // $ventes= DB::table('ventes')
   
    // ->whereNull('ventes.deleted_at')
    // ->select('ventes.*')
    // ->get(); 
            return view('pages.vente.liste',compact('ventes'));
     


        # code...
    }
public function ajoutervente(Request $req){

    $vente=new Vente();
    $vente->produits_id= $req->id_produit;
    $vente->client_id= $req->id_client;
    // $vente->quantite_suivant= $req->produit_idsuivant;
    $vente->PPV= $req->PPV;
    $vente->quantite= $req->quantite;
    $vente->reference= $req->references;
    $vente->mode_payment= $req->mode_payment;
    $vente->livree= $req->livree;
    $vente->fournisseurs_id= 1;
    $vente->creer_par= Auth::User()->id;



    
    // dd(  $vente);

    $vente->save();
    session()->flash('success','vente ajouter avec succés');	
    return redirect('vente');
    // return view('pages.vente.devis',compact('vente'));
    // dd(  $req->input());
}

public function test(){
    return ('axios okkk');
}
public function ajoutervente_produit_client(Request $req){
    DB::beginTransaction();
    try{
        // return $req->input("qty");
    $quatite_produit= $req->input("qty");
    $listproduit= $req->input("pr_select");
    $p_unitaire= $req->input("p_unitaire");
    $remboursement= $req->input("remboursement");
    $remise= $req->input("remise");
    $i=0;
    $vente=new Vente();
    $vente->client_id= $req->client_idsuivant;
    $vente->status= $req->status;
    $vente->reference= $req->references;
    $vente->livree= $req->livree;
    $vente->status = $req->status;
    $vente->montant_recu = $req->montant_recu;
    $vente->montant_rendre = $req->montant_rendre;
    $vente->montant_credit = $req->montant_credit;
    $vente->montant_PPV = $req->montant_PPV;
    $vente->montant_PU = $req->montant_PU;
    
    if( $vente->client_id==null){
        $vente->client_id=1000;
    }
    $vente->creer_par= Auth::User()->id;
    $vente->livree= $req->livree;
    if($req->status==0 || $req->status=="0" )
    $vente->mode_payment=null;
    else
    $vente->mode_payment= $req->mode_payment;
    //  return ($vente);
    $vente->save();
    // return ("okkk");

    foreach ($req->input("pr_select") as $pr_id){

        $produit =  Produit::find( $pr_id);
        $produit->quantite_disponible= $produit->quantite_disponible-$quatite_produit[$i];
        $produit->update();
        $venteproduit=new Venteproduit();
        $venteproduit->quantite=$quatite_produit[$i];
        $venteproduit->produits_id=$produit->id;
        $venteproduit->ventes_id=$vente->id;
        $venteproduit->remise=$remise[$i];
        $venteproduit->remboursement=$remboursement[$i];
        $venteproduit->prix_unitaire=$p_unitaire[$i];
        $venteproduit->save();
    }
    DB::commit();
    // $_SESSION["id_vente"]=$vente->id;
    return Response()->json(["codeEr"=>"200","msg"=>"bien effetcuie","id_vente"=>$vente->id]);  
    // return()
// session()->flash('success', 'vente bien ajouter');
//     return redirect('vente');
}
catch(QueryException $ex){
    DB::rollBack();
    $req->session()->flash('warning', 'erreur base donnée');
    return Response()->json(["codeEr"=>"300","msg"=>$ex]);  
}
}

public function facturepage( $id){
    $facture= DB::table('venteproduits')
    ->join('ventes', 'venteproduits.ventes_id', '=', 'ventes.id')
    ->join('produits', 'venteproduits.produits_id', '=', 'produits.id')
    // ->select('ventes.*',)
    ->join('clients', 'ventes.client_id', '=', 'clients.id')
    ->where('ventes.id', $id)
    ->whereNull('ventes.deleted_at')
    ->select('ventes.*',"produits.*","venteproduits.*",'clients.name as nom_client')
    ->get(); 
// dd($facturpe);
    return view('pages.vente.facture',compact('facture'));
}
public function addventepage()
{

    $clients= DB::table('clients')
    ->select('clients.*')
    ->where('clients.creer_par',Auth::User()->id)
    ->whereNull('clients.deleted_at')

    ->get(); 
    $produits= DB::table('produits')
        ->join('classes','produits.classes_id','=','classes.id')
        ->join('types','produits.types_id','=','types.id')
        ->join('forms', 'produits.forms_id', '=', 'forms.id')   
        ->join('dcis', 'produits.dcis_id', '=', 'dcis.id')
        ->select('produits.*','classes.name as nameclasse','types.name as nametype','forms.name as nameform'
        ,'dcis.name as namedci')
        ->where('creer_par',Auth::User()->id)
        ->whereNull('produits.deleted_at')

        ->get();
    return view('pages.vente.add-vente',compact('clients'),compact('produits'));
}



}
