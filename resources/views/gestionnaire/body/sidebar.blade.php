@section('contenu')
<li class="nav-item">
    <a href="{{route('gestionnaire.dashboard')}}" class="nav-link">
        <i class="link-icon" data-feather="box"></i>
        <span class=
        "link-title">Accueil</span>
    </a>
    </li>

@endsection


@include('admin.body.sidebar ')
