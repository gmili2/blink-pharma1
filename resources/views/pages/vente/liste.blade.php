
                @extends('layouts.app')

                @section('content')
                <div class="page-content">
                    <section class="section-produit mt-3 pb-5">
                        <div class="row text-end">
                            <div class="col-md-12">
                                <div class="buttons">
                                    <a href="#" class="btn-hover color-white">Ajouter aux favoris</a>
                                    <a href="#" class="btn-hover color-white">Historique des opérations</a>
                                    <a href="addventes" class="btn-hover color-blue">Nouvelle vente</a>
                                </div>
                            </div>
                        </div>

                        <div class="section-table-product mt-4 pt-3">
                            <div class="row filtre-product pb-1">
                                <div class="col-md-6">
                                    <div class="title-p pt-1"><h5>Liste des Ventes</h5></div>
                                </div>

                                <div class="col-md-6">
                                    <div class="status-actif">
                                        <div class="status">
                                            <span class="on"><i class="bi bi-circle-fill"></i> Livré</span>
                                        </div>
                                        <div class="status">
                                            <span class="off"><i class="bi bi-circle-fill"></i> Non livré</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="table" class="table table-striped" style="width: 100%;">
                                <thead>

                                    {{-- id": 9
      +"date_effectuer": null
      +"deleted_at": null
      +"created_at": "2022-07-27 16:03:33"
      +"updated_at": "2022-07-27 16:03:33"
      +"client_id": null
      +"status": "3"
      +"livree": "0"
      +"mode_payment": "3"
      +"reference": "cdcds"
      +"creer_par": 3
      +"montant_credit": null
      +"montant_rendre": null
      +"montant_PPV": null
      +"montant_PU": null
      +"montant_recu": null --}}
                                    <tr>
                                        <th>Livree</th>
                                        <th>Numéro de transaction</th>
                                        <th>Client</th>
                                        <th>Date de creation</th>
                                        <th>Créer le</th>
                                        <th>Total</th>
                                        <th>Statut</th>

                                        <th>Téléchargement</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($ventes as $vente)
                                    <tr>
                                        <td>
                                            <div class="status">
                                            @if ($vente->livree==1)
                                            <span class="on"><i class="bi bi-circle-fill"></i></span>
                                                
                                            @else
                                            <span class="off"><i class="bi bi-circle-fill"></i> </span>
                                                
                                            @endif
                                            </div>
                                        </td>
                                        <td>{{$vente->id}}</td>
                                        <td>{{$vente->nom_client}}</td>
                                        <td>{{$vente->created_at}}</td>
                                        <td>{{$vente->created_at}}</td>
                                        <td>{{$vente->montant_PU}}</td>
                                        <td>{{$vente->status}}</td>


                                        <td>
                                            <div class="status">
                                                <a href="#" class="telechargement"> <i class="bi bi-arrow-down"></i> PDF</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown section-action">
                                                <a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i> </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="facture">Afficher</a></li>
                                                    <li><a class="dropdown-item" href="#">Modifier</a></li>
                                                    <li><a class="dropdown-item" href="#">Supprimer</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
{{--                                    
                                    <tr>
                                        <td>
                                            <div class="status">
                                                <span class="off"><i class="bi bi-circle-fill"></i></span>
                                            </div>
                                        </td>
                                        <td>BC-864</td>
                                        <td>Blink Pharma</td>
                                        <td>2022-11-15</td>
                                        <td>2022-11-09</td>
                                        <td>452,02 Dhs</td>
                                        <td>
                                            <div class="status">
                                                <a href="#" class="telechargement"> <i class="bi bi-arrow-down"></i> PDF</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown section-action">
                                                <a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i> </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="/pages/vente/facture.html">Afficher</a></li>
                                                    <li><a class="dropdown-item" href="#">Modifier</a></li>
                                                    <li><a class="dropdown-item" href="#">Supprimer</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                              --}}
                                </tbody>
                            </table>
                        </div>
                    </section>
                    {{-- <button  onclick="showModal()" >Approuver (F12)</button> --}}

                    <div class="modal fade vente-succes" id="vente-cree" >
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Vente(s) crée(s) avec succés</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="d-flex flex-wrap">
                                                    <li class="d-flex" role="button">
                                                        <div class="icon"><img src="/assets/icons/facture.svg" alt=""></div>
                                                        <a href="/pages/vente/facture.html">Afficher la Facture</a>
                                                    </li>
                                                    <li class="d-flex">
                                                        <div class="icon"><img src="/assets/icons/imprimer.svg" alt=""></div>
                                                        <a href="">Imprimer Ticket</a>
                                                    </li>
                                                    <li class="d-flex">
                                                        <div class="icon"><img src="/assets/icons/plus.svg" alt=""></div>
                                                        <a href="/pages/vente/add-vente.html">Créer une Nouvelle Vente</a>
                                                    </li>
                                                    <li class="d-flex">
                                                        <div class="icon"><img src="/assets/icons/imprimer.svg" alt=""></div>
                                                        <a href="">Imprimer Bon De Livraison</a>
                                                    </li>
                                                    <li class="d-flex">
                                                        <div class="icon"><img src="/assets/icons/toutelesventes.svg" alt=""></div>
                                                        <a href="/pages/vente/liste.html">Consulter Toutes les Ventes</a>
                                                    </li>
                                                    <li class="d-flex">
                                                        <div class="icon"><img src="/assets/icons/imprimer.svg" alt=""></div>
                                                        <a href="">Imprimer Facture</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
    @endsection
         
        <script>
            function showModal() {
      alert('1')

      $('#vente-cree').modal("show");
      alert('kknjnjn')

    //   $('#myModal').modal('toggle'); // Show if closed, close if shown
// $('#myModal').modal('hide'); // Hide modal
  }
  if(1==1)
  showModal() ;
  
        </script>