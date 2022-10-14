<!--
  Auteur  : Pedro Carneiro - Jordan Richard - Céline Erni - Achraf Zamader -Yvan Lüthi
  Date    : 30.09.2022
  Version : V1
  Titre   : Projet Geggui - M426
-->
<?php
require_once("../Controller/afficherMessagePerso.php");
require_once("../Controller/affichageMessage.php");
require_once("../Controller/ajouterMessage.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Geggui | Profil</title>
  <link rel="stylesheet" href="../style.css" />
</head>

<style>
  .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }

  .card {
    flex-direction: row;
  }

  .card img {
    width: 30%;
  }

  body{
    overflow: scroll;
    scroll-margin-right: px;
  }
</style>

<main class="d-flex flex-nowrap">
  <h1 class="visually-hidden">Sidebars examples</h1>

  <!-- Custom styles for this template -->
  <link href="https://getbootstrap.com/docs/5.2/examples/sidebars/sidebars.css" rel="stylesheet">
  </head>

  <body>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
      <a href="accueil.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32">
          <use xlink:href="#bootstrap" />
        </svg>
        <span class="fs-4"><img src="../IMG/logoMini.png" width="50px"> Geggui</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
          <a href="accueil.php" class="nav-link link-dark">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#home" />
            </svg>
            Accueil
          </a>
        </li>
        <li>
          <a href="geg.php" class="nav-link link-dark">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#speedometer2" />
            </svg>
            Geg
          </a>
        </li>
        <li>
        <a href="profil.php" class="nav-link active" aria-current="page">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#speedometer2" />
            </svg>
            Profil
          </a>
        </li>
        <li>
          <a href="login.php?deconnexion=yes" class="nav-link link-dark">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#speedometer2" />
            </svg>
            Déconnexion
          </a>
        </li>
      </ul>
      <hr>
      <div>
        <a href="profil.php" class="d-flex align-items-center link-dark text-decoration-none" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong><?= $_SESSION["pseudo"] ?></strong>
        </a>
      </div>
    </div>

    <div class="b-example-divider b-example-vr"></div>

    
    <br>
  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <br>
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
        <h2 class="fw-normal"><?= $_SESSION['pseudo'] ?></h2>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    <hr class="featurette-divider">

    <div id="affichage">
      <?php afficherMessagePerso()?>
    </div>



<script src="../index.js"></script>
</body>

</html>