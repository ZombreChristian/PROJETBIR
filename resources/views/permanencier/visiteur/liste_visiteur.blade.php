@extends('permanencier.permanencier_dashboard')
@section('permanencier')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
        <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target=".bd-example-modal-lg">
                Créer un Visiteur
            </button>&nbsp;&nbsp;&nbsp;
            
            <!--  modale -->

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un Visiteur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                             
                                    <form method="POST" id="myForm" action="{{ route('store.visit') }}" class="forms-sample"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputUsername1">Nom :</label>
                                                <input type="text" class="form-control @error('vis_nom') is-invalid @enderror" name="vis_nom" autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputUsername1">Prénom :</label>
                                                <input type="text" class="form-control @error('vis_prenom') is-invalid @enderror" name="vis_prenom" autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputUsername1">Genre :</label>
                                                <select name="vis_genre" class="form-control @error('vis_genre') is-invalid @enderror" id="exampleFormControlSelect1">
                                                <option value="masculin">Masculin</option>
                                                <option value="feminin">Féminin</option>
                                               </select>
                                             </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputUsername1">Type Pièce:</label>
                                                <select name="type_piece" class="form-control" id="exampleFormControlSelect1">
                                                <option value="CNIB">CNIB</option>
                                                <option value="PASSEPORT">PASSEPORT</option>
                                                <option value="SIM">SIM</option>
                                                
                                               </select>
                                            </div>
                                           
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputUsername1">Numéro Pièce :</label>
                                                <input type="text" class="form-control @error('num_piece') is-invalid @enderror" name="num_piece" autocomplete="off">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputUsername1">Service Visité :</label>
                                                <select name="vis_ser" class="form-select @error('vis_ser') is-invalid @enderror" id="exampleFormControlSelect1" >
                                                    @foreach ($services as $service)
                                                    <option value="{{$service->id}}">{{$service->sigle_service}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                          
                                        </div>

                                      
                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputUsername1">Date de la visite:</label>
                                                <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate" >
                                                <input type="text" name="vis_date" class="form-control"><span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
								                </div>
                                            </div>
                                        <div class="form-group col-md-4">
                                                <label for="exampleInputUsername1">Heure Début:</label>
                                            <div class="input-group date timepicker" id="datetimepickerExample1" data-target-input="nearest" >
                                                    <input type="text" name="vis_debut" class="form-control datetimepicker-input" data-target="#datetimepickerExample1"/>
                                                <div class="input-group-append" data-target="#datetimepickerExample1" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i data-feather="clock"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputUsername1">Heure Fin :</label>
                                                <div class="input-group date timepicker" id="datetimepickerExample2" data-target-input="nearest" >
                                                        <input type="text" class="form-control datetimepicker-input"  name="vis_fin" data-target="#datetimepickerExample2"/>
                                                    <div class="input-group-append" data-target="#datetimepickerExample2" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i data-feather="clock"></i></div>
                                                    </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputUsername1">Téléphone :</label>
                                                <input type="number" class="form-control @error('vis_tel') is-invalid @enderror" name="vis_tel" autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputUsername1">Autorité Visitée:</label>
                                                <input type="text" class="form-control @error('aut_visiter') is-invalid @enderror" name="aut_visiter" autocomplete="off">
                                            </div>
        
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button> 

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
                    <h6 class="card-title">Liste Visiteurs</h6>
                    <div class="table-responsive table-striped">
                        <table id="dataTableExample" class="table">
                          
                            <thead>
                                <tr>
                                    <th>Id#</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Genre</th>
                                    <th>Date Visite</th>
                                    <th>Service Visité</th>
                                    <!-- <th>Heure Début</th>
                                    <th>Heure Fin</th>
                                    <th>Type Pièce</th>
                                    <th>N° Pièce </th>
                                    <th>Téléphone</th>
                                    <th>Autorité visitée</th> -->
                                    <th>Action</th>
                                </tr>
                          </thead>

                            <tbody>
                            @foreach ($visiteurs as $key => $item )
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$item->vis_nom}}</td>
                                <td>{{$item->vis_prenom}}</td>
                                <td>{{$item->vis_genre}}</td>
                                <td>{{$item->vis_date}}</td>
                               
                                <td>
                                 @if($item->service)
                                 {{$item->service->sigle_service}}
                                 @else
                                    aucun service
                                 @endif
                               </td>
                                <!-- <td>{{$item->vis_debut}}</td>
                                <td>{{$item->vis_fin}}</td>
                                <td>{{$item->type_piece}}</td>
                                <td>{{$item->num_piece}}</td>
                                <td>{{$item->vis_tel}}</td>
                                <td>{{$item->aut_visiter}}</td> -->
                                <td>
                                    <!-- Button to trigger the modal -->
                                    <button type="button" class="btn btn-inverse-warning" data-toggle="modal"
                                        data-target="#editModal{{$item->id}}">
                                        <i data-feather="edit"></i>
                                    </button>

                                            <!-- Edit Modal -->
           
                                         <div class="modal fade bd-example-modal-lg" id="editModal{{$item->id}}" tabindex="-1" role="dialog" 
                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Modifier Visiteur
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
                                                                    action="{{ route('update.visit', ['id' => $item->id])}}"
                                                                    class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <!-- Rest of the form fields -->
                                                                   
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label for="exampleInputUsername1">Nom :</label>
                                                                            <input type="text" value="{{$item->vis_nom}}" class="form-control @error('vis_nom') is-invalid @enderror" name="vis_nom" autocomplete="off">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="exampleInputUsername1">Prénom :</label>
                                                                            <input type="text" value="{{$item->vis_prenom}}" class="form-control @error('vis_prenom') is-invalid @enderror" name="vis_prenom" autocomplete="off">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="exampleInputUsername1">Genre :</label>
                                                                            <select name="vis_genre" value="{{$item->vis_genre}}" class="form-control @error('vis_genre') is-invalid @enderror" id="exampleFormControlSelect1">
                                                                            <option value="" disabled>Sélectionnez le genre</option>
                                                                            <option value="masculin" @if($item->vis_genre == 'masculin') selected @endif>Masculin</option>
                                                                            <option value="feminin" @if($item->vis_genre == 'feminin') selected @endif>Féminin</option>
                                                                           </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label for="exampleInputUsername1">Type Pièce:</label>
                                                                        <select name="type_piece" class="form-control" id="exampleFormControlSelect1">
                                                                            <option value="CNIB" @if($item->type_piece == 'CNIB') selected @endif>CNIB</option>
                                                                            <option value="PASSEPORT" @if($item->type_piece == 'PASSEPORT') selected @endif>PASSEPORT</option>
                                                                            <option value="SIM" @if($item->type_piece == 'SIM') selected @endif>SIM</option>
                                                                            
                                                                        </select>
                                                                        </div>
                                                                    
                                                                        <div class="form-group col-md-4">
                                                                            <label for="exampleInputUsername1">Numéro Pièce :</label>
                                                                            <input type="text" value="{{$item->num_piece}}" class="form-control @error('num_piece') is-invalid @enderror" name="num_piece" autocomplete="off">
                                                                        </div>

                                                                        <div class="form-group col-md-4">
                                                                            <label for="exampleInputUsername1">Service Visité :</label>
                                                                            <select name="vis_ser" value="{{$item->vis_ser}}" class="form-select @error('vis_ser') is-invalid @enderror" id="exampleFormControlSelect1" >
                                                                               <option value="" disabled="">Sélectionnez le sevice</option>
                                                                                @foreach ($services as $service)
                                                                                <option value="{{$service->id}}" {{ $service->id == $item->vis_ser ? 'selected' : '' }}>{{$service->sigle_service}}</option>
                                                                                @endforeach ()
                                                                            </select>
                                                                        </div>
                                                                    
                                                                    </div>

                                                                        <div class="form-row">
                                                                                <div class="form-group col-md-4">
                                                                                    <label for="exampleInputUsername1">Date de la visite:</label>
                                                                                    <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate" >
                                                                                    <input type="text" value="{{$item->vis_date}}" name="vis_date" class="form-control"><span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                                                                                    </div>
                                                                                </div>
                                                                            <div class="form-group col-md-4">
                                                                                    <label for="exampleInputUsername1">Heure Début:</label>
                                                                                <div class="input-group date timepicker" id="datetimepickerExample1" data-target-input="nearest" >
                                                                                        <input type="text" value="{{$item->vis_debut}}" name="vis_debut" class="form-control datetimepicker-input" data-target="#datetimepickerExample1"/>
                                                                                    <div class="input-group-append" data-target="#datetimepickerExample1" data-toggle="datetimepicker">
                                                                                        <div class="input-group-text"><i data-feather="clock"></i></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                                <div class="form-group col-md-4">
                                                                                    <label for="exampleInputUsername1">Heure Fin :</label>
                                                                                    <div class="input-group date timepicker" id="datetimepickerExample2" data-target-input="nearest" >
                                                                                            <input type="text" value="{{$item->vis_fin}}" class="form-control datetimepicker-input"  name="vis_fin" data-target="#datetimepickerExample2"/>
                                                                                        <div class="input-group-append" data-target="#datetimepickerExample2" data-toggle="datetimepicker">
                                                                                            <div class="input-group-text"><i data-feather="clock"></i></div>
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                                <div class="form-group col-md-4">
                                                                                    <label for="exampleInputUsername1">Téléphone :</label>
                                                                                    <input type="number" value="{{$item->vis_tel}}" class="form-control @error('vis_tel') is-invalid @enderror" name="vis_tel" autocomplete="off">
                                                                                </div>
                                                                                <div class="form-group col-md-4">
                                                                                    <label for="exampleInputUsername1">Autorité Visitée:</label>
                                                                                    <input type="text" value="{{$item->aut_visiter}}" class="form-control @error('aut_visiter') is-invalid @enderror" name="aut_visiter" autocomplete="off">
                                                                                </div>
                                            
                                                                        </div>
                                                                                                                                
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

                                        <button type="button" class="btn btn-inverse-info" data-toggle="modal"
                                        data-target="#allModal{{$item->id}}">
                                        <i data-feather="info"></i>
                                       </button>
                                        

                                       <div class="modal fade bd-example-modal-lg" id="allModal{{$item->id}}" tabindex="-1" role="dialog" 
                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Info Visiteur
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
                                                                    action="{{ route('update.visit', ['id' => $item->id])}}"
                                                                    class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <!-- Rest of the form fields -->
                                                                   
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label for="exampleInputUsername1">Nom:  {{$item->vis_nom}}</label>

                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="exampleInputUsername1">Prénom:  {{$item->vis_prenom}}</label>
                                                                           
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="exampleInputUsername1">Genre:  {{$item->vis_genre}}</label>
                                                                          
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label for="exampleInputUsername1">Type Pièce:   {{$item->type_piece}}</label>
                                                                        
                                                                        </div>
                                                                    
                                                                        <div class="form-group col-md-4">
                                                                            <label for="exampleInputUsername1">Numéro Pièce:  {{$item->num_piece}}</label>
                                                                            
                                                                        </div>

                                                                        <div class="form-group col-md-4">
                                                                            <label for="exampleInputUsername1">Service Visité: 
                                                                                @if($item->service)
                                                                                {{$item->service->sigle_service}}
                                                                                @else
                                                                                    aucun service
                                                                                @endif
                                                                            </label>
                                                                            
                                                                        </div>
                                                                    
                                                                    </div>

                                                                        <div class="form-row">
                                                                                <div class="form-group col-md-4">
                                                                                   
                                                                                <label for="exampleInputUsername1">Heure Début: {{$item->vis_debut}}</label>
                                                                                </div>
                                                                            <div class="form-group col-md-4">
                                                                            <label for="exampleInputUsername1">Heure Fin: {{$item->vis_fin}}</label>
                                                                                
                                                                            </div>
                                                                                <div class="form-group col-md-4">
                                                                                <label for="exampleInputUsername1">Date visite: {{$item->vis_date}}</label>
                                                                                    
                                                                                  
                                                                              </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                                <div class="form-group col-md-4">
                                                                                    <label for="exampleInputUsername1">Téléphone :{{$item->vis_tel}}</label>
                                                                                    
                                                                                </div>
                                                                                <div class="form-group col-md-4">
                                                                                    <label for="exampleInputUsername1">Autorité Visitée: {{$item->aut_visiter}}</label>
                                                                                    
                                                                                </div>
                                            
                                                                        </div>
                                                                                                                                
                                                                    
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Fermer</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

















                                    <a href="{{ route('delete.visit',$item->id)}}" class="btn btn-inverse-danger" id="delete">
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
