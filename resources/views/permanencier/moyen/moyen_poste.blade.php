@extends('permanencier.permanencier_dashboard')
@section('permanencier')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>
<style>
    /* Définissez la largeur et la hauteur de la case select */
    .js-example-basic-single {
        width: 200px; /* Remplacez la valeur par la largeur souhaitée */
        height: 40px; /* Remplacez la valeur par la hauteur souhaitée */
        border-radius: 0; /* Définissez la courbure de la bordure à zéro pour la rendre carrée */
    }
</style>
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
        <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                Créer Moyen Poste
            </button>&nbsp;&nbsp;&nbsp;
            
            <!--  modale -->

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter Moyen de Poste</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                             
                                    <form method="POST" id="myForm" action="{{ route('store.moyen') }}" class="forms-sample"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputUsername1">Numéro série:</label>
                                                <input type="text" class="form-control @error('moy_serie') is-invalid @enderror" name="moy_serie" autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputUsername1">Libellé:</label>
                                                <input type="text" class="form-control @error('moy_libelle') is-invalid @enderror" name="moy_libelle" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputUsername1">Modèle:</label>
                                                <input type="text" class="form-control @error('moy_modele') is-invalid @enderror" name="moy_modele" autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputUsername1">Origine:</label>
                                                <input type="text" class="form-control @error('moy_origine') is-invalid @enderror" name="moy_origine" autocomplete="off">
                                            </div>
                                        </div>

                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputUsername1">État:</label>
                                            <select name="moy_etat" class="form-control @error('moy_etat') is-invalid @enderror" id="exampleFormControlSelect1">
                                                <option value="bon">Bon</option>
                                                <option value="mauvais">Mauvais</option>
                                                <option value="neuf">Neuf</option>
                                                <option value="panne">Panne</option>
                                                <option value="disponible">Disponible</option>
                                                <option value="indisponible">Indisponible</option>
                                            </select>
                                        </div>

                                 
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputUsername1">Nombre:</label>
                                        <input type="number" class="form-control @error('moy_nbre') is-invalid @enderror" name="moy_nbre" autocomplete="off">
                                    </div>
                                        
                               </div>

                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Observation:</label>
                                        <textarea class="form-control @error('moy_observ') is-invalid @enderror" name="moy_observ" rows="4" autocomplete="off"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    </div>
                                    </form>
                                </div>
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
                    <h6 class="card-title">Liste Moyen Postes</h6>
                    <div class="table-responsive table-striped">
                        <table id="dataTableExample" class="table">
                         
                            <thead>
                                <tr>
                                    <th>Id#</th>
                                    <th>Moyen Serie</th>
                                    <th>Libelle</th>
                                    <th>Modèle</th>
                                    <th>Origine</th>
                                    <th>Nombre</th>
                                    <th>Etat</th>
                                    <th>Observation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($moyenpostes as $key => $item )
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$item->moy_serie}}</td>
                                <td>{{$item->moy_libelle}}</td>
                                <td>{{$item->moy_modele}}</td>
                                <td>{{$item->moy_origine}}</td>
                                <td>{{$item->moy_nbre}}</td>
                                <td>{{$item->moy_etat}}</td>
                                <td>{{$item->moy_observ}}</td>
                                
                                <td>
                                    <!-- Button to trigger the modal -->
                                    <button type="button" class="btn btn-inverse-warning" data-toggle="modal"
                                        data-target="#editModal{{$item->id}}">
                                        <i data-feather="edit"></i>
                                    </button>
       

                                            <!-- Edit Modal -->
                                            <div class="modal fade bd-example-modal-lg" id="editModal{{$item->id}}" tabindex="-1" role="dialog" 
                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myLargeModalLabel">Modifier Moyen Poste
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form to edit the specific item using its ID -->
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form method="POST"
                                                                    action="{{ route('update.moyen', ['id' => $item->id])}}"
                                                                    class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <!-- Rest of the form fields -->
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="exampleInputUsername1">Numéro série:</label>
                                                                            <input type="text" value="{{$item->moy_serie}}" class="form-control @error('moy_serie') is-invalid @enderror" name="moy_serie" autocomplete="off">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="exampleInputUsername1">Libellé:</label>
                                                                            <input type="text" value="{{$item->moy_libelle}}" class="form-control @error('moy_libelle') is-invalid @enderror" name="moy_libelle" autocomplete="off">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="exampleInputUsername1">Modèle:</label>
                                                                            <input type="text" value="{{$item->moy_modele}}" class="form-control @error('moy_modele') is-invalid @enderror" name="moy_modele" autocomplete="off">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="exampleInputUsername1">Origine:</label>
                                                                            <input type="text" value="{{$item->moy_origine}}" class="form-control @error('moy_origine') is-invalid @enderror" name="moy_origine" autocomplete="off">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="exampleInputUsername1">État:</label>
                                                                            <select name="moy_etat" class="form-control @error('moy_etat') is-invalid @enderror" id="exampleFormControlSelect1">
                                                                                <option value="" disabled="">Sélectionnez l'état</option>
                                                                                <option value="bon" @if($item->moy_etat == 'bon') selected @endif>Bon</option>
                                                                                <option value="mauvais" @if($item->moy_etat == 'mauvais') selected @endif>Mauvais</option>
                                                                                <option value="neuf" @if($item->moy_etat == 'neuf') selected @endif>Neuf</option>
                                                                                <option value="panne" @if($item->moy_etat == 'panne') selected @endif>Panne</option>
                                                                                <option value="disponible" @if($item->moy_etat == 'disponible') selected @endif>Disponible</option>
                                                                                <option value="indisponible" @if($item->moy_etat == 'indisponible') selected @endif>Indisponible</option>
                                                                            </select>
                                                                        </div>

                                                            
                                                                <div class="form-group col-md-6">
                                                                    <label for="exampleInputUsername1">Nombre:</label>
                                                                    <input type="number" value="{{$item->moy_nbre}}" class="form-control @error('moy_nbre') is-invalid @enderror" name="moy_nbre" autocomplete="off">
                                                                </div>
                                                                    
                                                        </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1">Observation:</label>
                                                                    <input type="text" value="{{$item->moy_observ}}" class="form-control @error('moy_observ') is-invalid @enderror" name="moy_observ" autocomplete="off">

                                                                </div>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                </div>
                                        
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    

                                    <a href="{{ route('delete.moyen',$item->id)}}" class="btn btn-inverse-danger" id="delete">
                                        <i data-feather="trash-2"></i>
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
