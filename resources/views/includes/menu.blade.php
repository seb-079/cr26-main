<header class="navbar">
    <div class="container">
        <div class="logo">CR-26</div>

        <nav class="menu-wrapper">
            <ul class="menu">
                <li><a href="#">Accueil</a></li>

                <li class="has-submenu" tabindex="0">
                    <a href="#">Collèges <span class="arrow">▼</span></a>
                    <ul class="submenu">
                        <li><a href="#">Élèves</a></li>
                        <li><a href="#">Équipe</a></li>
                    </ul>
                </li>

                <li><a href="#">Épreuves</a></li>
                <li><a href="#">Classement</a></li>

                <li class="has-submenu" tabindex="0">
                    <a href="#">Édition <span class="arrow">▼</span></a>
                    <ul class="submenu">
                        <li><a href="#">2024</a></li>
                        <li><a href="#">2025</a></li>
                    </ul>
                </li>

                <li><a href="#">Secrétaire</a></li>

                <li class="has-submenu" tabindex="0">
                    <a href="#">Gestionnaire <span class="arrow">▼</span></a>
                    <ul class="submenu">
                        <li><a href="#">Épreuves</a></li>
                        <li><a href="#">Collèges</a></li>
                        <li><a href="#">Abonnement</a></li>
                        <li><a href="#">Rôle</a></li>
                        <li><a href="#">Résultat</a></li>
                        <li><a href="#">Édition</a></li>
                        <li><a href="#">Exportation</a></li>
                        <li><a href="#">Modification</a></li>
                    </ul>
                </li>

                <li class="has-submenu" tabindex="0">
                    <a href="#">Admin <span class="arrow">▼</span></a>
                    <ul class="submenu">
                        <li><a href="#">Genre</a></li>
                        <li><a href="#">Pays</a></li>
                        <li><a href="#">Utilisateurs</a></li>
                    </ul>
                </li>
            </ul>

            <div class="login-btn">
                <a href="#">Connexion</a>
            </div>
        </nav>
    </div>
</header>

<style>
/* --- Global --- */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Roboto', sans-serif;
  background: #fafafa;
  color: #222;
}

a {
  text-decoration: none;
  color: inherit;
}

/* --- Navbar --- */
.navbar {
  background: #fff;
  padding: 0.7rem 1.5rem;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  position: sticky;
  top: 0;
  z-index: 1000;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.logo {
  font-weight: bold;
  font-size: 1.5rem;
  color: #222;
  letter-spacing: 1px;
}

/* --- Menu --- */
.menu-wrapper {
  display: flex;
  align-items: center;
  gap: 1.5rem;
}

.menu {
  display: flex;
  list-style: none;
  gap: 0.8rem;
}

.menu > li > a {
  font-weight: 500;
  font-size: 1rem;
  padding: 0.4rem 0.6rem;
  display: flex;
  align-items: center;
  transition: color 0.2s ease;
}

.menu > li > a:hover {
  color: #0077cc;
}

/* Flèche */
.arrow {
  margin-left: 5px;
  font-size: 0.8em;
  transition: transform 0.3s ease;
}

/* Rotation flèche si menu ouvert */
.has-submenu:focus-within > a .arrow,
.has-submenu:hover > a .arrow {
  transform: rotate(180deg);
}

/* --- Sous-menu --- */
.has-submenu {
  position: relative;
}

.submenu {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background: #fff;
  list-style: none;
  padding: 0.4rem 0;
  border-radius: 6px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  min-width: 180px;
  flex-direction: column;
  z-index: 100;
}

.has-submenu:focus-within > .submenu,
.has-submenu:hover > .submenu {
  display: flex;
}

.submenu li a {
  padding: 0.5rem 1rem;
  font-size: 0.95rem;
  display: block;
}

.submenu li a:hover {
  background: #f5f5f5;
  color: #0077cc;
}

/* --- Connexion --- */
.login-btn a {
  background: #000;
  color: #fff;
  padding: 0.5rem 1rem;
  border-radius: 25px;
  font-weight: 600;
  font-size: 1rem;
  transition: background 0.2s ease;
}

.login-btn a:hover {
  background: #333;
}
</style>
