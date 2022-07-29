
                @extends('layouts.app')

                @section('content')
                <!-- partial -->
                <br/>
                <div class="page-content">
                    <section class="section-client mt-3 pb-5">
                        <div class="row text-end">
                            <div class="col-md-12">
                                <div class="buttons">
                                    <a href="#" class="btn-hover color-white">Ajouter aux favoris</a>
                                    <a href="#" class="btn-hover color-white">Archives</a>
                                    <a href="{{url('addconfrere')}}" class="btn-hover color-blue">Créer</a>
                                </div>
                            </div>
                        </div>

                        <div class="section-table-client mt-4 pt-3">
                            <div class="row filtre-client pb-1">
                                <div class="col-md-12">
                                    <div class="title-p pt-1"><h5>Liste des confrères</h5></div>
                                </div>
                            </div>
                            <table id="table" class="table table-striped" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                     
                                        <th>E-mail</th>
                                        <th>Téléphone</th>
                                        <th>Ville</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($confreres as $cfr)
                                    <tr>
                                        <td>{{$cfr->name}}</td>
                                        <td>{{$cfr->email}}</td>
                                        <td>{{$cfr->tele}}</td>
                                        <td>{{$cfr->ville}}</td>
                                        <td>
                                            <div class="dropdown section-action">
                                                <a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i> </a>
                                                <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{url('showconfrere'.$cfr->id)}}">Afficher</a></li>
                                                    <li><a class="dropdown-item" href="{{url('modifyconfrere'.$cfr->id)}}">Modifier</a></li>
                                                    <li><a class="dropdown-item" href="{{url('deleteconfrere'.$cfr->id)}}">Supprimer</a></li>
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