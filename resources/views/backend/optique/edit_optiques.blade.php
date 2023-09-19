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
                                                  <h6 class="card-title">Modifier Optique</h6>
                                                <form method="POST" action="{{route('update.optique')}}" class="forms-sample" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$optiques->id}}">

                                                      <div class="form-group">
                                                          <label for="exampleInputUsername1">N° serie</label>
                                                          <input type="int" class="form-control @error('noSerieOpt') is-invalid @enderror" name="noSerieOpt" autocomplete="off" value="{{$optiques->noSerieOpt}}">
                                                          @error('noSerieOpt')
                                                            <span class="text-danger">{{ $message}}</span>
                                                          @enderror
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputUsername1">Nom optique</label>
                                                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" autocomplete="off" value="{{$optiques->nom}}">
                                                        @error('nom')
                                                          <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">Type optique</label>
                                                        <select class="form-control @error('type') is-invalid @enderror" name="type">
                                                            <option value="" disabled selected>Choisissez un type</option>
                                                            @foreach(['Appareil de vision de jour',"Appareil de vision de nocturne",'Appareil de mésure de distance',"Appareil de mésure des angles"] as $option)
                                                                <option value="{{ $option }}" {{old('type', $optiques->type) === $option ? 'selected' : ''  }}>{{ $option }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('type')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">Date</label>
                                                        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" autocomplete="off" value="{{$optiques->date}}">
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
