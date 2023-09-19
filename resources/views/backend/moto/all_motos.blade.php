

@extends('gestionnaire.gestionnaire_dashboard')



@section('gestionnaire')


<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target="#exampleModal">
                Ajouter Moto
            </button>
            <!--  modale -->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter moto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class=" card-body">
                                    <form method="POST" action="{{route('store.moto')}}" class="forms-sample" enctype="multipart/form-data">
                                        @csrf
                                          <div class="form-group">
                                              <label for="exampleInputUsername1">N° serie</label>
                                              <input type="int" class="form-control @error('noSerieMot') is-invalid @enderror" name="noSerieMot" autocomplete="off" value="">
                                              @error('noSerieMot')
                                                <span class="text-danger">{{ $message}}</span>
                                              @enderror
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputUsername1">Nom moto </label>
                                            <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" autocomplete="off" value="">
                                            @error('nom')
                                              <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                        </div>



                                          <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
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
                    <h6 class="card-title">Liste Motos</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Id#</th>
                                    <th>N° serie</th>
                                    <th>Nom moto</th>
                                    <th>Action</th>
                                </tr>
                              </thead>

                            <tbody>
                            @foreach ($motos as $key => $item )
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->noSerieMot}}</td>
                                    <td>{{$item->nom}}</td>
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
                                                        <h5 class="modal-title" id="editModalLabel">Modifier moto</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h6 class="card-title">Modifier moto</h6>
                                                                <form method="POST" action="{{route('update.moto')}}" class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$item->id}}">

                                                                      <div class="form-group">
                                                                          <label for="exampleInputUsername1">N° serie</label>
                                                                          <input type="int" class="form-control @error('noSerieMot') is-invalid @enderror" name="noSerieMot" autocomplete="off" value="{{$item->noSerieMot}}">
                                                                          @error('noSerieMot')
                                                                            <span class="text-danger">{{ $message}}</span>
                                                                          @enderror
                                                                      </div>
                                                                      <div class="form-group">
                                                                        <label for="exampleInputUsername1">Nom moto </label>
                                                                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" autocomplete="off" value="{{$item->nom}}">
                                                                        @error('nom')
                                                                          <span class="text-danger">{{ $message}}</span>
                                                                        @enderror
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
                                        <a href="{{route('delete.moto',$item->id)}}" class="btn btn-inverse-danger"
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




