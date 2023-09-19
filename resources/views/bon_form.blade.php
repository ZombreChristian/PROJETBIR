<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bir</title>
    <style>
        body{
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>

    <div class="container">




        <div class="body-section">
            <div class="row">

                <div class="col5">
                    <div class="form-group">
                        <h2 class="heading">Bon N°:A000{{ $bon->id}}</h2>
                        <h2 class="heading">Motif du bon:{{ $bon->type_bon}}</h2><p></p>
                    <p class="sub-heading">Date:{{ $bon->date}} </p>
                    </div>
                </div>

                <div class="col4">
                    <div class="form-group">
                        <p>Au profil de:</p>
                    <p class="sub-heading">Matricule:{{ $bon->personnel->matricule }}  </p>
                    <p class="sub-heading">Nom: {{ $bon->personnel->nom }} </p>
                    <p class="sub-heading">Prenom:{{ $bon->personnel->prenom }}  </p>
                    <p class="sub-heading">Grade: {{ $bon->personnel->grade }} </p>
                    <p class="sub-heading">Reference CNIB:  </p>
                    <p class="sub-heading">N° de Telephone: {{ $bon->personnel->numeroTelephone }} </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="body-section">
            <h3 class="text-center">Bon pour</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Libellé</th>
                        <th class="text-right">Quantité</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bon->armes as $arme)
                        <tr>
                            <td>Arme</td>
                            <td>{{ $arme->nom }}</td>
                            <td class="text-right">{{ $arme->quantite }}</td>
                        </tr>
                    @endforeach

                    @foreach ($bon->munitions as $munition)
                        <tr>
                            <td>Munition</td>
                            <td>{{ $munition->type }}</td>
                            <td class="text-right">{{ $munition->quantite }}</td>
                        </tr>
                    @endforeach

                    @foreach ($bon->optiques as $optique)
                        <tr>
                            <td>Optique</td>
                            <td>{{ $optique->type }}</td>
                            <td class="text-right">{{ $optique->quantite }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


<style>
    .col1{
        text-align: right;

    }

    .col5{
        text-align: right;

    }

    .col2{
        text-align: right;
    }
</style>
            <div>
                <div class="col">
                    <p>Intéressé</p>

                </div>
                <div class="col1">
                    <p>Chef de service AMO</p>

                </div>
            </div>
            <br><br><br><br>

            <div>
                <div class="col">
                    <p>Officier Logistique</p>

                </div>
                <div class="col2">
                    <p>Décision Commandant BIR</p>

                </div><br>
            </div>

        </div>

    </div>

    {{-- <a href="/generate-pdf">Telecharger</a> --}}



</body>
</html>
