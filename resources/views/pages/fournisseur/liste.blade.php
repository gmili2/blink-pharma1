@extends('layouts.app')
@section('content')
<br/>
<div class="page-content">
                    <section class="section-client mt-3 pb-5">
                        <div class="row text-end">
                            <div class="col-md-12">
                                <div class="buttons">
                                    <a href="#" class="btn-hover color-white">Ajouter aux favoris</a>
                                    <a href="#" class="btn-hover color-white">Historique des opérations</a>
                                    <a href="{{url('addfournisseur')}}" class="btn-hover color-blue">Ajouter un nouveau fournisseur</a>
                                </div>
                            </div>
                        </div>

                        <div class="section-table-client mt-4 pt-3">
                            <div class="row filtre-client pb-1">
                                <div class="col-md-12">
                                    <div class="title-p pt-1"><h5>Liste des Fournisseurs</h5></div>
                                </div>
                            </div>
                            <table id="table" class="table table-striped" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Fournisseurs</th>
                                        <th>Téléphone</th>
                                        <th>Ville</th>
                                        <th>Solde</th>
                                        <th>Téléchargement</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fournisseurs as $frn)
                                    <tr>
                                        <td>{{$frn->name}}</td>
                                        <td>{{$frn->tele}}</td>
                                        <td>{{$frn->ville}}</td>
                                        <td>1 097</td>
                                        <td>
                                            <div class="status">
                                                <a href="#" class="telechargement"> <i class="bi bi-arrow-down"></i> PDF</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown section-action">
                                                <a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i> </a>
                                                <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{url('showfournisseur'.$frn->id)}}">Afficher</a></li>
                                                    <li><a class="dropdown-item" href="{{url('modifyfournisseur'.$frn->id)}}">Modifier</a></li>
                                                    <li><a class="dropdown-item" href="{{url('deletefournisseur'.$frn->id)}}">Supprimer</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                          @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>

                @endsection