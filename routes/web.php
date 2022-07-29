<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', function () {
    return redirect('login');
});


Route::get('home', function () {
    return view('home');
});

Route::get('client', function () {
    return view('pages.client.client');
});
Route::get('deconnexion',function ()
{
    auth()->logout();
    return redirect('login');
});



Route::get('ajouterclient', function () {
    return view('pages.client.addclient');
});
Route::get('modifierclient', function () {
    return view('pages.client.client');
});
Route::get('supprimerclient', function () {
    return view('pages.client.client');
});
Route::get('informationclient{id}', function () {
    return view('pages.client.informationclient');
});
//produit start
Route::get('produit','produitsController@index');
Route::get('ajouterproduit', 'produitsController@formuleajouterproduit');
Route::post('addproduit', 'produitsController@addproduit');
Route::post('add_date_peremption', 'produitsController@add_date_peremption');


Route::get('modifierproduit', function () {return view('pages.products.add-product');});
Route::get('supprimerproduit', function () {return view('pages.products.add-product');});
Route::get('informationproduct{id}',  'produitsController@informationproduct' );
Route::get('modifierproduitformule{id}',  'produitsController@modifierproduitformule' );
Route::get('desactiverproduit{id}',  'produitsController@desactiverproduit' );
Route::get('avtiverproduit{id}',  'produitsController@avtiverproduit' );
Route::delete('supprimerproduit{id}',  'produitsController@supprimerproduit' );
Route::put('updateproduct{id}',  'produitsController@updateproduct' );
Route::post('addprixproduits{id}',  'produitsController@addprixproduits' );
Route::put('updateprixproduit{id}',  'produitsController@updateprixproduit' );



//produits finn


//Clients

Route::get('clients', 'ClientsController@index')->name('clients');
Route::get('addclients',  function () {return view('pages/client/addclient');
});

Route::get('showclient{id}', 'ClientsController@showclient')->name('showclient');
Route::post('storeclient','ClientsController@store');
Route::get('modifyclient{id}', 'ClientsController@modifyclient')->name('modifyclient');
Route::put('updateClient{id}','ClientsController@update');
Route::get('deleteclient{id}','ClientsController@delete')->name('deleteclient');;


//End clients



//Fournisseur

Route::get('fournisseurs', 'FournisseursController@index')->name('fournisseurs');
Route::get('addfournisseur',  function () {
    return view('pages/fournisseur/addfornisseur');
});
Route::post('storefournisseur','FournisseursController@store');
Route::get('showfournisseur{id}', 'FournisseursController@showfournisseur')->name('showfournisseur');
Route::put('updatefournisseur{id}','FournisseursController@update');
Route::get('deletefournisseur{id}','FournisseursController@delete')->name('deletefournisseur');
Route::get('modifyfournisseur{id}', 'FournisseursController@modify');


//End Fournisseur

//Confrerer

Route::get('confrere', 'ConfreresController@index');
Route::get('addconfrere',  function () {
    return view('pages/confreres/addconfrere');
});
Route::get('showconfrere{id}', 'ConfreresController@modifyConfrere')->name('showconfrere');
Route::put('updateconfrere{id}','ConfreresController@update');
Route::get('deleteconfrere{id}','ConfreresController@delete')->name('deleteconfrere');
Route::post('storeconfrere','ConfreresController@store');
Route::get('modifyconfrere{id}', 'ConfreresController@modifyConfrere');
//End Confrerer


//stock
Route::get('stock', 'StockController@index')->name('index');
Route::get('addinventaireformule', 'StockController@addinventaireformule')->name('addinventaireformule');
Route::get('stock{id}', 'StockController@modifyConfrere')->name('showconfrere');
Route::put('updatestock{id}','StockController@update');
Route::get('deletestock{id}','StockController@delete')->name('deleteconfrere');
Route::post('ajouterstock','StockController@ajouterstock');
Route::get('importinventaires','StockController@importinventaires');
Route::get('informationinventaire{id}','StockController@informationinventaire');
Route::get('modifierinventaire{id}','StockController@modifierinventaire');

// Route::get('modifyconfrere/{id}', 'StockConroller@modifyConfrere');
//fin stock

//vente
Route::get('vente','VenteController@index')->name('index');
Route::get('addventes','VenteController@addventepage')->name('addventepage');
Route::post('ajoutervente_produit_client','VenteController@ajoutervente_produit_client')->name('ajoutervente_produit_client');
Route::post('ajoutervente','VenteController@ajoutervente')->name('ajoutervente');
Route::get('facture','VenteController@facture')->name('facture');
Route::get('addventes','VenteController@addventepage')->name('addventepage');
Route::get('facture{id}','VenteController@facturepage')->name('facture');


// Route::get('addventes','VenteController@addventepage')->name('addventepage');


Route::get('devis', function () {
    return view('pages.vente.devis');
});
//achatt
Route::get('achat', function () {
    return view('pages.achat.achat');
});

Route::get('new-commande.html', function () {
    return view('pages.achat.new-commande');
});

//fournisseur
// fournisseur
// Route::get('fournisseur', function () {
//     return view('pages.fournisseur.liste');
// });
Route::get('ajouterfournisseur', function () {
    return view('pages.fournisseur.addfornisseur');
});
Route::get('modifierfournisseur', function () {
    return view('pages.fournisseur.client');
});
Route::get('supprimerfournisseur', function () {
    return view('pages.fournisseur.client');
});

Route::get('informationfournisseur', function () {
    return view('pages.fournisseur.informationfournisseur');
});
Route::get('supprimerfournisseur', function () {
    return view('pages.client.client');
});
Route::get('supprimerfournisseur', function () {
    return view('pages.client.client');
});

//conferre
Route::get('informationconfréres', function () {
    return view('pages.confréres.informationconfreres');
});

Route::get('achats', function () {
    return view('pages.client.client');
});

// pages/confréres/liste
Route::get('achats', function () {
    return view('pages.client.client');
});

Route::get('fournisseur', function () {
    return view('pages.client.client');
});


Route::get('ajoutevente', function () {
    return view('pages.vente.addvente');
});

Route::get('devis', function () {
    return view('pages.vente.devis');
});


Route::get('facture', function () {
    return view('pages.vente.facture');
});



//stock 
// pages/stock/liste.html

Route::get('ajouterinventaire', function () {
    return view('pages.stock.addinventaire');
});
Route::get('modifierinvotaire', function () {
    return view('pages.stock.modifierinventaire');
});
// Route::get('informationinventaire
// return view('pages.stock.list');
// });


Route::get('informationinventaire', function () {
    return view('pages.stock.informationinventaire');
});


//parametre
Route::get('parametre', function () {
    return view('pages.parametres');
});

Route::get('profile', 'ProfileController@index');
Route::post('modifierprofile', 'ProfileController@modifierprofile');



// Route::get('profile', function () {
//     return view('pages.parameters.profile');
// });

// Route::get('lescommandesdate{date}',  'CommandController@lescommandesdate');
// Route::get('lescommandesdatedonate{date}',  'CommandController@lescommandesdatedonate');
// Route::get('lescommanderestdonate{date}',  'CommandController@lescommanderestdonate');
Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
