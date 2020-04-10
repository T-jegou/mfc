<?php include 'header.php' ?>

<?php
if(isset($_POST['connexion'])) {
    $mailconnect = htmlspecialchars($_POST['email']);
    $mdpconnect = htmlspecialchars($_POST['mdp']);
    if(!empty($_POST['email']) and !empty($_POST['mdp'])){
        $requsr = $bdd->prepare("SELECT * FROM user WHERE usr_email = ? AND usr_passe = ?");
        $requsr->execute(array($mailconnect, $mdpconnect));
        $userexist = $requsr->rowCount();
        if($userexist == 1){
            $userinfo = $requsr->fetch();
            $_SESSION['nom'] = $userinfo['usr_nom'];
            $_SESSION['prenom'] = $userinfo['usr_prenom'];
            $_SESSION['id'] = $userinfo['usr_id'];
            header("Location: profil.php");
        }else{
            $erreur = "Mauvais mail ou mdp";
        }
    }else{
        $erreur = "tout les champs doivent etre complete";
    }
}
?>

<form action="connexion.php" method="post">
    
  <div class="form-group">
    <label for="exampleInputEmail1">Adresse Email</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Votre email">
  </div>
    
  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="password" class="form-control" name="mdp" placeholder="Mot de passe">
  </div>
    
  <button type="submit" name="connexion" class="btn btn-primary">Connexion</button>
</form>

<?php
if(isset($erreur)){
    echo '<font color="red">'.$erreur."</font>";
}
?>
<?php include 'footer.php' ?>

