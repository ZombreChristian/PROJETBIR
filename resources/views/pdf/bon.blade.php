{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bon PDF</title>
</head>
<body>
    <h1>Bon d'effectué #{{ $bon->id }}</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Champ</th>
                <th>Valeur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nom de la personne:</td>
                <td>{{ $bon->personnel->nom }}</td>
            </tr>
            <tr>
                <td>Date du bon:</td>
                <td>{{ $bon->date }}</td>
            </tr>
            <tr>
                <td>Motif du bon:</td>
                <td>{{ $bon->type_bon }}</td>
            </tr>
        </tbody>
    </table> --}}
{{--
    <h2>Armes:</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nom de l'arme</th>
                <th>Quantité</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bon->armes as $arme)
                <tr>
                    <td>{{ $arme->nom }}</td>
                    <td>{{ $arme->pivot->quantite }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Munitions:</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Type de munition</th>
                <th>Quantité</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bon->munitions as $munition)
                <tr>
                    <td>{{ $munition->type }}</td>
                    <td>{{ $munition->pivot->quantite }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Optiques:</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Type d'optique</th>
                <th>Quantité</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bon->optiques as $optique)
                <tr>
                    <td>{{ $optique->type }}</td>
                    <td>{{ $optique->pivot->quantite }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

    @extends('gestionnaire.gestionnaire_dashboard')

<script src="https::ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js">

</script>
@section('gestionnaire')
<div class="page-content">


<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-body">
    <div class="container-fluid d-flex justify-content-between">
      <div class="col-lg-3 pl-0">
        <a href="#" class="noble-ui-logo logo-light d-block mt-3">Noble<span>UI</span></a>
        <p class="mt-1 mb-1"><b>NobleUI Themes</b></p>
        <p>108,<br> Great Russell St,<br>London, WC1B 3NA.</p>
        <h5 class="mt-5 mb-2 text-muted">Invoice to :</h5>
        <p>{{ $bon->personnel->nom }},<br> 102, 102  Crown Street,<br> London, W3 3PR.</p>
      </div>
      <div class="col-lg-3 pr-0">
        <h4 class="font-weight-medium text-uppercase text-right mt-4 mb-2">invoice</h4>
        <h6 class="text-right mb-5 pb-4">#{{ $bon->id }}</h6>
        <p class="text-right mb-1">Balance Due</p>
        <h4 class="text-right font-weight-normal">$ 72,420.00</h4>
        <h6 class="mb-0 mt-3 text-right font-weight-normal mb-2"><span class="text-muted">Invoice Date :</span> 25rd Jan 2020</h6>
        <h6 class="text-right font-weight-normal"><span class="text-muted">Due Date :</span> 12th Jul 2020</h6>
      </div>
    </div>
    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
      <div class="table-responsive w-100">
          <table class="table table-bordered">
            <thead>
              <tr>
                  <th>#</th>
                  <th>Description</th>
                  <th class="text-right">Quantity</th>

                  <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($bon->armes as $arme)
                <tr class="text-right">
                    <td>{{ $arme->nom }}</td>
                    <td>{{ $arme->pivot->quantite }}</td>
                </tr>
            @endforeach

            @foreach ($bon->munitions as $munition)
                <tr>
                    <td>{{ $munition->type }}</td>
                    <td>{{ $munition->pivot->quantite }}</td>
                </tr>
            @endforeach

            @foreach ($bon->optiques as $optique)
                <tr>
                    <td>{{ $optique->type }}</td>
                    <td>{{ $optique->pivot->quantite }}</td>
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

</div>



@endsection

