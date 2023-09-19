

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


<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target="#exampleModal">
                Ajouter Arme
            </button>

            <a href="{{route('telecharger')}}" class="btn btn-inverse-success">Pdf
                <i class="fas fa-download"></i>
            </a>

            <a href="{{route('liste.arme')}}">List Arme</a>
            <!--  modale -->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter une arme</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class=" card-body">
                                    <form method="POST" action="{{route('store.arme')}}" class="forms-sample" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">N° serie</label>
                                                    <input type="int" class="form-control @error('noSerieArme') is-invalid @enderror" name="noSerieArme" autocomplete="off" value="">
                                                    @error('noSerieArme')
                                                      <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Nom arme</label>
                                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" autocomplete="off" value="">
                                                    @error('nom')
                                                      <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Marque arme</label>
                                                    <input type="text" class="form-control @error('marque') is-invalid @enderror" name="marque" autocomplete="off" value="">
                                                    @error('marque')
                                                      <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Type Arme</label>
                                                    <select name="type" class="form-select" id="">
                                                        <option select="" disabled="">Select Arme</option>

                                                        @foreach($types_armes as $type_arme)
                                                        <option value="{{$type_arme ->id }}">{{$type_arme ->nom }}</option>
                                                        @endforeach
                                                    </select>

                                                </div><!-- Col -->
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Date</label>
                                                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" autocomplete="off" value="">
                                                    @error('date')
                                                      <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Etat</label>
                                                    <select class="js-example-basic-single  @error('etat') is-invalid @enderror" name="etat">
                                                        {{-- <select class="js-example-basic-single form-select select2-hidden-accessible"  @error('etat') is-invalid @enderror name="etat"> --}}
                                                        @foreach(['Bon état', 'Mauvais état réparable', 'Mauvais état non réparable'] as $option)
                                                            <option value="{{ $option }}" {{ old('etat') === $option ? 'selected' : '' }}>{{ $option }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('etat')
                                                        <span class="text-danger">{{$message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Provenance</label>
                                                    <input type="text" class="form-control @error('provenance') is-invalid @enderror" name="provenance" autocomplete="off" value="">
                                                    @error('provenance')
                                                      <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Quantité</label>
                                                <input type="number" class="form-control @error('quantite') is-invalid @enderror" name="quantite" autocomplete="off" value="">
                                                @error('quantite')
                                                  <span class="text-danger">{{ $message}}</span>
                                                @enderror
                                            </div>
                                            </div>


                                        </div>

                          <button type="submit" class="btn btn-success mr-2">Enregistrer</button>
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
                    <h6 class="card-title font-weight-bold">Liste Arme</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                  <th >Id#</th>
                                  <th>N° serie</th>
                                  <th>Nom arme</th>
                                  <th>Marque arme</th>
                                  <th>Quantité</th>
                                  <th>Type arme</th>
                                  <th>Date</th>
                                  <th>Etat</th>
                                  <th>Provenance</th>

                                  <th>Action</th>

                                </tr>
                              </thead>

                            <tbody>
                                @foreach ($armes as $key => $item )
                                <tr>
                                  <td>{{$key + 1}}</td>
                                  <td>{{$item->noSerieArme}}</td>
                                  <td>{{$item->nom}}</td>
                                  <td>{{$item->marque}}</td>
                                  <td>{{$item->quantite}}</td>
                                  <td>
                                    @if ($item->typeArme) <!-- Vérifiez si la relation typeArme existe -->
                                        {{$item->typeArme->nom}} <!-- Accédez au nom du type d'arme -->
                                    @else
                                        Aucun type d'arme associé
                                    @endif
                                </td>
                                <td>{{$item->date}}</td>
                                  <td>{{$item->etat}}</td>
                                  <td>{{$item->provenance}}</td>



                                    <td>

                                        <!-- Button to trigger the modal -->
                                        <button type="button" class="btn btn-inverse-warning" data-toggle="modal"
                                            data-target="#editModal{{$item->id}}">
                                            <i data-feather="edit"></i>
                                        </button>


                                        <!-- Edit Modal -->

                                        <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Modifier Arme</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h6 class="card-title">Modifier Arme</h6>

                                                                  <form method="POST" action="{{route('update.arme')}}" class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$item->id}}">

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputUsername1">N° serie</label>
                                                                                <input type="int" class="form-control @error('noSerieArme') is-invalid @enderror" name="noSerieArme" autocomplete="off" value="{{$item->noSerieArme}}" readonly>
                                                                                @error('noSerieArme')
                                                                                  <span class="text-danger">{{ $message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputUsername1">Nom arme</label>
                                                                                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" autocomplete="off" value="{{$item->nom}}">
                                                                                @error('nom')
                                                                                  <span class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputUsername1">Marque arme</label>
                                                                                <input type="text" class="form-control @error('marque') is-invalid @enderror" name="marque" autocomplete="off" value="{{$item->marque}}">
                                                                                @error('marque')
                                                                                  <span class="text-danger">{{$message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputUsername1">Type Arme</label>
                                                                                <select name="type" class="form-select" id="type">
                                                                                    <option value="" disabled>Sélectionnez le type d'arme</option>
                                                                                    @foreach($types_armes as $type_arme)
                                                                                        <option value="{{ $type_arme->id }}" {{ $type_arme->id == $item->type ? 'selected' : '' }}>
                                                                                            {{ $type_arme->nom }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>





                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputUsername1">Date</label>
                                                                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" autocomplete="off" value="{{$item->date}}">
                                                                                @error('date')
                                                                                  <span class="text-danger">{{ $message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6">

                                                                            <div class="form-group">
                                                                                <label for="exampleInputUsername1">Etat</label>
                                                                                <select class="form-control @error('etat') is-invalid @enderror" name="etat">
                                                                                    <option value="" disabled>Choisissez un état</option>
                                                                                    @foreach(['Bon état', 'Mauvais état réparable', 'Mauvais état non réparable'] as $option)
                                                                                        <option value="{{ $option }}" {{ old('etat', $item->etat) === $option ? 'selected' : '' }}>
                                                                                            {{ $option }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('etat')
                                                                                    <span class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputUsername1">Provenance</label>
                                                                                <input type="text" class="form-control @error('provenance') is-invalid @enderror" name="provenance" autocomplete="off" value="{{$item->provenance}}">
                                                                                @error('provenance')
                                                                                  <span class="text-danger">{{ $message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputUsername1">Quantité</label>
                                                                                <input type="number" class="form-control @error('quantite') is-invalid @enderror" name="quantite" autocomplete="off" value="{{$item->quantite}}">
                                                                                @error('quantite')
                                                                                  <span class="text-danger">{{ $message}}</span>
                                                                                @enderror
                                                                            </div>

                                                                        </div>




                                                                    </div>



                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">fermer</button>
                                                                        <button type="submit" class="btn btn-success">Enregistrer</button>
                                                                      </div>

                                                                      </form>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{route('delete.arme',$item->id)}}" class="btn btn-inverse-danger"
                                            id="delete"><i data-feather="trash-2"></i></a>

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

