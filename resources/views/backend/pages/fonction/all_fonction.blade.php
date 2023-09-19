@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">


            <!--  modale  Ajouter un grade -->
            <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target="#gradeModal">
                Ajouter une Fonction
            </button>&nbsp;&nbsp;&nbsp;


            <div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="gradeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gradeModalLabel">Ajouter une Fonction</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">

                                    <form method="POST" action="{{route('store.fonction')}}" class="forms-sample"
                                        enctype="multipart/form-data">
                                        @csrf


                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Libelle</label>
                                            <input type="text"
                                                class="form-control @error('libelle') is-invalid @enderror"
                                                name="libelle" autocoamplete="off"
                                                placeholder="Entrer le libelle d'une fonction">

                                            @error('libelle')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>




                                        <div class="row">


                                            <div class=" col-sm-6">
                                                <div class="form-group">
                                                    <label for="gradeInputUsername1">Date Nomination</label>
                                                    <div class="input-group date datepicker" id="datePickerExample">
                                                        <input type="text" class="form-control"
                                                            class="form-control @error('dateNomination') is-invalid @enderror"
                                                            name=" dateNomination" autocoamplete="off"
                                                            id="exampleFormControlSelect1"><span
                                                            class="input-group-addon"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-calendar">
                                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2">
                                                                </rect>
                                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                                            </svg></span>
                                                        @error('dateNomination')
                                                        <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="gradeInputUsername1">Numero
                                                        Nomination</label>
                                                    <input type="number"
                                                        class="form-control @error('numeroNoteServiceNomination') is-invalid @enderror"
                                                        name="numeroNoteServiceNomination" autocoamplete=" off"
                                                        id="exampleInputNumber1" value="1">

                                                    @error('numeroNoteServiceNomination')
                                                    <span class="text-danger">{{ $message}}</span>
                                                    @enderror

                                                </div>
                                            </div>
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
                    <h6 class="card-title">Liste des fonctions</h6>
                    <div class="table-responsive table-striped">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>id#</th>
                                    <th>Libelle </th>
                                    <th>Date Nomination</th>
                                    <th>Numero Note Service Nomination</th>

                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fonctions as $key => $item )
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->libelle}}</td>
                                    <td>{{$item->dateNomination}}</td>
                                    <td>{{$item->numeroNoteServiceNomination}}</td>


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
                                                            Fonction
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
                                                                    action="{{route('update.fonction', ['id' => $item->id]) }}"
                                                                    class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">Libelle
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control @error('libelle') is-invalid @enderror"
                                                                            name="libelle" autocoamplete="off"
                                                                            value="{{$item->libelle}}">

                                                                        @error('libelle')
                                                                        <span class="text-danger">{{ $message}}</span>
                                                                        @enderror

                                                                    </div>

                                                                    <div class="row">


                                                                        <div class=" col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="gradeInputUsername1">Date
                                                                                    Nomination</label>
                                                                                <div class="input-group date datepicker"
                                                                                    id="datePickerExample">
                                                                                    <input
                                                                                        class="form-control @error('dateNomination') is-invalid @enderror"
                                                                                        name=" dateNomination"
                                                                                        autocoamplete="off"
                                                                                        id="exampleFormControlSelect1 "
                                                                                        value="{{$item->dateNomination}}"><span
                                                                                        class="input-group-addon"><svg
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            width="24" height="24"
                                                                                            viewBox="0 0 24 24"
                                                                                            fill="none"
                                                                                            stroke="currentColor"
                                                                                            stroke-width="2"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            class="feather feather-calendar">
                                                                                            <rect x="3" y="4" width="18"
                                                                                                height="18" rx="2"
                                                                                                ry="2">
                                                                                            </rect>
                                                                                            <line x1="16" y1="2" x2="16"
                                                                                                y2="6"></line>
                                                                                            <line x1="8" y1="2" x2="8"
                                                                                                y2="6"></line>
                                                                                            <line x1="3" y1="10" x2="21"
                                                                                                y2="10"></line>
                                                                                        </svg></span>
                                                                                    @error('dateNomination')
                                                                                    <span
                                                                                        class="text-danger">{{ $message}}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- Col -->
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="gradeInputUsername1">Numero
                                                                                    Nomination</label>
                                                                                <input type="number"
                                                                                    class="form-control @error('numeroNoteServiceNomination') is-invalid @enderror"
                                                                                    name="numeroNoteServiceNomination"
                                                                                    autocoamplete="off"
                                                                                    id="exampleInputNumber1" value="1"
                                                                                    value="{{$item->numeroNoteServiceNomination}}">

                                                                                @error('numeroNoteServiceNomination')
                                                                                <span
                                                                                    class="text-danger">{{ $message}}</span>
                                                                                @enderror

                                                                            </div>
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



                                        <a href="{{route('delete.fonction',$item->id)}}" class="btn btn-inverse-danger"
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