@extends('admin.admin_dashboard')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js">

</script>
@section('admin')
<div class="page-content">


            <div class="row profile-body">


                    <!-- middle wrapper start -->
                    <div class="col-md-8 col-xl-8 middle-wrapper">

                            <div class="card">
                                <div class="card-body">
                                                  <h6 class="card-title">Modifier profile</h6>
                                                <form method="POST" action="{{route('update.roles')}}" class="forms-sample" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$roles->id}}">

                                                      <div class="form-group">


                                                          <label for="exampleInputUsername1">Nom profile</label>
                                                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off" value="{{$roles->name}}">
                                                          @error('name')
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
