<?php
session_start();
?>

<?php
$user = "root";
$pass = "";
$bdd  = new PDO('mysql:host=localhost;dbname=mfcv2;charset=utf8', $user, $pass);
/* $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); */
?>

<?php 
if(isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <link rel="stylesheet" href="cssBS/bootstrap.min.css">
      <link rel="stylesheet" href="css/listeform.css" type="text/css">
      <link rel="stylesheet" href="css/ficheform.css" type="text/css">
      <script src="jsBS/bootstrap.min.js" ></script>

   
      <title>MFC formation</title>
  </head>
  <body>
    
      

  <!-- Barre de navigation début -->
  <div name="navigation">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
    <a class="navbar-brand" href="index.php">MFC</a>
    <?php if (empty($_SESSION['id'])){ ?>
        <a class="nav-link" href="inscription.php">Inscription</a>
        <a class="nav-link" href="connexion.php">Connexion</a>
    <?php } ?>
        
        <a class="nav-link" href="formation.php">Les formations</a>
    
    <?php if (!empty($_SESSION['id'])){ ?>
        <a class="nav-link justify-content-center" href="profil.php" >Mon Compte</a>
        <form action="header.php" method="post">
        <input type="hidden" name="logout" value="true" />
        <button>Deconnexion</button>
        </form>
    <?php } ?>
  </nav>
  </div>   
      
<!-- Barre de navigation Fin -->
      