@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">


            <!--  modale  Ajouter un grade -->
            <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target="#gradeModal">
                Ajouter un Moyen Mission
            </button>&nbsp;&nbsp;&nbsp;


            <div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="gradeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gradeModalLabel">Ajouter un Moyen Mission</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">

                                    <form method="POST" action="{{route('store.moyenMission')}}" class="forms-sample"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="">

                                            <label for="gradeInputUsername1">Nom Moyen</label>
                                            <input type="text"
                                                class="form-control @error('nomMoyens') is-invalid @enderror"
                                                name="nomMoyens" autocomplete="off"
                                                placeholder="Entrer le Nom Moyen Mission">
                                            @error('nomMoyens')
                                            <span class=" text-danger">{{ $message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Nombre Moyen</label>
                                            <input type="number"
                                                class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                                autocoamplete="off" id="exampleInputNumber1" value="1">


                                            @error('nombre')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>


                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Observation</label>

                                            <textarea class="form-control @error('observation') is-invalid @enderror"
                                                name="observation" autocoamplete="off" id="exampleFormControlTextarea1"
                                                rows="5"></textarea>


                                            @error('observation')
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
                    <h6 class="card-title">Liste des Moyens Missions</h6>
                    <div class="table-responsive table-striped">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>id#</th>
                                    <th>Nom du moyens</th>
                                    <th>nombre</th>
                                    <th>Observation</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($moyenMissions as $key => $item )
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->nomMoyens}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->observation}}</td>

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
                                                        <h5 class="modal-title" id="editModalLabel">Modifier Permission
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

                                                                value="{{$item->name}}"

                                                                <form method="POST"
                                                                    action="{{route('update.moyenMission', ['id' => $item->id]) }}"
                                                                    class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf


                                                                    <div class="form-group">
                                                                        <input type="hidden" name="id" value="">

                                                                        <label for="gradeInputUsername1">Nom
                                                                            Moyen</label>
                                                                        <input type="text"
                                                                            class="form-control @error('nomMoyens') is-invalid @enderror"
                                                                            name="nomMoyens" autocomplete="off"
                                                                            value="{{$item->nomMoyens}}">
                                                                        @error('nomMoyens')
                                                                        <span class=" text-danger">{{ $message}}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">Nombre
                                                                            Moyen</label>
                                                                        <input type="number"
                                                                            class="form-control @error('nombre') is-invalid @enderror"
                                                                            name="nombre" autocoamplete="off"
                                                                            id="exampleInputNumber1" value="1"
                                                                            value="{{$item->nombre}}">


                                                                        @error('nombre')
                                                                        <span class="text-danger">{{ $message}}</span>
                                                                        @enderror

                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label
                                                                            for="gradeInputUsername1">Observation</label>

                                                                        <textarea
                                                                            class="form-control @error('observation') is-invalid @enderror"
                                                                            name="observation" autocoamplete="off"
                                                                            id="exampleFormControlTextarea1" rows="5"
                                                                            value="{{$item->observation}}"></textarea>


                                                                        @error('observation')
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


                                        <a href="{{route('delete.moyenMission',$item->id)}}"
                                            class="btn btn-inverse-danger" id="delete"><i
                                                data-feather="trash-2"></i></a>

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