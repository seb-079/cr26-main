
<nav class="navbar">

    <div class="navbar-brand">
        <a href="{{ route('home') }}">CR-26</a>

        <button class="burger" id="burger">
            <span></span><span></span><span></span>
        </button>
    </div>

    <ul class="nav-links" id="nav-links">

        <li><a href="{{ route('home') }}">Accueil</a></li>

        {{-- ----- Partie Visiteur ----- --}}
        @guest

        <li class="dropdown">
            <a href="#">Collèges <span class="arrow">▼</span></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('colleges.eleves') }}">Élèves</a></li>
                <li><a href="{{ route('colleges.equipe') }}">Équipe</a></li>
            </ul>
        </li>

        <li><a href="{{ route('epreuves.index') }}">Épreuves</a></li>
        <li><a href="{{ route('classement.index') }}">Classement</a></li>

        <li class="login-btn"><a href="{{ route('login') }}">Connexion</a></li>

        @if(Route::has('register'))
        <li class="login-btn"><a href="{{ route('register') }}">Inscription</a></li>
        @endif


        {{-- ----- Partie Authentifié ----- --}}
        @else

        <li class="dropdown">
            <a href="#">Collèges <span class="arrow">▼</span></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('colleges.eleves') }}">Élèves</a></li>
                <li><a href="{{ route('colleges.equipe') }}">Équipe</a></li>
            </ul>
        </li>

        <li><a href="{{ route('epreuves.index') }}">Épreuves</a></li>
        <li><a href="{{ route('classement.index') }}">Classement</a></li>

        <li><a href="{{ route('saisieNote.index') }}">Saisie Note</a></li>

        <!-- ----- Gestion ----- -->
        <li class="dropdown">
            <a href="#">Gestionnaire <span class="arrow">▼</span></a>

            <ul class="dropdown-menu">
                <li><a href="{{ route('gestion.epreuves') }}">Épreuves</a></li>
                <li><a href="{{ route('gestion.colleges') }}">Collèges</a></li>
                <li><a href="{{ route('gestion.abonnement') }}">Abonnement</a></li>
                <li><a href="{{ route('gestion.role') }}">Rôle</a></li>

                <li class="dropdown">
                    <a href="#">Résultat <span class="arrow">▶</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('gestion.edition') }}">Édition</a></li>
                        <li><a href="{{ route('gestion.exportation') }}">Exportation</a></li>
                        <li><a href="{{ route('gestion.modification') }}">Modification</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <!-- ----- Admin ----- -->
        <li class="dropdown">
            <a href="#">Admin <span class="arrow">▼</span></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('admin.genre') }}">Genre</a></li>
                <li><a href="{{ route('admin.utilisateurs') }}">Utilisateurs</a></li>
                <li><a href="{{ route('admin.pays') }}">Pays</a></li>
            </ul>
        </li>

        <!-- Déconnexion (Livewire) -->
        <li>
            @livewire('layout.navigation')
        </li>

        @endguest
    </ul>
</nav>

<script>
const burger = document.getElementById('burger');
const navLinks = document.getElementById('nav-links');

burger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});
</script>

