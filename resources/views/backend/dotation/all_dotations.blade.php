

@extends('gestionnaire.gestionnaire_dashboard')



@section('gestionnaire')
{{-- <style>
    /* Définissez la largeur et la hauteur de la case select */
    .js-example-basic-single {
        width: 200px; /* Remplacez la valeur par la largeur souhaitée */

        height: 40px; /* Remplacez la valeur par la hauteur souhaitée */

        border-radius: 0;
    }


</style> --}}
<style>
    .card {
        background-color: transparent;
        border: 1px solid rgba(0, 0, 0, 0.125); /* Bordure de la carte */
        border-radius: 0.3rem; /* Coins arrondis de la carte */
        box-shadow: 0 1rem 1rem rgba(0, 0, 0, 0.2); /* Ombre de la carte */
        border: 2px solid #808080;
    }
    .card-header {
        font-weight: bold;
        background-color: #f8f9fa;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }

    .card-body{

    }

    </style>


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                Créer une dotation
        </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


            <!--  modale -->

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter Dotation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">

                    <form method="POST" id="myForm" action="#" class="forms-sample"
                        enctype="multipart/form-data">
                            @csrf
                                <div id="wizard">
                                    <h2>Réf recepteur</h2>
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
                                    </section>

                             <h2>Armes</h2>
                <section>
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


                    </div>
                </section>

                  <h2>Munitions</h2>
                  <section>
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

            <div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
                    <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Enregistrer
                </button>
            </div>

             </section>

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
                    <h6 class="card-title font-weight-bold">Liste des dotations</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                  <th >Id#</th>

                                  <th>Nom Personne</th>
                                  <th>Marque arme</th>
                                  <th>Quantité</th>
                                  <th>Type arme</th>
                                  <th>Date</th>
                                  <th>Etat</th>


                                  <th>Action</th>

                                </tr>
                              </thead>

                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




<div class="d-flex justify-content-end">

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</div>


@endsection




