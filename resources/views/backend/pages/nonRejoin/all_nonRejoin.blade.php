@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">


            <!--  modale  Ajouter un grade -->
            <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target="#gradeModal">
                Ajouter un NonRejoin
            </button>&nbsp;&nbsp;&nbsp;


            <div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="gradeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gradeModalLabel">Ajouter un NonRejoin </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">

                                    <form method="POST" action="{{route('store.nonRejoin')}}" class="forms-sample"
                                        enctype="multipart/form-data">
                                        @csrf


                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Libelle</label>
                                            <input type="text"
                                                class="form-control @error('libelle') is-invalid @enderror"
                                                name="libelle" autocoamplete="off" placeholder="Entrer le nom d'un ">

                                            @error('libelle')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>


                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Motif</label>
                                            <input type="text" class="form-control @error('motif') is-invalid @enderror"
                                                name="motif" autocoamplete="off" placeholder="Entrer le nom d'un ">

                                            @error('motif')
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
                    <h6 class="card-title">Liste des NonRejoins</h6>
                    <div class="table-responsive table-striped">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>id#</th>
                                    <th>Libelle</th>
                                    <th>Motif</th>


                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nonRejoins as $key => $item )
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->libelle}}</td>
                                    <td>{{$item->motif}}</td>



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
                                                                    action="{{route('update.nonRejoin', ['id' => $item->id]) }}"
                                                                    class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">Libelle</label>
                                                                        <input type="text"
                                                                            class="form-control @error('libelle') is-invalid @enderror"
                                                                            name="libelle" autocoamplete="off"
                                                                            value="{{$item->libelle}}">

                                                                        @error('libelle')
                                                                        <span class="text-danger">{{ $message}}</span>
                                                                        @enderror

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">Motif</label>
                                                                        <input type="text"
                                                                            class="form-control @error('motif') is-invalid @enderror"
                                                                            name="motif" autocoamplete="off"
                                                                            value="{{$item->motif}}">

                                                                        @error('motif')
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



                                        <a href="{{route('delete.nonRejoin',$item->id)}}" class="btn btn-inverse-danger"
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