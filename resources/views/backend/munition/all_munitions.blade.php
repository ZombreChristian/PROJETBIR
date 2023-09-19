

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
                Ajouter Munition
            </button>
            <!--  modale -->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter des munitions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class=" card-body">
                                    <form method="POST" action="{{route('store.munition')}}" class="forms-sample" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">N° serie</label>
                                                    <input type="int" class="form-control @error('noSerieMuni') is-invalid @enderror" name="noSerieMuni" autocomplete="off" value="">
                                                    @error('noSerieMuni')
                                                      <span class="text-danger">{{ $message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Nom munition</label>
                                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" autocomplete="off" value="">
                                                    @error('nom')
                                                      <span class="text-danger">{{ $message}}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Type munition</label>
                                                    <select class="form-control @error('type') is-invalid @enderror" name="type">
                                                        <option value="" disabled selected>Choisissez un type</option>
                                                        @foreach(['Cartouches pour armes portatives',"Obus",'Roquette',"Missiles",'Mines',"Grenades",'Explosifs et artifices de destruction',"Artifices eclairants et de signalisation",'Bombes'] as $option)
                                                            <option value="{{ $option }}" {{ old('type') === $option ? 'selected' : '' }}>{{ $option }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Date</label>
                                                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" autocomplete="off" value="">
                                                    @error('date')
                                                      <span class="text-danger">{{ $message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Quantité</label>
                                                    <input type="number" class="form-control @error('quantite') is-invalid @enderror" name="quantite" autocomplete="off" value="">
                                                    @error('date')
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
                    <h6 class="card-title">Liste des munitions</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Id#</th>
                                    <th>N° serie</th>
                                    <th>Nom munition</th>
                                    <th>Type munition</th>
                                    <th>Date</th>
                                    <th>Quantité</th>
                                    <th>Action</th>

                                </tr>
                              </thead>

                            <tbody>
                                @foreach ($munitions as $key => $item )                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->noSerieMuni}}</td>
                                    <td>{{$item->nom}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->quantite}}</td>

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
                                                        <h5 class="modal-title" id="editModalLabel">Modifier Munition</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h6 class="card-title">Modifier Munition</h6>

                                                                  <form method="POST" action="{{route('update.munition',['id' => $item->id])}}" class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$item->id}}">

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputUsername1">N° serie</label>
                                                                                <input type="int" class="form-control @error('noSerieMuni') is-invalid @enderror" name="noSerieMuni" autocomplete="off" value="{{$item->noSerieMuni}}">
                                                                                @error('noSerieMuni')
                                                                                  <span class="text-danger">{{ $message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputUsername1">Nom munition</label>
                                                                                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" autocomplete="off" value="{{$item->nom}}">
                                                                                @error('nom')
                                                                                  <span class="text-danger">{{ $message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputUsername1">Type munition</label>
                                                                                <select class="form-control @error('type') is-invalid @enderror" name="type">
                                                                                    <option value="" disabled selected>Choisissez un type</option>
                                                                                    @foreach(['Cartouches pour armes portatives',"Obus",'Roquette',"Missiles",'Mines',"Grenades",'Explosifs et artifices de destruction',"Artifices eclairants et de signalisation",'Bombes'] as $option)
                                                                                        <option value="{{ $option }}" {{ old('type', $item->type) === $option ? 'selected' : '' }}>{{ $option }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('type')
                                                                                    <span class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputUsername1">Date</label>
                                                                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" autocomplete="off" value="{{$item->date}}">
                                                                                @error('date')
                                                                                  <span class="text-danger">{{ $message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputUsername1">Quantité</label>
                                                                                <input type="number" class="form-control @error('quantite') is-invalid @enderror" name="quantite" autocomplete="off" value="{{$item->quantite}}">
                                                                                @error('date')
                                                                                  <span class="text-danger">{{ $message}}</span>
                                                                                @enderror
                                                                            </div>

                                                                        </div>

                                                                        <div class="col-sm-6">
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
                                        <a href="{{route('delete.munition',$item->id)}}" class="btn btn-inverse-danger"
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

