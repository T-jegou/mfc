<?php include 'header.php' ?>
<?php


if(isset($_POST['inscription'])) {
    
    $usr_nom = htmlspecialchars($_POST['nom']);
    $usr_prenom = htmlspecialchars($_POST['prenom']);
    $usr_email = htmlspecialchars($_POST['email']);
    $usr_emailconfirm = htmlspecialchars($_POST['email_confirm']);
    $usr_telephone = htmlspecialchars($_POST['tel']);
    $usr_passe = htmlspecialchars($_POST['mdp']);
    $usr_passeconf = htmlspecialchars($_POST['mdp_confirm']);
    
    
   if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['email']) and !empty($_POST['email_confirm']) and !empty($_POST['tel']) and !empty($_POST['mdp']) and !empty($_POST['mdp_confirm'])){
       //on entre dans la condition si tout les champs sont rempli
       $nomlenght = strlen($usr_nom);
       $prenomlenght = strlen($usr_prenom);
       if($prenomlenght <= 50){// on test les longueurs de nom et prenom
            if($nomlenght <= 50){
                if($usr_email == $usr_emailconfirm){ // on test les correspondance de mail
                         $reqmail = $bdd->prepare("SELECT * FROM user WHERE usr_email = ?"); // on prepare une requete pour verifier que le mail m'est pas deja use en selectionnant tout les mails de la bd
                         $reqmail->execute(array($usr_email)); // on execute la requete en stockant les valeurs de usr_email dans un tableau
                         $mailexist = $reqmail->rowCount(); // combie de ligne d tableau stockant les value usr_mail existe et sont egale a $_POST[usr_email]
                         if($mailexist == 0){ // si aucune pas de correspondance entre les mails de la db et le mail entre en inscription alors on continue
                             if($usr_passe == $usr_passeconf){ // correspondance des mdp
                                 $insertusr = $bdd->prepare("INSERT INTO user(usr_nom, usr_prenom, usr_email, usr_telephone, usr_passe) VALUES(?, ?, ?, ?, ?)"); // prepation de la query d'insert
                                 $insertusr->execute(array($usr_nom, $usr_prenom, $usr_email, $usr_telephone, $usr_passe));// on execute la requete avec les value passer dans le form
                                 $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>"; // on stock le msg que le cmpte a bien etait create avdec une redirection vers la page de connexion
                             }else{
                                $erreur = "Vos mdp ne correspondent pas"; // mot de passe correspond pas
                             }
                         }else{
                             $erreur = "Votre mail est deja utilise"; // votre email est deja use
                         } 
                }else{
                    $erreur = "Vos mails ne correspondent pas";// les mails correspondent pas
                } 
            }else{
               $erreur = "Votre nom doit faire moins de 50 caracteres"; // nom superieur a 50
            }
       }else{
          $erreur = "votre prenom doit faire moins de 50 caracteres"; // prenom superieur a 50
       }
       
   }else{
      $erreur = "Tous les champs doivent etre complete"; // tout les champs complete
   }
}  
?>

<form action="inscription.php" method="post">
    
    <div class="form-group" >
    <label for="exampleInputEmail1">Nom</label>
    <input type="text" class="form-control" name="nom"  placeholder="Votre nom">
    </div>
    
    <div class="form-group">
    <label for="exampleInputEmail1">Prenom</label>
    <input type="text" class="form-control" name="prenom"  placeholder="Votre Prénom">
    </div>
    
    <div class="form-group">
    <label for="exampleInputEmail1">Adresse Email</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Votre email">
    </div>
    
    <div class="form-group">
    <label for="exampleInputEmail1">Adresse Email confirmation</label>
    <input type="email" class="form-control" name="email_confirm" aria-describedby="emailHelp" placeholder="Confirmation du mail">
    </div>
    
    <div class="form-group">
    <label for="exampleInputEmail1">Numéro de téléphone</label>
    <input type="text" class="form-control" name="tel" placeholder="Votre numéro de téléphone">
    </div>

    <div class="form-group">
    <label for="exampleInputEmail1">Mot de passe</label>
    <input type="password" class="form-control" name="mdp"  placeholder="Votre mot de passe">
    </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Confirmation du mot de passe</label>
    <input type="password" class="form-control" name="mdp_confirm" placeholder="Confirmation du mot de passe">
    </div>

  <button type="submit" name="inscription" class="btn btn-primary">Inscription</button>
</form>


<?php
if(isset($erreur)){
    echo '<font color="red">'.$erreur."</font>";
}
?>


