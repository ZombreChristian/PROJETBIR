@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">


            <!--  modale  Ajouter un grade -->
            <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target="#gradeModal">
                Ajouter une Indisponibilite Stage
            </button>&nbsp;&nbsp;&nbsp;


            <div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="gradeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gradeModalLabel">Ajouter une indisponibilite Stage</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">

                                    <form method="POST" action="{{route('store.stage')}}" class="forms-sample"
                                        enctype="multipart/form-data">
                                        @csrf



                                        <div class="form-group">
                                            <label for="gradeInputUsername1">nom Stage </label>
                                            <input type="text"
                                                class="form-control @error('nom Stage') is-invalid @enderror"
                                                name="nom Stage" autocoamplete="off"
                                                placeholder="Entrer le nom d'unStage">

                                            @error('nom Stage')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>


                                        <div class="form-group">
                                            <label for="gradeInputUsername1">pays</label>
                                            <input type="text" class="form-control @error('pays') is-invalid @enderror"
                                                name="pays" autocoamplete="off" placeholder="Entrer le nom d'unStage">
                                            @error('pays')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>


                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Description</label>
                                            <input type="text"
                                                class="form-control @error('description') is-invalid @enderror"
                                                name="description" autocoamplete="off">

                                            @error('description')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>


                                        <button type="submit" class="btn btn-outline-success mr-2">Enregistrer</button>
                                        <button type="button" class="btn btn-outline-dark">Fermer</button>
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
                    <h6 class="card-title">Liste des indisponibilite Stages</h6>
                    <div class="table-responsive table-striped">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>id#</th>
                                    <th>NomStage</th>
                                    <th>Pays</th>
                                    <th>Description</th>


                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stages as $key => $item )
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->nomStage}}</td>
                                    <td>{{$item->pays}}</td>
                                    <td>{{$item->description}}</td>



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
                                                        <h5 class="modal-title" id="editModalLabel">Modifier une
                                                            indisponibilite
                                                            Stage
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
                                                                    action="{{route('update.stage', ['id' => $item->id]) }}"
                                                                    class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">Nom
                                                                            Stage</label>
                                                                        <input type="text"
                                                                            class="form-control @error('nomStage') is-invalid @enderror"
                                                                            name="nomStage" autocoamplete="off"
                                                                            value="{{$item->nomStage}}">

                                                                        @error('nomStage')
                                                                        <span class="text-danger">{{ $message}}</span>
                                                                        @enderror

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">Pays</label>
                                                                        <input type="text"
                                                                            class="form-control @error('pays') is-invalid @enderror"
                                                                            name="pays" autocoamplete="off"
                                                                            value="{{$item->pays}}">

                                                                        @error('pays')
                                                                        <span class="text-danger">{{ $message}}</span>
                                                                        @enderror

                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label
                                                                            for="gradeInputUsername1">Description</label>
                                                                        <input type="text"
                                                                            class="form-control @error('description') is-invalid @enderror"
                                                                            name="description" autocoamplete="off"
                                                                            value="{{$item->description}}">

                                                                        @error('description')
                                                                        <span class="text-danger">{{ $message}}</span>
                                                                        @enderror

                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-outline-success mr-2">Enregistrer</button>
                                                                    <button type="button"
                                                                        class="btn btn-outline-dark">Fermer</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <a href="{{route('delete.stage',$item->id)}}" class="btn btn-inverse-danger"
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