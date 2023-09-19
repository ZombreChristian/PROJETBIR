@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">


            <!--  modale  Ajouter un grade -->
            <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target="#gradeModal">
                Ajouter une Permission
            </button>&nbsp;&nbsp;&nbsp;


            <div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="gradeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gradeModalLabel">Ajouter une Permission </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">

                                    <form method="POST" action="{{route('store.permissionIndisponibilite')}}"
                                        class="forms-sample" enctype="multipart/form-data">
                                        @csrf


                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Libelle</label>
                                            <input type="text"
                                                class="form-control @error('libelle') is-invalid @enderror"
                                                name="libelle" autocoamplete="off"
                                                placeholder="Entrer le libelle d'une ">

                                            @error('libelle')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>


                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Personne Prevenir</label>
                                            <select class="form-control @error('personnePrevenir') is-invalid @enderror"
                                                name=" personnePrevenir" autocoamplete="off"
                                                id="exampleFormControlSelect1">
                                                <option selected disabled>Selectionner</option>
                                                <option>12-18</option>
                                                <option>18-22</option>
                                                <option>22-30</option>
                                                <option>30-60</option>
                                                <option>Above 60</option>
                                            </select>
                                            @error('personnePrevenir')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>


                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Lieu</label>
                                            <select class="form-control @error('lieu') is-invalid @enderror" name="lieu"
                                                autocoamplete="off">
                                                <option selected disabled>Selectionner</option>
                                                <option>12-18</option>
                                                <option>18-22</option>
                                                <option>22-30</option>
                                                <option>30-60</option>
                                                <option>Above 60</option>
                                            </select>
                                            @error('lieu')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Motif</label>
                                            <input type="text" class="form-control @error('motif') is-invalid @enderror"
                                                name="motif" autocoamplete="off" placeholder="Entrer le motif d'une ">

                                            @error('motif')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputNumber1">Nombre Jours</label>
                                            <input class="form-control @error('nbreJours') is-invalid @enderror"
                                                name="nbreJours" autocoamplete="off"
                                                placeholder="Entrer le nbreJours d'une " type="number"
                                                id="exampleInputNumber1" value="6473786">

                                            @error('nbreJours')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>


                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Addresse Permission</label>
                                            <input type="text"
                                                class="form-control @error('addressPermission') is-invalid @enderror"
                                                name="addressPermission" autocoamplete="off"
                                                placeholder="Entrer le address Permission d'une ">

                                            @error('addressPermission')
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
                    <h6 class="card-title">Liste des Permissions </h6>
                    <div class="table-responsive table-striped">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>id#</th>
                                    <th>libelle </th>
                                    <th>Personne Prevenir</th>
                                    <th>Lieu</th>
                                    <th>Motif</th>
                                    <th>Nombre de jours</th>
                                    <th>Address permission</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissionIndisponibilites as $key => $item )
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->libelle}}</td>
                                    <td>{{$item->personnePrevenir}}</td>
                                    <td>{{$item->lieu}}</td>
                                    <td>{{$item->motif}}</td>
                                    <td>{{$item->nbreJours}}</td>
                                    <td>{{$item->addressPermission}}</td>
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



                                                                <form method="POST"
                                                                    action="{{route('update.permissionIndisponibilite', ['id' => $item->id]) }}"
                                                                    class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">libelle</label>
                                                                        <input type="text"
                                                                            class="form-control @error('libelle') is-invalid @enderror"
                                                                            name="libelle" autocoamplete="off"
                                                                            value="{{$item->libelle}}">

                                                                        @error('libelle')
                                                                        <span class="text-danger">{{ $message}}</span>
                                                                        @enderror

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">Personne
                                                                            Prevenir</label>
                                                                        <input type="text"
                                                                            class="form-control @error('personnePrevenir') is-invalid @enderror"
                                                                            name="personnePrevenir" autocoamplete="off"
                                                                            value="{{$item->personnePrevenir}}">

                                                                        @error('personnePrevenir')
                                                                        <span class="text-danger">{{ $message}}</span>
                                                                        @enderror

                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">Lieu</label>
                                                                        <input type="text"
                                                                            class="form-control @error('lieu') is-invalid @enderror"
                                                                            name="lieu" autocoamplete="off"
                                                                            value="{{$item->lieu}}">

                                                                        @error('lieu')
                                                                        <span class="text-danger">{{ $message}}</span>
                                                                        @enderror

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">motif</label>
                                                                        <input type="text"
                                                                            class="form-control @error('motif') is-invalid @enderror"
                                                                            name="motif" autocoamplete="off"
                                                                            value="{{$item->motif}}">

                                                                        @error('motif')
                                                                        <span class="text-danger">{{ $message}}</span>
                                                                        @enderror

                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">Nombre
                                                                            Jours</label>
                                                                        <input type="text"
                                                                            class="form-control @error('nbreJours') is-invalid @enderror"
                                                                            name="nbreJours" autocoamplete="off"
                                                                            value="{{$item->nbreJours}}">

                                                                        @error('nbreJours')
                                                                        <span class="text-danger">{{ $message}}</span>
                                                                        @enderror

                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">Address
                                                                            Permission
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control @error('addressPermission') is-invalid @enderror"
                                                                            name="addressPermission" autocoamplete="off"
                                                                            value="{{$item->addressPermission}}">

                                                                        @error('addressPermission')
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



                                        <a href="{{route('delete.permissionIndisponibilite',$item->id)}}"
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