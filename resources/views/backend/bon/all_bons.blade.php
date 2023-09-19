@extends('gestionnaire.gestionnaire_dashboard')

@section('gestionnaire')
<script>
    $(document).ready(function() {
    var armeCounter = 0; // Compteur pour les champs d'armes

    $('#add-arme').click(function() {
        // Incrémentez le compteur
        armeCounter++;

        // Créez un identifiant unique pour le nouvel élément div
        var divId = 'armeDiv' + armeCounter;

        // Créer un élément div pour chaque arme
        var armeDiv = $('<div class="row" id="' + divId + '"></div>');

        // Sélecteur pour le nom de l'arme
        var nomArmeSelect = $('<div class="form-group col-sm-6"><label for="exampleInputEmail1">Nom Arme</label><select name="armes[]" > @foreach($armes as $arme)<option value="{{ $arme->id }}">{{ $arme->nom }}</option>@endforeach</select></div>');

        // Champ de quantité
        var quantiteInput = $('<div class="form-group col-sm-4"><label for="exampleInputEmail1">Quantité</label><input type="number" name="quantite" class="form-control"></div>');

        // Bouton de suppression avec confirmation
        var removeButton = $('<div class="form-group col-sm-2 d-flex align-items-end"><button type="button" class="remove-arme btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer</button></div>');

        // Ajouter les sélecteurs, le champ de quantité et le bouton à l'élément div
        armeDiv.append(nomArmeSelect, quantiteInput, removeButton);

        // Ajouter l'élément div au conteneur "armes"
        $('#armes').append(armeDiv);
    });

    $('#armes').on('click', '.remove-arme', function() {
        if (confirm("Êtes-vous sûr de vouloir supprimer cette arme ?")) {
            // Obtenir l'ID de l'élément div parent
            var parentDivId = $(this).closest('div.row').attr('id');
            // Supprimer l'élément div
            $('#' + parentDivId).remove();
        }
    });
});
</script>

<script>
    $(document).ready(function() {
        $('#add-munition').click(function() {
            // Créer un élément div pour chaque arme
            var munitionDiv = $('<div class="row"></div>');

            // Sélecteur pour le nom de l'arme
            var nomMunitionSelect = $('<div class="form-group col-sm-6"><label for="exampleInputEmail1">Type Munition</label><select name="munitions[]" id="munitions"> @foreach($munitions as $munition)<option value="{{ $munition->id }}">{{ $munition->type }}</option>@endforeach</select></div>');

            // Champ de quantité
            var quantiteInput = $('<div class="form-group col-sm-4"><label for="exampleInputEmail1">Quantité</label><input type="number" name="quantite" class="form-control"></div>');

            // Bouton de suppression
            // var removeButton = $('<div class="form-group col-sm-2 d-flex align-items-end"><button type="button" class="remove-arme" >Supprimer</button></div>');
            var removeButton = $('<div class="form-group col-sm-2 d-flex align-items-end"><button type="button" class="remove-munition btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer</button></div>');

            // Ajouter les sélecteurs, le champ de quantité et le bouton à l'élément div
            munitionDiv.append(nomMunitionSelect, quantiteInput, removeButton);

            // Ajouter l'élément div au conteneur "armes"
            $('#munitions').append(munitionDiv);
        });

        $('#munitions').on('click', '.remove-munition', function() {
            if (confirm("Êtes-vous sûr de vouloir supprimer cette munition ?")) {
            $(this).parent().parent().remove(); // Supprimer le div parent
        }
    });
    });
</script>

<script>
   $(document).ready(function() {
    $('#add-optique').click(function() {
        // Créer un élément div pour chaque optique
        var optiqueDiv = $('<div class="row"></div>');

        // Sélecteur pour le nom de l'optique
        var nomOptiqueSelect = $('<div class="form-group col-sm-6"><label for="exampleInputEmail1">Type Optique</label><select name="optiques[]" id="optiques"> @foreach($optiques as $optique)<option value="{{ $optique->id }}">{{ $optique->type }}</option>@endforeach</select></div>');

        // Champ de quantité
        var quantiteInput = $('<div class="form-group col-sm-4"><label for="exampleInputEmail1">Quantité</label><input type="number" name="quantite" class="form-control"></div>');

        // Bouton de suppression
        var removeButton = $('<div class="form-group col-sm-2 d-flex align-items-end"><button type="button" class="remove-optique btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer</button></div>');

        // Ajouter les sélecteurs, le champ de quantité et le bouton à l'élément div
        optiqueDiv.append(nomOptiqueSelect, quantiteInput, removeButton);

        // Ajouter l'élément div au conteneur "optiques"
        $('#optiques').append(optiqueDiv);
    });

    $('#optiques').on('click', '.remove-optique', function() {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet optique ?")) {
            $(this).parent().parent().remove(); // Supprimer le div parent
        }
    });
});

