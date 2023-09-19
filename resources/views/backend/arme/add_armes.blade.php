@extends('gestionnaire.gestionnaire_dashboard')

<script src="https::ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js">

</script>
@section('gestionnaire')
<div class="page-content">


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title font-weight-bold">Liste Arme</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                  <th >Id#</th>
                                  <th>N° serie</th>
                                  <th>Nom arme</th>
                                  <th>Marque arme</th>
                                  <th>Quantité</th>
                                  <th>Type arme</th>
                                  <th>Date</th>
                                  <th>Etat</th>
                                  <th>Provenance</th>

                                  <th>Action</th>

                                </tr>
                              </thead>

                            <tbody>
                                @foreach ($armes as $key => $item )
                                <tr>
                                  <td>{{$key + 1}}</td>
                                  <td>{{$item->noSerieArme}}</td>
                                  <td>{{$item->nom}}</td>
                                  <td>{{$item->marque}}</td>
                                  <td>{{$item->quantite}}</td>
                                  <td>
                                    @if ($item->typeArme) <!-- Vérifiez si la relation typeArme existe -->
                                        {{$item->typeArme->nom}} <!-- Accédez au nom du type d'arme -->
                                    @else
                                        Aucun type d'arme associé
                                    @endif
                                </td>
                                <td>{{$item->date}}</td>
                                  <td>{{$item->etat}}</td>
                                  <td>{{$item->provenance}}</td>



                                    <td>

                                        <!-- Button to trigger the modal -->
                                        <button type="button" class="btn btn-inverse-warning" data-toggle="modal"
                                            data-target="#editModal{{$item->id}}">
                                            <i data-feather="edit"></i>
                                        </button>

                                        <button type="button" class="btn btn-inverse-primary" data-toggle="modal"
                                        data-target="#editModal{{$item->id}}">
                                        <i data-feather="edit"></i>
                                    </button>


                                        <!-- Edit Modal -->

                                       
                                        <a href="{{route('delete.arme',$item->id)}}" class="btn btn-inverse-danger"
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
