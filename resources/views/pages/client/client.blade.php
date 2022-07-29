
              
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
                                    <a href="#" class="btn-hover color-white">Importer</a>
                                    <a href="{{url('addclients')}}" class="btn-hover color-blue">Créer</a>
                                </div>
                            </div>
                        </div>

                        <div class="section-table-client mt-4 pt-3">
                            <div class="row filtre-client pb-1">
                                <div class="col-md-12">
                                    <div class="title-p pt-1"><h5>Liste des clients</h5></div>
                                </div>
                            </div>
                            <table id="table" class="table table-striped" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Type</th>
                                        <th>E-mail</th>
                                        <th>Téléphone</th>
                                        <th>CIN</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clients as $clt)
                                    <tr>
                                        <td>{{$clt->name}}</td>
                                        <td>{{$clt->type}}</td>
                                        <td>{{$clt->email}}</td>
                                        <td>{{$clt->tele}}</td>
                                        <td>{{$clt->cin}}</td>
                                        <td>
                                            <div class="dropdown section-action">
                                                <a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i> </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="{{url('showclient'.$clt->id)}}">Afficher</a></li>
                                                    <li><a class="dropdown-item" href="{{url('modifyclient'.$clt->id)}}">Modifier</a></li>
                                                    <li><a class="dropdown-item" href="{{url('deleteclient'.$clt->id)}}">Supprimer</a></li>
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
   