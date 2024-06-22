
<!-- ----- début fragmentPatrimoineMenu -->


<nav class="navbar navbar-expand-lg bg-success fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="router2.php?action=PatrimoineAccueil">KNECHT-BOUTIN</a>
    
    <?php if (isset($_SESSION['nom'])): ?>
      <span class="navbar-text mx-3">
        |<?php echo htmlspecialchars($_SESSION['nom']) . ' ' . htmlspecialchars($_SESSION['prenom']) . ' | ' . ($_SESSION['statut'] == 0 ? 'Administrateur' : 'Client') . ' '; ?>|
      </span>
    <?php endif; ?>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php if (isset($_SESSION['statut'])): ?>
          <?php if ($_SESSION['statut'] == 0): // Administrateur ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Banques</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=banqueReadAll">Liste des banques</a></li>
            <li><a class="dropdown-item" href="router2.php?action=banqueCreate&target=banqueCreated">Ajout d'une banque</a></li>
            <li><a class="dropdown-item" href="router2.php?action=banqueReadId&target=banqueReadAllAccounts">Liste des comptes d'une banque</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Clients</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=clientReadAll">Liste des clients</a></li>
            <li><a class="dropdown-item" href="router2.php?action=administrateurReadAll">Liste des administrateurs</a></li>
            <li><a class="dropdown-item" href="router2.php?action=compteReadAll">Liste des comptes</a></li>
            <li><a class="dropdown-item" href="">Liste des résidences</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="">Proposez une innovation originale</a></li>
            <li><a class="dropdown-item" href="">Proposez une amélioration du code MVC</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="router2.php?action=connection&target=connected">Login</a></li>
              <li><a class="dropdown-item" href="router2.php?action=Inscription&target=PersonneAjoutee">S'inscrire</a></li>
              <li><a class="dropdown-item" href="router2.php?action=deconnection">Déconnexion</a></li>
          </ul>
        </li>  
        
        
       <?php elseif ($_SESSION['statut'] == 1): // Client ?> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mes comptes Bancaires</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="router2.php?action=clientMesComptes">Liste de mes comptes</a></li>
            <li><a class="dropdown-item" href="router2.php?action=clientCompteCreate&target=clientCompteCreated">Ajouter un nouveau compte</a></li>
            <li><a class="dropdown-item" href="router2.php?action=clientCompteTransfer&target=clientCompteTransfered">Transfert inter-comptes</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mes Résidences</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="router2.php?action=clientMesResidences">Liste de mes résidences</a></li>
            <li><a class="dropdown-item" href="router2.php?action=clientResidenceAchat&target=clientResidenceAchete">Achat d'une nouvelle résidence</a></li>
          </ul>
        </li>  

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mon patrimoine</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="router2.php?action=clientMonPatrimoine">Bilan de mon patrimoine</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="">Proposez une innovation originale</a></li>
            <li><a class="dropdown-item" href="">Proposez une amélioration du code MVC</a></li>
          </ul>
        </li>        
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="router2.php?action=connection&target=connected">Login</a></li>
              <li><a class="dropdown-item" href="router2.php?action=Inscription&target=PersonneAjoutee">S'inscrire</a></li>
              <li><a class="dropdown-item" href="router2.php?action=deconnection">Déconnexion</a></li>
          </ul>
        </li>  
      
      <?php endif; ?>
      <?php else: // Pas d'utilisateur connecté ?>
      
         
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="">Proposez une innovation originale</a></li>
            <li><a class="dropdown-item" href="">Proposez une amélioration du code MVC</a></li>
          </ul>
        </li>        
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="router2.php?action=connection&target=connected">Login</a></li>
              <li><a class="dropdown-item" href="router2.php?action=Inscription&target=PersonneAjoutee">S'inscrire</a></li>
              <li><a class="dropdown-item" href="router2.php?action=deconnection">Déconnexion</a></li>
          </ul>
        </li>  
     
      <?php endif; ?>
      </ul>
    </div>
  </div>
</nav> 

<!-- ----- fin fragmentPatrimoineMenu -->

