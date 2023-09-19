@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">


            <!--  modale  Ajouter un grade -->
            <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target="#gradeModal">
                Ajouter Un evenement
            </button>&nbsp;&nbsp;&nbsp;


            <div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="gradeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gradeModalLabel">Ajouter un evenement Mission </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">

                                    <form method="POST" action="{{route('store.evenementMission')}}"
                                        class="forms-sample" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <input type="hidden" name="id" value="">

                                            <label for="gradeInputUsername1">Evenement</label>
                                            <input type="text"
                                                class="form-control @error('evenement') is-invalid @enderror"
                                                name="evenement" autocomplete="off" placeholder="Entrer un evenement">
                                            @error('evenement')
                                            <span class=" text-danger">{{ $message}}</span>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="gradeInputUsername1">Date Debut</label>
                                                    <div class="input-group date datepicker" id="datePickerExample">
                                                        <input type="text" class="form-control"><span
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
                                                    </div>
                                                </div>
                                            </div><!-- Col -->
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="gradeInputUsername1">Date Fin</label>
                                                    <div class="input-group date datepicker" id="datePickerExample2">
                                                        <input type="text" class="form-control"><span
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
                                                    </div>
                                                </div>
                                            </div><!-- Col -->
                                        </div><!-- Row -->




                                        <!-- <div class="form-group">
                                            <label for="gradeInputUsername1">Date Fin</label>
                                            <input type="text"
                                                class="form-control @error('dateFin') is-invalid @enderror"
                                                name="dateFin" autocoamplete="off">

                                            @error('dateFin')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div> -->

                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Observation</label>

                                            <textarea class="form-control @error('observation') is-invalid @enderror"
                                                name="observation" autocoamplete="off" id="exampleFormControlTextarea1"
                                                rows="5"></textarea>


                                            @error('observation')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Retex</label>
                                            <textarea class="form-control @error('observation') is-invalid @enderror"
                                                name="observation" autocoamplete="off" id="exampleFormControlTextarea"
                                                rows="5"></textarea>

                                            @error('retex')
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
                    <h6 class="card-title">Liste des Evenements Missions</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>id#</th>
                                    <th>Evenement</th>
                                    <th>Date Debut</th>
                                    <th>date Fin</th>
                                    <th>Observation</th>
                                    <th>retex</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($evenementMissions as $key => $item )
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->evenement}}</td>
                                    <td>{{$item->dateDebut}}</td>
                                    <td>{{$item->dateFin}}</td>
                                    <td>{{$item->observation}}</td>
                                    <td>{{$item->retex}}</td>

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
                                                                    action="{{route('update.categorie', ['id' => $item->id]) }}"
                                                                    class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">Nom
                                                                            Categorie</label>
                                                                        <input type="text"
                                                                            class="form-control @error('nomCatg') is-invalid @enderror"
                                                                            name="nomCatg" autocoamplete="off"
                                                                            value="{{$item->nomCatg}}">

                                                                        @error('nomCatg')
                                                                        <span class="text-danger">{{ $message}}</span>
                                                                        @enderror

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">Intitule
                                                                            Categorie</label>
                                                                        <input type="text"
                                                                            class="form-control @error('') is-invalid @enderror"
                                                                            name="intitulCatg" autocoamplete="off"
                                                                            value="{{$item->intitulCatg}}">

                                                                        @error('intitulCatg')
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




                                        <a href="{{route('delete.evenementMission',$item->id)}}"
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