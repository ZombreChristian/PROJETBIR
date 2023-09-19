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
                                                  <h6 class="card-title">Modifier Arme</h6>
                                                <form method="POST" action="{{route('update.arme')}}" class="forms-sample" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$armes->id}}">

                                                      <div class="form-group">
                                                          <label for="exampleInputUsername1">N° serie</label>
                                                          <input type="int" class="form-control @error('noSerieArme') is-invalid @enderror" name="noSerieArme" autocomplete="off" value="{{$armes->noSerieArme}}">
                                                          @error('noSerieArme')
                                                            <span class="text-danger">{{ $message}}</span>
                                                          @enderror
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputUsername1">Nom arme</label>
                                                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" autocomplete="off" value="{{$armes->nom}}">
                                                        @error('nom')
                                                          <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">Marque arme</label>
                                                        <input type="text" class="form-control @error('marque') is-invalid @enderror" name="marque" autocomplete="off" value="{{$armes->marque}}">
                                                        @error('marque')
                                                          <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">Type arme</label>
                                                        <select class="form-control @error('type') is-invalid @enderror" name="type">
                                                            <option value="" disabled>Choisissez un type</option>
                                                            @foreach(['Armes de poing', 'Armes épaule', 'Armes collectives', 'Armes antichar', 'Armes à tir courbe', 'Armes blanches'] as $option)
                                                                <option value="{{ $option }}" {{ old('type', $armes->type) === $option ? 'selected' : '' }}>
                                                                    {{ $option }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('type')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">Date</label>
                                                        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" autocomplete="off" value="{{$armes->date}}">
                                                        @error('date')
                                                          <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">Etat</label>
                                                        <select class="form-control @error('etat') is-invalid @enderror" name="etat">
                                                            <option value="" disabled>Choisissez un état</option>
                                                            @foreach(['Bon état', 'Mauvais état réparable', 'Mauvais état non réparable'] as $option)
                                                                <option value="{{ $option }}" {{ old('etat', $armes->etat) === $option ? 'selected' : '' }}>
                                                                    {{ $option }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('etat')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">Provenance</label>
                                                        <input type="text" class="form-control @error('provenance') is-invalid @enderror" name="provenance" autocomplete="off" value="{{$armes->provenance}}">
                                                        @error('provenance')
                                                          <span class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputUsername1">Photo</label>
                                                        <input type="file" class="form-control @error('imageUrl') is-invalid @enderror" name="imageUrl" autocomplete="off" value="{{$armes->imageUrl}}">
                                                        @error('imageUrl')
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