</script>



<div class="page-content">
    <nav class="page-breadcrumb">
            <ol class="breadcrumb">


                    <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                        <i class="fas fa-receipt"></i> Créer un bon
                    </button>


                    <!--  modale -->

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Creation de bon de Mission</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="wizard">
                                    <h2 class="text-center">Reférence de la personne</h2>

                                    <form method="POST" action="{{route('store.bon')}}" class="forms-sample" enctype="multipart/form-data">
                                                @csrf
                                        <section>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Nom personne</label>
                                                            <select class="@error('personnel') is-invalid @enderror" name="personnel">
                                                                @foreach($personnels as $personnel)
                                                                    <option value="{{ $personnel->id }}">{{ $personnel->nom }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('nom')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                            </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Date du bon</label>
                                                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" autocomplete="off" value="">
                                                            @error('date')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        </div>
                                                    </div><!-- Col -->

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Motif du bon</label>
                                                            <input type="text" class="form-control @error('type_bon') is-invalid @enderror" name="type_bon" placeholder="Entrer le motif du bon">
                                                            @error('type_bon')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        </div>
                                                    </div><!-- Col -->

                                                </div><!-- Row -->

                                                <br>

                                                <h2 class="text-center">Matériels</h2>
                                                <br>

                                                <button type="button" id="add-arme" class="btn btn-success">
                                                    <i class="fas fa-crosshairs"></i> Ajouter Arme
                                                </button>



                                                    <div class="row" id="armes">
                                                        <div class="form-group col-sm-4" >
                                                            <label for="exampleInputEmail1">Nom Arme</label>

                                                                <select  class="form-control" name="armes[]">
                                                                    @foreach($armes as $arme)
                                                                        <option value="{{ $arme->id }}">{{ $arme->nom }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('nom')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror

                                                        </div>

                                                        <div class="form-group col-sm-4">
                                                            <label for="quantite">Quantité</label>
                                                            <input type="number" name="quantite" class="form-control @error('quantite') is-invalid @enderror" >
                                                            @error('quantite')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <button type="button" id="add-munition" class="btn btn-success">
                                                        <i class="fas fa-bullseye"></i> Ajouter Munition
                                                    </button>

                                                    <div class="row" id="munitions">
                                                                <div class="form-group col-sm-4">
                                                                    <label for="exampleInputEmail1">Type Munition</label>
                                                                    <select  class="form-control" name="munitions[]">
                                                                        @foreach($munitions as $munition)
                                                                            <option value="{{ $munition->id }}">{{ $munition->type }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('type')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                                </div>

                                                                <div class="form-group col-sm-4">
                                                                    <label for="quantite">Quantité</label>
                                                                    <input type="number" name="quantite" class="form-control @error('quantite') is-invalid @enderror" >
                                                                    @error('quantite')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                    </div>
                                                    <br>
                                                    <button type="button" id="add-optique" class="btn btn-success">
                                                        <i class="fas fa-location-arrow"></i> Ajouter Optique
                                                    </button>

                                                    <div class="row" id="optiques">
                                                        <div class="form-group col-sm-4">
                                                            <label for="exampleInputEmail1">Type Optique</label>
                                                            <select  class="form-control" name="optiques[]">
                                                                @foreach($optiques as $optique)
                                                                        <option value="{{ $optique->id }}">{{ $optique->type }}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-4">
                                                            <label for="quantite">Quantité</label>
                                                            <input type="number" name="quantite" class="form-control @error('quantite') is-invalid @enderror" >
                                                            @error('quantite')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>


                                        </section>
                                        <div class="modal-footer">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fas fa-times"></i>
                                            </button>
                                                <button type="submit" class="btn btn-success">
                                                <i class="fas fa-save"></i> Enregistrer
                                            </button>
                                        </div>

                                    </form >
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title font-weight-bold">Liste des bons effectués</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                  <th >Id#</th>
                                  <th>Nom Personne</th>
                                  <th>Date bon</th>
                                  <th>Motif du bon</th>

                                  <th>Action</th>

                                </tr>
                              </thead>

                            <tbody>
                                @foreach ($bons as $key => $item )
                                <tr>
                                  <td>{{$key + 1}}</td>
                                  <td>{{$item->personnel->nom}}</td>
                                  <td>{{$item->date}}</td>
                                  <td>{{$item->type_bon}}</td>

                                    <td>

                                        <!-- Button to trigger the modal -->
                                        <button type="button" class="btn btn-inverse-warning" data-toggle="modal"
                                            data-target="#editModal{{$item->id}}">
                                            <i data-feather="edit"></i>
                                        </button>


                                        <!-- Edit Modal -->

                                        <div class="modal fade bd-example-modal-lg" id="editModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modification du bon</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="wizard">
                                                            <h2 class="text-center">Reférence de la personne</h2>
                                                            <form method="POST"  action="{{ route('update.bon', ['id' => $item->id])}}" class="forms-sample" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                                <section>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Nom personne</label>
                                                                                <select class="form-control @error('personnel') is-invalid @enderror" name="personnel">
                                                                                    @foreach($personnels as $personnel)
                                                                                        <option value="{{ $personnel->id }}" {{$personnel->id == $item->personnel_id ? 'selected' : ''}}>{{ $personnel->nom }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('nom')
                                                                                <span class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Date du bon</label>
                                                                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" autocomplete="off" value="{{$item->date}}">
                                                                                @error('date')
                                                                                <span class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Motif du bon</label>
                                                                                <input type="text" class="form-control @error('type_bon') is-invalid @enderror" name="type_bon" value="{{$item->type_bon}}">
                                                                                @error('type_bon')
                                                                                <span class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </section>
                                                                <section>
                                                                    <h2 class="text-center">Matériels</h2>
                                                                    <br>
                                                                    <button type="button" id="add-arme" class="btn btn-success">
                                                                        <i class="fas fa-crosshairs"></i> Ajouter Arme
                                                                    </button>
                                                                    <div class="row" id="armes">
                                                                        @foreach ($item->armes as $arme)
                                                                        <div class="form-group col-sm-4">
                                                                            <label for="exampleInputEmail1">Nom Arme</label>
                                                                            <select class="form-control" name="armes[]">
                                                                                @foreach($armes as $a)
                                                                                    <option value="{{ $a->id }}" {{$a->id == $arme->id ? 'selected' : ''}}>{{ $a->nom }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-sm-4">
                                                                            <label for="exampleInputEmail1">Quantité</label>
                                                                            <input type="number" name="quantite[]" class="form-control" value="{{$arme->pivot->quantite}}">
                                                                        </div>
                                                                        @endforeach
                                                                    </div>

                                                                    <button type="button" id="add-munition" class="btn btn-success">
                                                                        <i class="fas fa-bullseye"></i> Ajouter Munition
                                                                    </button>
                                                                    <br>

                                                                    <div class="row" id="munitions">
                                                                        @foreach ($item->munitions as $munition)
                                                                        <div class="form-group col-sm-4">
                                                                            <label for="exampleInputEmail1">Type Munition</label>
                                                                            <select class="form-control" name="munitions[]">
                                                                                @foreach($munitions as $a)
                                                                                    <option value="{{ $a->id }}" {{$a->id == $munition->id ? 'selected' : ''}}>{{ $a->type }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-sm-4">
                                                                            <label for="exampleInputEmail1">Quantité</label>
                                                                            <input type="number" name="quantite[]" class="form-control" value="{{$munition->pivot->quantite}}">
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <br>
                                                                    <button type="button" id="add-optique" class="btn btn-success">
                                                                        <i class="fas fa-location-arrow"></i> Ajouter Optique
                                                                    </button>

                                                                    <div class="row" id="optiques">
                                                                        @foreach ($item->optiques as $optique)
                                                                        <div class="form-group col-sm-4">
                                                                            <label for="exampleInputEmail1">Type Optique</label>
                                                                            <select class="form-control" name="optiques[]">
                                                                                @foreach($optiques as $a)
                                                                                    <option value="{{ $a->id }}" {{$a->id == $optique->id ? 'selected' : ''}}>{{ $a->type }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-sm-4">
                                                                            <label for="exampleInputEmail1">Quantité</label>
                                                                            <input type="number" name="quantite[]" class="form-control" value="{{$optique->pivot->quantite}}">
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <!-- Vous pouvez faire de même pour les munitions et les optiques ici -->
                                                                </section>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                    <button type="submit" class="btn btn-success">
                                                                        <i class="fas fa-save"></i> Enregistrer
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <a href="{{route('delete.bon',$item->id)}}" class="btn btn-inverse-danger"
                                            id="delete"><i data-feather="trash-2"></i></a>

                                            {{-- <a href="{{route('pdf')}}" class="btn btn-inverse-success"> <i class="fas fa-download"></i></a> --}}
                                            <a href="{{ route('telecharger.pdf', ['id' => $item->id]) }}" class="btn btn-inverse-success">
                                                <i class="fas fa-download"></i>
                                            </a>


                                    </td>


                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>






@endsection

