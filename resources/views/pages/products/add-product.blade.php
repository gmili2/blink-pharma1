
                   @extends('layouts.app')

                   @section('content')
                   <!-- partial -->
                <!-- partial -->
                <div class="page-content">
                    <section class="section-produit mt-3 pb-5">
                        <form action="addproduit" method="post" enctype="multipart/form-data">
        @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="title">
                                        <h1>Ajouter un produit</h1>
                                    </div>
                                </div>
                                <div class="col-md-6 text-end">
                                    <div class="buttons">
                                        {{-- <a href="#" class="btn-hover color-green btn-fixed">Sauvegarder</a> --}}
                                        <button type="submit" class="btn-hover color-green btn-fixed"> Sauvegarder</button>
                                    </div>
                                </div>
                            </div>
                            <div class="section-form-product mt-4">
                                <div class="block-form bg-white p-4 mb-4">
                                    <div class="section-subtitle pb-1 mb-3">
                                        <h5>Informations générales</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="wrap upload-image d-flex gap-3">
                                                <div class="thumb"><img id="img" class="img" src="/assets/img/default.jpg" /></div>
                                                <div class="form-upload mt-5">
                                                    <input type="file" id="upload"  required name="image" class="upload form-control custom-file-input" />
                                                    <span>Votre fichier ne doit pas dépasser 15 MG</span>
                                                    @error('image')
                                        
                                                    <span>
                                                        <strong style="color: red">a remplir</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12 mb-3">
                                            <div class="wrap upload-image d-flex gap-3">
                                                <div class="thumb"><img id="img" src="/assets/img/default.png" /></div>
                                                <div class="form-upload mt-5">
                                                    <input type="file" id="upload" name="image" class="form-control custom-file-input" />
                                                    <span>Votre fichier ne doit pas dépasser 15 MG</span>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Nom*</label>
                                            <input type="text" class="form-control"  value="{{old('nom')}}" required name="nom" />
                                            @error('nom')
                                        
                                            <span>
                                                <strong style="color: red">a remplir</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Code barre</label>
                                            <input type="text" class="form-control"  required value="{{old('codebarre')}}"  name="codebarre" />
                                            @error('codebarre')
                                            <span>
                                                <strong style="color: red">a remplir</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Code barre 2</label>
                                            <input type="text" class="form-control"  value="{{old('codebarre2')}}"  name="codebarre2" />
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Catégorie</label>
                                            <select class="form-select"  name="categorie" required>
                                                <option  value="" selected>...</option>
                                                @foreach($types as $type)
                                                <option  value="{{$type->id}}"  @if (old('categorie') == $type->id) {{ 'selected' }} @endif>{{$type->name}}</option>
                                                @endforeach
                                                {{-- <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option> --}}
                                            </select>
                                            @error('categorie')
                                        
                                            <span>
                                                <strong style="color: red">a remplir</strong>
                                            </span>
                                        @enderror
                                        </div>
    
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Classe thérapeutique</label>
                                            <select class="form-select"   required name="classe">
                                                <option value=""  selected>...</option>
                                                @foreach($classes as $classe)
                                                <option  value="{{$classe->id}}"  @if (old('classe') == $classe->id) {{ 'selected' }} @endif >{{$classe->name}}</option>
                                                @endforeach
                                                {{-- <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option> --}}
                                                
                                            </select>
                                            @error('classe')
                                        
                                            <span>
                                                <strong style="color: red">a remplir</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Forme galénique</label>
                                            <select  class="form-select"   required name="fgalenique">
                                                <option   value="" selected>...</option>
                                                @foreach($forms as $form)
                                                <option  value="{{$form->id}}"  @if (old('fgalenique') == $form->id) {{ 'selected' }} @endif >{{$form->name}}</option>
                                                @endforeach
                                                {{-- <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option> --}}
                                            </select>
                                            @error('fgalenique')
                                        
                                            <span>
                                                <strong style="color: red" >a remplir</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">DCI</label>
                                            <select class="form-select"   value="{{old('dci')}}" required name="dci">
                                                <option  value=""  selected>...</option>
                                                @foreach($dcis as $dci)
                                                <option  value="{{$dci->id}}"   @if (old('dci') == $dci->id) {{ 'selected' }} @endif>{{$dci->name}}</option>
                                                @endforeach
                                                {{-- <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option> --}}
                                            </select>
                                            @error('dci')
                                        
                                            <span>
                                                <strong style="color: red">a remplir</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Laboratoire</label>
                                            <input type="text" class="form-control"required   value="{{old('laboratoire')}}" name="laboratoire" />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Gamme</label>
                                            <input type="text" class="form-control"  value="{{old('gamme')}}" name="gamme" />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Sous-gamme</label>
                                            <input type="text" class="form-control"  value="{{old('sousgamme')}}" name="sousgamme" />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Produit tableau</label>
                                            <select class="form-select"   value="{{old('tproduit')}}"name="tproduit">
                                                <option selected>...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input"  value="1" type="checkbox" id="inlineCheckbox1" name="prescription"/>
                                                <label class="form-check-label" for="inlineCheckbox1">Nécessite une prescription</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input"  value="1" type="checkbox" id="inlineCheckbox2" name="produit_marche"/>
                                                <label class="form-check-label" for="inlineCheckbox2">Produit marché</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-form bg-white p-4 mb-4">
                                    <div class="section-subtitle pb-1 mb-3">
                                        <h5>Informations du stock</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">PPH*</label>
                                            <input type="number" class="form-control"required  value="{{old('pph')}}"  name="pph" />
                                            @error('pph')
                                        
                                            <span>
                                                <strong style="color: red">a remplir</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">PPV*</label>
                                            <input type="number" class="form-control"  value="{{old('ppv')}}" required name="ppv" />
                                            @error('ppv')
                                        
                                            <span>
                                                <strong style="color: red">a remplir</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">quantite</label>
                                            <input type="number" class="form-control"  value="{{old('quantite')}}" required 
                                            name="quantite" />

                                            @error('quantite')
                                        
                                            <span>
                                                <strong style="color: red">a remplir</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        {{-- <div class="col-md-4 mb-3">
                                            <label class="form-label">Stock</label>
                                            <select class="form-select"  name="stock_id" >
                                                <option  value="" selected>...</option>
                                                @foreach($stocks as $type)
                                                <option  value="{{$type->id}}"  @if (old('categorie') == $type->id) {{ 'selected' }} @endif>{{$type->nom}}</option>
                                                @endforeach
                                               
                                            </select>
                                            @error('categorie')
                                        
                                            <span>
                                                <strong style="color: red">a remplir</strong>
                                            </span>
                                        @enderror
                                        </div> --}}
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">TVA sur achat</label>
                                            <select class="form-select"  required value="{{old('tva_achat')}}" name="tva_achat">
                                                <option value="" selected>...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            @error('tva_achat')
                                        
                                            <span>
                                                <strong style="color: red">a remplir</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">TVA sur vente</label>
                                            <select class="form-select"   required value="{{old('tva_vente')}}"name="tva_vente">
                                                <option  value="" selected>...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            @error('tva_vente')
                                        
                                            <span>
                                                <strong style="color: red">a remplir</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Est remboursable</label>
                                            <select class="form-select"   value="{{old('remboursable')}}" name="remboursable">
                                                <option selected>...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Base de remboursement</label>
                                            <input type="text"   value="{{old('base_remboursable')}}" class="form-control" name="base_remboursable" />
                                        </div>
                                    </div>
                                </div>
                                <div class="block-form bg-white p-4 mb-4">
                                    <div class="section-subtitle pb-1 mb-3">
                                        <h5>Informations descriptives</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Présentation</label>
                                            <input type="text"  value="{{old('presentation')}}" class="form-control" name="presentation" />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Excipient</label>
                                            <input type="text" class="form-control" name="excipient" />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Posologie pour adult</label>
                                            <input type="text"  value="{{old('padult')}}"  class="form-control" name="padult" />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Posologie pour enfant</label>
                                            <input type="text"   value="{{old('penfant')}}" class="form-control" name="penfant" />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Indications</label>
                                            <input type="text"  value="{{old('indications')}}"  class="form-control" name="indications" />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Contre-indication conduit</label>
                                            <select class="form-select"   value="{{old('ci_conduit')}}" name="ci_conduit">
                                                <option selected>...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Contre-indication monograph</label>
                                            <select class="form-select"   value="{{old('ci_monograph')}}" name="ci_monograph">
                                                <option selected>...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Contre-indication grossesse</label>
                                            <select class="form-select"  value="{{old('ci_grossesse')}}"name="ci_grossesse">
                                                <option selected>...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Référence labo du produit</label>
                                            <input type="text"  value="{{old('labo_produit')}}" class="form-control" name="labo_produit" />
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Conditionnement</label>
                                                <input type="text"   value="{{old('conditionnement')}}" class="form-control" name="conditionnement" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Monograph</label>
                                            <textarea name="description_monograph"  placeholder="{{old('description_monograph')}}"  class="form-control" cols="30" rows="5"></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="description"   placeholder="{{old('description')}}" value="{{old('description')}}"class="form-control" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
           @endsection