<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <!-- Titre du site et lien vers l'accueil -->
    <a class="navbar-brand" href="/?page=home">Formation</a>
    <!-- Bouton hamburger pour afficher les liens sur un petit écran  -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Liste des liens de la navbar -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= $controller=="personList"?"active":"" ?>">
                <a class="nav-link" href="/?page=personList">Liste des personnes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
    </div>
</nav>