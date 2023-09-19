
@section('contenu')
<li class="nav-item">
    <a href="{{route('admin.dashboard')}}" class="nav-link">
        <i class="link-icon" data-feather="box"></i>
        <span class=
        "link-title">Accueil</span>
    </a>
    </li>

@endsection


<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Service<span>BIR</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
           @yield('contenu')
        <li class="nav-item nav-category">Tableau de bord</li>



        @if (Auth::user()->can('menu.role'))

        <li class="nav-item nav-category">Profiles et Droits</li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                <i class="link-icon" data-feather="anchor"></i>
                <span class="link-title">Profiles et Droits</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
                <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="{{route('all.permission')}}" class="nav-link">Liste des droits</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('all.roles')}}" class="nav-link">Liste profiles</a>
                    </li>

                    <li class="nav-item">
                    <a href="{{route('add.roles.permission')}}" class="nav-link">Droits de profile</a>
                    </li>

                    <li class="nav-item">
                    <a href="{{route('all.roles.permission')}}" class="nav-link">Liste des Droits de Profiles</a>
                    </li>
                </ul>
            </div>
        </li>

         @endif

        @if (Auth::user()->can('menu.utilisateur'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="advancedUI">
                <i class="link-icon" data-feather="users"></i>
                <span class="link-title">Gestion Utilisateurs</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="admin">
                <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="{{route('all.admin')}}" class="nav-link">Liste des utilisateurs</a>
                </li>

                </ul>
            </div>
        </li>

      @endif

      @if (Auth::user()->can('menu.personnel'))

      <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#personnel" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="menu"></i>
            <span class="link-title">Personnels</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="personnel">
            <ul class="nav sub-menu">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#pers" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="menu"></i>
                        <span class="link-title">Gestion du personnels</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="pers">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('all.personnel')}}" class="nav-link">Personnel</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('all.grade')}}" class="nav-link">Grade</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('all.categorie')}}" class="nav-link">Categorie</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('all.section')}}" class="nav-link">Section</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('all.compagnie')}}" class="nav-link">Compagnie</a>
                            </li>
                             <li class="nav-item">
                                <a href="{{route('all.groupe')}}" class="nav-link">Groupe</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('all.fonction')}}" class="nav-link">Fonction</a>
                            </li>


                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#mission" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="menu"></i>
                        <span class="link-title">Gestion du Missions</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="mission">
                        <ul class="nav sub-menu">

                            <li class="nav-item">
                                <a href="{{route('all.mission')}}" class="nav-link">Mission</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('all.moyenMission')}}" class="nav-link">MoyenMission</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('all.evenementMission')}}" class="nav-link">EvenementMission'</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#indis" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="menu"></i>
                        <span class="link-title">Gestion du Indisponibilite</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="indis">
                        <ul class="nav sub-menu">

                            <li class="nav-item">
                                <a href="{{route('all.indisponibilite')}}" class="nav-link">Indisponibilite</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('all.permissionIndisponibilite')}}" class="nav-link">indisponibilite
                                    permission</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('all.stage')}}" class="nav-link">indisponibilite Stage</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('all.prison')}}" class="nav-link">indisponibilite Prison</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('all.nonRejoin')}}" class="nav-link">indisponibilite nonRejoin</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('all.malade')}}" class="nav-link">indisponibilite Malade</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#spa" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="menu"></i>
                        <span class="link-title">Gestion du SPA</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="spa">
                        <ul class="nav sub-menu">

                            <li class="nav-item">
                                <a href="{{route('all.spa')}}" class="nav-link">spa</a>
                            </li>

                        </ul>
                    </div>
                </li>



            </ul>
          </div>
        </li>





    @endif

       @if (Auth::user()->can('menu.permanence'))


                  <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#permanence" role="button" aria-expanded="false" aria-controls="emails">
                      <i class="link-icon" data-feather="menu"></i>
                      <span class="link-title">Permanence</span>

                      <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>
                      <div class="collapse" id="permanence">
                      <ul class="nav sub-menu">
                          <!-- menu service -->
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#service" role="button" aria-expanded="false" aria-controls="emails">
                      <i class="link-icon" data-feather="menu"></i>
                      <span class="link-title">Gestion de Services</span>

                      <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>
                      <div class="collapse" id="service">
                      <ul class="nav sub-menu">


                          <li class="nav-item">
                          <a href="{{route('all.service')}}" class="nav-link">Liste Service</a>
                          </li>

                      </ul>
                      </div>
                  </li>

                  <!-- fin menu service -->

                  <!-- menu visiteur -->
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#visiteur" role="button" aria-expanded="false" aria-controls="emails">
                      <i class="link-icon" data-feather="menu"></i>
                      <span class="link-title">Gestion des Visiteurs</span>
                      <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>
                      <div class="collapse" id="visiteur">
                      <ul class="nav sub-menu">
                          <li class="nav-item">
                          <a href="{{route('all.visit')}}" class="nav-link">Liste Visiteurs</a>
                          </li>
                      </ul>
                      </div>
                  </li>
                  <!-- fin menu visiteur -->

                  <!-- menu évènenment -->
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#evenement" role="button" aria-expanded="false" aria-controls="emails">
                      <i class="link-icon" data-feather="menu"></i>
                      <span class="link-title">Gestion des Evènenments</span>
                      <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>
                      <div class="collapse" id="evenement">
                      <ul class="nav sub-menu">
                          <li class="nav-item">
                          <a href="{{route('all.even')}}" class="nav-link">Liste Evènements</a>
                          </li>
                      </ul>
                      </div>
                  </li>

                  <!-- fin menu Evènenment -->

                  <!-- menu permanence -->
                      <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#perm" role="button" aria-expanded="false" aria-controls="emails">
                      <i class="link-icon" data-feather="menu"></i>
                      <span class="link-title">Gestion de Permanence</span>

                      <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>
                      <div class="collapse" id="perm">
                      <ul class="nav sub-menu">

                      <li class="nav-item">
                          <a href="{{route('all.poste')}}" class="nav-link">Poste de Garde</a>
                      </li>
                      <li class="nav-item">
                          <a href="{{route('all.moyen')}}" class="nav-link">Moyen Poste</a>
                      </li>
                          <li class="nav-item">
                          <a href="#" class="nav-link">Liste Permanence</a>
                          </li>

                  </ul>
                  </div>
              </li>

              <!-- fin menu permanence -->

                  </ul>
                  </div>

              </li>



       @endif
