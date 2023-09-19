@extends('personnel.personnel_dashboard')
<script src="https::ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js">
</script>
@section('personnel')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target="#exampleModal">
                Ajouter un personnel
            </button>
            <!--  modale -->
            <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un Personnel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class=" card-body">
                                            <form method="POST" action="{{route('store.personnel')}}"
                                                class="forms-sample" enctype="multipart/form-data" class="forms-sample"
                                                enctype="multipart/form-data">
                                                @csrf


                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Matricule</label>
                                                            <input type="text"
                                                                class="form-control @error('matricule') is-invalid @enderror"
                                                                name="matricule" autocomplete="off" value="">
                                                            @error('matricule')
                                                            <span class="text-danger">{{ $message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Nom</label>
                                                            <input type="text"
                                                                class="form-control @error('nom') is-invalid @enderror"
                                                                name="nom" autocomplete="off" value="">
                                                            @error('nom')
                                                            <span class="text-danger">{{ $message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div><!-- Col -->

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Prénom</label>
                                                            <input type="text"
                                                                class="form-control @error('prennom') is-invalid @enderror"
                                                                name="prenom" autocomplete="off" value="">
                                                            @error('nom')
                                                            <span class="text-danger">{{ $message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Pseudo</label>
                                                            <input type="text"
                                                                class="form-control @error('pseudo') is-invalid @enderror"
                                                                name="pseudo" autocomplete="off" value="">
                                                            @error('pseudo')
                                                            <span class="text-danger">{{ $message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div><!-- Row -->
                                                <div class="row">

                                                    <div class="col-sm-6">

                                                        <div class="form-group">
                                                            <label for="gradeInputUsername1">Grade</label>
                                                            <select type="text"
                                                                class="form-control @error('grade') is-invalid @enderror"
                                                                G name="grade" autocoamplete="off"
                                                                placeholder="Entrer le nom d'une compagnie">

                                                                @foreach ($grades as $grade)
                                                                <option value="{{$grade->id}}">
                                                                    {{ $grade->nameGrade}}</option>
                                                                @endforeach


                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="gradeInputUsername1">Date Naissance</label>
                                                            <div class="input-group date datepicker"
                                                                id="datePickerExample">
                                                                <input type="text" class="form-control"><span
                                                                    class="input-group-addon"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-calendar">
                                                                        <rect x="3" y="4" width="18" height="18" rx="2"
                                                                            ry="2">
                                                                        </rect>
                                                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                                                    </svg></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label">Groupe Sanghin</label>
                                                            <select class="form-control" id="exampleFormControlSelect1">
                                                                <option selected="" disabled=""></option>
                                                                <option>O +</option>
                                                                <option>A +</option>
                                                                <option>AB</option>
                                                                <option>0 +</option>
                                                                <option>A -</option>
                                                            </select>
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Numero Téléphone</label>
                                                            <input type="number"
                                                                class="form-control @error('numeroTelephone') is-invalid @enderror"
                                                                name="numeroTelephone" autocomplete="off"
                                                                value="5786544">
                                                            @error('numeroTelephone')
                                                            <span class="text-danger">{{ $message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div><!-- Col -->
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="control-label"> Numero Whatsapp</label>
                                                            <input type="number"
                                                                class="form-control @error('numeroWhatsapp') is-invalid @enderror"
                                                                name="numeroWhatsapp" autocomplete="off"
                                                                value="7809883">
                                                            @error('numeroWhatsapp')
                                                            <span class="text-danger">{{ $message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div><!-- Col -->
                                                </div><!-- Row -->
                                                <div class="form-group">
                                                    <label for="fonction_id">Fonction :</label>
                                                    <select name="fonction_id" class="js-example-basic-multiple w-100"
                                                        multiple="multiple" id="fonction_id">
                                                        @foreach ($fonctions as $fonction)
                                                        <option value="{{ $fonction->id }}">
                                                            {{ $fonction->libelle }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Col -->

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Specialite</label>
                                                            <input type="text"
                                                                class="form-control @error('specialite') is-invalid @enderror"
                                                                name="specialite" autocomplete="off" value="">
                                                            @error('specialite')
                                                            <span class="text-danger">{{ $message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Status</label>

                                                            <select type="status"
                                                                class="form-control @error('status') is-invalid @enderror"
                                                                name="status" autocomplete="off" value="">
                                                                <option>Active</option>
                                                                <option>Inactive</option>
                                                            </select>
                                                            @error('status')
                                                            <span class="text-danger">{{ $message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div><!-- Col -->

                                                </div><!-- Row -->
                                                <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Fermer</button>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>

            </div>

        </ol>
    </nav>


    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Liste Personnel</h6>
                <div class="table-responsive  table-striped table-hover">
                    <div id="accordion" class="accordion" role="tablist">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Id#</th>
                                    <th>Matricule</th>
                                    <th>Profile</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Pseudo</th>
                                    <th>Grade</th>
                                    <th>Date Naissance </th>
                                    <th>Groupe Sanghin</th>
                                    <th>Numero Telephone</th>
                                    <th>Numero Whatsapp</th>
                                    <th>Specialite</th>
                                    <th>Status</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($personnels as $key => $item )
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>
                                        <img src="{{(!empty($item->photo))?url('upload/admin_images/'.$item->photo):url('upload/no_image.jpg')}}"
                                            alt="profile">
                                    </td>
                                    <td>{{$item->matricule}}</td>
                                    <td>{{$item->nom}}</td>
                                    <td>{{$item->prenom}}</td>
                                    <td>{{$item->pseudo}}</td>
                                    <td>
                                        @if($item->grad)
                                        {{$item->grad->nameGrade}}
                                        @else
                                        aucune grade
                                        @endif
                                    </td>
                                    <td>{{$item->dateNaissance}}</td>
                                    <td>{{$item->numeroTelephone}}</td>
                                    <td>{{$item->numeroWhatsapp}}</td>
                                    <td>
                                        @foreach ($item->fonctions as $fonction)

                                        {{ $fonction->libelle }}

                                        @endforeach
                                    </td>
                                    <td>
                                    <td>{{$item->specialite}}</td>

                                    <td>{{$item->status}}</td>
                                    <td>
                                        <a class="btn btn-inverse-warning edit" title="Edit" data-toggle="modal"
                                            data-target="#exampleModal"><i data-feather="edit"></i></a>

                                        <!--  modale  EDIT-->



                                        <a href="{{route('delete.personnel',$item->id)}}" class="btn btn-inverse-danger"
                                            id="delete" title="Delete"><i data-feather="trash-2"></i></a>


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </h6>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
