@extends('permanencier.permanencier_dashboard')
@section('permanencier')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target="#exampleModal">
                Créer un évènement
            </button>&nbsp;&nbsp;&nbsp;
            

            <!--  modale -->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un évènement</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                             
                                    <form method="POST" id="myForm" action="{{ route('store.even') }}" class="forms-sample"
                                        enctype="multipart/form-data">
                                        @csrf
    
                                        <label for="exampleInputUsername1">Date évènement:</label>
                                        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate" >
                                        <input type="text" name="even_date" class="form-control"><span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
								       </div><br>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <label for="exampleInputUsername1">heure début:</label>
                                            <div class="input-group date timepicker" id="datetimepickerExample1" data-target-input="nearest" >
                                                    <input type="text" name="even_debut" class="form-control datetimepicker-input" data-target="#datetimepickerExample1"/>
                                                <div class="input-group-append" data-target="#datetimepickerExample1" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i data-feather="clock"></i></div>
                                               </div>
                                            </div>
                                        </div><br>

                                        <div class="form-group col-md-6">
                                                    <label for="exampleInputUsername1">heure fin:</label>
                                                <div class="input-group date timepicker" id="datetimepickerExample2" data-target-input="nearest" >
                                                        <input type="text" class="form-control datetimepicker-input"  name="even_fin" data-target="#datetimepickerExample2"/>
                                                    <div class="input-group-append" data-target="#datetimepickerExample2" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i data-feather="clock"></i></div>
                                                    </div>
                                                </div>
                                        </div><br>
                                    </div>

                                    <label class="col-form-label">Description évènement</label>
                                    
									<textarea id="maxlength-textarea" class="form-control" maxlength="100" rows="6" placeholder="Décrivez l'évènement ici."  name="even_desc"></textarea>
									
                                    <br>
                                        <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
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
                    <h6 class="card-title">Liste Evènements</h6>
                    <div class="table-responsive table-striped">
                        <table id="dataTableExample" class="table">
                          
                            <thead>
                                <tr>
                                    <th>Id#</th>
                                    <th>Date Evènement</th>
                                    <th>Heure Debut</th>
                                    <th>Heure Fin</th>
                                    <th>Description Evenement</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($evenements as $key => $item )
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$item->even_date}}</td>
                                <td>{{$item->even_debut}}</td>
                                <td>{{$item->even_fin}}</td>
                                <td>{{$item->even_desc}}</td>
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
                                                        <h5 class="modal-title" id="editModalLabel">Modifier Evenement
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
                                                                    action="{{ route('update.even', ['id' => $item->id])}}"
                                                                    class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <!-- Rest of the form fields -->
                                                                    <label for="exampleInputUsername1">Date évènement:</label>
                                                                <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate" >
                                                                    <input type="text" value="{{$item->even_date}}"  name="even_date" class="form-control"><span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                                                                </div><br>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                    <label for="exampleInputUsername1">heure début:</label>
                                                                <div class="input-group date timepicker" id="datetimepickerExample1" data-target-input="nearest" >
                                                                        <input type="text" value="{{$item->even_debut}}" name="even_debut" class="form-control datetimepicker-input" data-target="#datetimepickerExample1"/>
                                                                    <div class="input-group-append" data-target="#datetimepickerExample1" data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i data-feather="clock"></i></div>
                                                                </div>
                                                                </div>
                                                            </div><br>

                                                            <div class="form-group col-md-6">
                                                                        <label for="exampleInputUsername1">heure fin:</label>
                                                                <div class="input-group date timepicker" id="datetimepickerExample2" data-target-input="nearest" >
                                                                            <input type="text" class="form-control datetimepicker-input"  value="{{$item->even_fin}}" name="even_fin" data-target="#datetimepickerExample2"/>
                                                                        <div class="input-group-append" data-target="#datetimepickerExample2" data-toggle="datetimepicker">
                                                                            <div class="input-group-text"><i data-feather="clock"></i></div>
                                                                        </div>
                                                                </div>
                                                            </div><br>
                                                        </div>

                                                                                    
                                                        <label class="col-form-label">Description évènement</label>
                                                        
                                                        <input type="textarea" id="maxlength-textarea" class="form-control" maxlength="100" rows="8" placeholder="Décrivez l'évènement ici." name="even_desc" value="{{$item->even_desc}}"/>
                                                    
                                                        <br>
                                                                    <button type="submit"
                                                                        class="btn btn-primary mr-2">Enregistrer</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Fermer</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    

                                    <a href="{{ route('delete.even',$item->id)}}" class="btn btn-inverse-danger" id="delete">
                                        <i data-feather="trash-2"></i>
                                    </a>
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
