@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">


            <!--  modale  Ajouter un grade -->
            <button type="button" class="btn btn-inverse-info" data-toggle="modal" data-target="#gradeModal">
                Ajouter une Grade
            </button>&nbsp;&nbsp;&nbsp;


            <div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="gradeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gradeModalLabel">Ajouter un grade</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">

                                    <form method="POST" action="{{route('store.grade')}}" class="forms-sample"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="gradeInputUsername1">code grade</label>
                                            <input type="text"
                                                class="form-control @error('codeGrade') is-invalid @enderror" G
                                                name="codeGrade" autocoamplete="off"
                                                placeholder="Entrer le nom d'une compagnie">

                                            @error('codeGrade')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Nom grade</label>
                                            <input type="text"
                                                class="form-control @error('nameGrade') is-invalid @enderror" G
                                                name="nameGrade" autocoamplete="off"
                                                placeholder="Entrer le nom d'une compagnie">

                                            @error('nameGrade')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label for="gradeInputUsername1">Categorie</label>
                                            <select type="text"
                                                class="form-control @error('categorie') is-invalid @enderror" G
                                                name="categorie" autocoamplete="off"
                                                placeholder="Entrer le nom d'une compagnie">

                                                @foreach ($categories as $categorie)
                                                <option value="{{$categorie->id}}">{{ $categorie->nomCatg}}</option>
                                                @endforeach


                                            </select>
                                        </div>

                                        <div class=" form-group">
                                            <label for="gradeInputUsername1">Age Retraite</label>
                                            <input type="text"
                                                class="form-control @error('ageRetraite') is-invalid @enderror" G
                                                name="ageRetraite" autocoamplete="off"
                                                placeholder="Entrer le nom d'une compagnie">

                                            @error('ageRetraite')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                        </div>





                                        <button type="submit" class="btn btn-outline-success">Enregistrer</button>
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
                    <h6 class="card-title">Liste des Grade</h6>
                    <div class="table-responsive table-striped">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>id#</th>
                                    <th>Nom du Grade</th>
                                    <th>Age Retraite</th>
                                    <th>Categorie</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grades as $key => $item )
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->nameGrade}}</td>
                                    <td>{{$item->ageRetraite}}</td>
                                    <td>
                                        @if($item->cat)
                                        {{$item->cat->nomCatg}}
                                        @else
                                        aucun categorie
                                        @endif
                                    </td>



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
                                                        <h5 class="modal-title" id="editModalLabel">Modifier Grade
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
                                                                    action="{{route('update.grade', ['id' => $item->id]) }}"
                                                                    class="forms-sample" enctype="multipart/form-data">
                                                                    @csrf




                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">Nom
                                                                            Grade</label>
                                                                        <input type="text"
                                                                            class="form-control @error('nameGrade') is-invalid @enderror"
                                                                            name="nameGrade" autocoamplete="off"
                                                                            value="{{$item->nameGrade}}">

                                                                        @error('nameGrade')
                                                                        <span class="text-danger">{{ $message}}</span>
                                                                        @enderror

                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label
                                                                            for="gradeInputUsername1">Categorie</label>
                                                                        <select type="text"
                                                                            class="form-control @error('categorie') is-invalid @enderror"
                                                                            G name="categorie" autocoamplete="off"
                                                                            placeholder="Entrer le nom d'une compagnie">

                                                                            @foreach ($categories as $categorie)
                                                                            <option value="{{$categorie->id}}">
                                                                                {{ $categorie->nomCatg}}</option>
                                                                            @endforeach


                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="gradeInputUsername1">Age
                                                                            Retraite</label>
                                                                        <input type="number"
                                                                            class="form-control @error('ageRetraite') is-invalid @enderror"
                                                                            name="ageRetraite" autocoamplete="of"
                                                                            id="exampleInputNumber1" value="1"
                                                                            value="{{$item->ageRetraite}}">

                                                                        @error('ageRetraite')
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



                                        <a href="{{route('delete.grade',$item->id)}}" class="btn btn-inverse-danger"
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