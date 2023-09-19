@extends('permanencier.permanencier_dashboard')
@section('permanencier')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
</script>
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target="#exampleModal">
                Créer Poste de garde
            </button>&nbsp;&nbsp;&nbsp;
           

            <!--  modale -->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un Poste de Garde</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                             
                                    <form method="POST" id="myForm" action="{{ route('store.poste') }}" class="forms-sample"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="">

                                            <label for="exampleInputUsername1">Nom Poste</label>
                                            <input type="text" class="form-control @error('poste_nom') is-invalid @enderror"
                                                name="poste_nom" autocomplete="off">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Lieu Poste</label>
                                            <input type="text"
                                                class="form-control @error('poste_lieu') is-invalid @enderror"
                                                name="poste_lieu" autocomplete="off">

                                        </div>

                                       
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
                    <h6 class="card-title">Liste Postes de Gardes</h6>
                    <div class="table-responsive table-striped">
                        <table id="dataTableExample" class="table">
                        
                            <thead>
                                <tr>
                                    <th>Id#</th>
                                    <th>Nom Poste</th>
                                    <th>Lieu Poste</th>
                                    <th>Date de création</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($postegardes as $key => $item )
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$item->poste_nom}}</td>
                                <td>{{$item->poste_lieu}}</td>
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
                                                        <h5 class="modal-title" id="editModalLabel">Modifier Poste de Garde
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
                                                                    action="{{ route('update.poste', ['id' => $item->id])}}"
                                                                    class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <!-- Rest of the form fields -->
                                                                    <div class="form-group">
                                                                        <label for="exampleInputUsername1">Nom Poste
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control @error('poste_nom') is-invalid @enderror"
                                                                            name="poste_nom" autocomplete="off"
                                                                            value="{{$item->poste_nom}}">
                                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputUsername1">Poste Lieu
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control @error('poste_lieu') is-invalid @enderror"
                                                                            name="poste_lieu" autocomplete="off"
                                                                            value="{{$item->poste_lieu}}">
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

                                    

                                    <a href="{{ route('delete.poste',$item->id)}}" class="btn btn-inverse-danger" id="delete">
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
