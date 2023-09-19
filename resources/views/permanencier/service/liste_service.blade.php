@extends('permanencier.permanencier_dashboard')

@section('permanencier')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target="#exampleModal">
                Ajouter Service
            </button>&nbsp;&nbsp;&nbsp;
         

            <!--  modale -->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un Service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <form method="POST" id="myForm" action="{{route('store.service')}}" class="forms-sample"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="">

                                            <label for="exampleInputUsername1">Sigle Service</label>
                                            <input type="text" class="form-control @error('sigle_service') is-invalid @enderror"
                                                name="sigle_service" autocomplete="off">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Nom Service</label>
                                            <input type="text"
                                                class="form-control @error('nom_service') is-invalid @enderror"
                                                name="nom_service" autocomplete="off">

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
                    <h6 class="card-title">Liste Services</h6>
                    <div class="table-responsive table-striped">
                        <table id="dataTableExample" class="table">
                          
                            <thead>
                                <tr>
                                    <th>Id#</th>
                                    <th>Sigle Service</th>
                                    <th>Nom Service</th>
                                    <th>Date de création</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($services as $key => $item )
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$item->sigle_service}}</td>
                                <td>{{$item->nom_service}}</td>
                                <td>{{$item->created_at}}</td>
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
                                                        <h5 class="modal-title" id="editModalLabel">Modifier Service
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
                                                                    action="{{ route('update.service', ['id' => $item->id])}}"
                                                                    class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <!-- Rest of the form fields -->
                                                                    <div class="form-group">
                                                                        <label for="exampleInputUsername1">Sigle
                                                                            Service</label>
                                                                        <input type="text"
                                                                            class="form-control @error('sigle_service') is-invalid @enderror"
                                                                            name="sigle_service" autocomplete="off"
                                                                            value="{{$item->sigle_service}}">
                                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputUsername1">Nom
                                                                            Service</label>
                                                                        <input type="text"
                                                                            class="form-control @error('nom_service') is-invalid @enderror"
                                                                            name="nom_service" autocomplete="off"
                                                                            value="{{$item->nom_service}}">
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

                                    

                                    <a href="{{ route('delete.service',$item->id)}}" class="btn btn-inverse-danger" id="delete">
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