@if (Auth::user()->can('menu.AMO'))


@section('gestionnaire')
      <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#gestion" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="menu"></i>
            <span class="link-title">Gestionnaire</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="gestion">
              <ul class="nav sub-menu">

                  <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#amo" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="menu"></i>
                        <span class="link-title">Gestion AMO</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>
                      <div class="collapse" id="amo">
                        <ul class="nav sub-menu">
                          {{-- @if (Auth::user()->can('all.arme')) --}}
                          <li class="nav-item">
                            <a href="{{route('all.arme')}}" class="nav-link">Armes</a>
                          </li>
                          {{-- @endif --}}
                          <li class="nav-item">
                            <a href="{{route('all.typearme')}}" class="nav-link">Type Armes</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('all.munition')}}" class="nav-link">Munitions</a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('all.optique')}}" class="nav-link">Optiques</a>
                            </li>
                        </ul>
                      </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#per" role="button" aria-expanded="false" aria-controls="emails">
                          <i class="link-icon" data-feather="menu"></i>
                          <span class="link-title">Personnel</span>
                          <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="per">
                          <ul class="nav sub-menu">
                            {{-- @if (Auth::user()->can('all.arme')) --}}
                            <li class="nav-item">
                                <a href="{{route('all.personnel')}}" class="nav-link">Personnel</a>
                            </li>

                          </ul>
                        </div>
                      </li>


                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#auto" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="menu"></i>
                        <span class="link-title">Gestion Auto</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>
                      <div class="collapse" id="auto">
                        <ul class="nav sub-menu">
                          <li class="nav-item">
                            <a href="{{route('all.vehicule')}}" class="nav-link">Vehicules</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('all.moto')}}" class="nav-link">Motos</a>
                          </li>
                        </ul>
                      </div>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#dotation" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="menu"></i>
                        <span class="link-title">Gestion Dotation</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>
                      <div class="collapse" id="dotation">
                        <ul class="nav sub-menu">
                          <li class="nav-item">
                            <a href="{{route('all.dotation')}}" class="nav-link">Dotations</a>
                          </li>
                      </li>


                </ul>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#bon" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="menu"></i>
                    <span class="link-title">Gestion Bon</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                  </a>
                  <div class="collapse" id="bon">
                    <ul class="nav sub-menu">
                      <li class="nav-item">
                        <a href="{{route('all.bon')}}" class="nav-link">Bons</a>
                      </li>
                    </ul>
                  </div>
                </li>
          </div>
      </li>


        @endif






      </ul>

      @include('logo.logo_dcsic')



    </div>
  </nav>
