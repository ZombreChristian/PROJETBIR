@extends('gestionnaire.gestionnaire_dashboard')

<script src="https::ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js">

</script>
@section('gestionnaire')
<div class="page-content">


            <div class="row profile-body">


                    <!-- middle wrapper start -->
                    <div class="col-md-8 col-xl-8 middle-wrapper">

                            <div class="card">
                                <div class="card-body">
                                                  <h6 class="card-title">Ajouter Moto</h6>
                                                <form method="POST" action="{{route('update.moto')}}" class="forms-sample" enctype="multipart/form-data">
                                                    @csrf
                                                      <div class="form-group">
                                                          <label for="exampleInputUsername1">N° serie</label>
                                                          <input type="int" class="form-control @error('noSerieMot') is-invalid @enderror" name="noSerieMot" autocomplete="off" value="{{$motos->noSerieMot}}">
                                                          @error('noSerieMot')
                                                            <span class="text-danger">{{ $message}}</span>
                                                          @enderror
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputUsername1">Nom moto </label>
                                                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" autocomplete="off" value="{{$motos->nom}}">
                                                        @error('nom')
                                                          <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>



                                                      <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                                  </form>
                                </div>
                              </div>


                    </div>

                    <!-- middle wrapper end -->
                    <!-- right wrapper start -->

                    <!-- right wrapper end -->
        </div>

</div>



@endsection
