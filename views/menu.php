<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-heading Actions">Actions</li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="villages.php">
            <i class="bi bi-city"></i>
            <span>Village</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="planteurs.php">
            <i class="bi bi-person"></i>
            <span>Planteurs</span>
        </a>
    </li><!-- End fournisseur Page Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="AjoutClient.php?idsite=<?php $site ?>">
            <i class="bi bi-person"></i>
            <span>Gerer Clients</span>
        </a>
    </li>
    <!-- End client Page Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="achat.php">
            <i class="bi bi-person"></i>
            <span>les entrees</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="sortie.php">
            <i class="bi bi-person"></i>
            <span>les sorties</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Stocks</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="#entrees">
              <i class="bi bi-circle"></i><span> Les Entrés en Stock</span>
            </a>
          </li>
          <li>
            <a href="#vente" class="active">
              <i class="bi bi-circle"></i><span> Les Sorties Stock</span>
            </a>
          </li>
        </ul>
      </li><!-- End Stock Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="AjoutArticle.php">
            <i class="bi bi-card-list"></i>
            <span>Article</span>
        </a>
    </li><!-- End Register Page Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Déconnexion</span>
        </a>
    </li><!-- End Login Page Nav -->

</ul>

</aside>