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
                                                  <h6 class="card-title">Ajouter Munition</h6>
                                                <form method="POST" action="{{route('store.munition')}}" class="forms-sample" enctype="multipart/form-data">
                                                    @csrf
                                                      <div class="form-group">
                                                          <label for="exampleInputUsername1">N° serie</label>
                                                          <input type="int" class="form-control @error('noSerieMuni') is-invalid @enderror" name="noSerieMuni" autocomplete="off" value="">
                                                          @error('noSerieMuni')
                                                            <span class="text-danger">{{ $message}}</span>
                                                          @enderror
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputUsername1">Nom munition</label>
                                                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" autocomplete="off" value="">
                                                        @error('nom')
                                                          <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">Type munition</label>
                                                        <select class="form-control @error('type') is-invalid @enderror" name="type">
                                                            <option value="" disabled selected>Choisissez un type</option>
                                                            @foreach(['Cartouches pour armes portatives',"Obus",'Roquette',"Missiles",'Mines',"Grenades",'Explosifs et artifices de destruction',"Artifices eclairants et de signalisation",'Bombes'] as $option)
                                                                <option value="{{ $option }}" {{ old('type') === $option ? 'selected' : '' }}>{{ $option }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('type')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">Date</label>
                                                        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" autocomplete="off" value="">
                                                        @error('date')
                                                          <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">Quantité</label>
                                                        <input type="number" class="form-control @error('quantite') is-invalid @enderror" name="quantite" autocomplete="off" value="">
                                                        @error('date')
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
