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
                                                  <h6 class="card-title">Ajouter Vehicule</h6>
                                                <form method="POST" action="{{route('store.vehicule')}}" class="forms-sample" enctype="multipart/form-data">
                                                    @csrf
                                                      <div class="form-group">
                                                          <label for="exampleInputUsername1">N° serie</label>
                                                          <input type="int" class="form-control @error('noSerieVeh') is-invalid @enderror" name="noSerieVeh" autocomplete="off" value="">
                                                          @error('noSerieVeh')
                                                            <span class="text-danger">{{ $message}}</span>
                                                          @enderror
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputUsername1">Nom vehicule</label>
                                                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" autocomplete="off" value="">
                                                        @error('nom')
                                                          <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">Type voiture</label>
                                                        <select class="form-control @error('type') is-invalid @enderror" name="type">
                                                            <option value="" disabled selected>Choisissez un type</option>
                                                            @foreach(['Vehicule leger',"Vehicule poids lourd",'Vehicule transport en commun'] as $option)
                                                                <option value="{{ $option }}" {{ old('type') === $option ? 'selected' : '' }}>{{ $option }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('type')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">Marque</label>
                                                        <input type="text" class="form-control @error('date') is-invalid @enderror" name="marque" autocomplete="off" value="">
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
