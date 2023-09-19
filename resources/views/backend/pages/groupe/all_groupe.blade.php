@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">


            <!--  modale  Ajouter un grade -->
            <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target="#gradeModal">
                Ajouter un Groupe
            </button>&nbsp;&nbsp;&nbsp;


            <div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="gradeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gradeModalLabel">Ajouter un Groupe </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">

                                    <form method="POST" action="{{route('store.groupe')}}" class="forms-sample"
                                        enctype="multipart/form-data">
                                        @csrf


                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Nom Groupe</label>
                                            <input type="text"
                                                class="form-control @error('nomGroupe') is-invalid @enderror"
                                                name="nomGroupe" autocoamplete="off" placeholder="Entrer le nom d'un ">

                                            @error('nomGroupe')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label for="section_id">Nom Section :</label>
                                            <select name="section_id" class="js-example-basic-multiple w-100"
                                                multiple="multiple" id="section_id">
                                                @foreach ($sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->nomSection }}
                                                </option>
                                                @endforeach
                                            </select>
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
                    <h6 class="card-title">Liste des Groupes</h6>
                    <div class="table-responsive table-striped">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>id#</th>
                                    <th>Nom Groupe</th>
                                    <th>Nom Section</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groupes as $key => $item )
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->nomGroupe}}</td>

                                    <td>
                                        @foreach ($item->sections as $section)

                                        {{ $section->nomSection }}

                                        @endforeach
                                    </td> <!-- Autres colonnes de la table -->




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
                                                        <h5 class="modal-title" id="editModalLabel">Modifier Groupe
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
                                                                    action="{{route('update.groupe', ['id' => $item->id]) }}"
                                                                    class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">Groupe</label>
                                                                        <input type="text"
                                                                            class="form-control @error('nomGroupe') is-invalid @enderror"
                                                                            name="nomGroupe" autocoamplete="off"
                                                                            value="{{$item->nomGroupe}}">

                                                                        @error('nomGroupe')
                                                                        <span class="text-danger">{{ $message}}</span>
                                                                        @enderror



                                                                        <div class="form-group">
                                                                            <label for="section_id">Nom Section
                                                                                :</label>
                                                                            <select name="section_id"
                                                                                class="js-example-basic-multiple w-100"
                                                                                multiple="multiple" id="section_id">
                                                                                @foreach ($sections as $section)
                                                                                <option value="{{ $section->id }}">
                                                                                    {{ $section->nomSection }}
                                                                                </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
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



                                        <a href="{{route('delete.groupe',$item->id)}}" class="btn btn-inverse-danger"
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