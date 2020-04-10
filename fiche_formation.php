<?php  include 'header.php'; ?>
<?php 

    if (empty($_GET['id'])){
        header("Location: formation.php");
    }
    $id = $_GET['id']; /* on recupere l'id de la fiche choisi qui q trsnsité par la variable get de l'url */ 
    
    $form_info = $bdd->prepare('SELECT * FROM formation WHERE form_id = ?'); 
    $form_info->execute(array($id));
    $form_info = $form_info->fetch(); /* on recupere tout les donnes de la table formation ou le form_id = a la variable $id */
    if (empty($form_info)){
        header("Location: formation.php");
    }
    
    $session_info = $bdd->prepare("SELECT * FROM session WHERE form_id = ?");
    $session_info->execute(array($id));
?>

<div id='form_fiche'>
    
    <h1><?php echo $form_info['form_nom'] ?></h1>
  <!--  <php echo '<img src="data:image/jpeg;base64,'.base64_encode( $form_info['form_img'] ).'"/>'; > l'image est fetch mais il faut l'adapter a la div --> 
    <h4>Présantation de la formation : <h6><?php echo $form_info['form_desc'] ?></h6></h4>
    <h4>Niveau requis pour cette formation : <h6><?php echo $form_info['form_niveau'] ?></h6></h4>
    <h4>Nombre de participants maximum par formation : <h6><?php echo $form_info['form_nbplace'] ?> participants</h6></h4>
    <h4>Prix de la formation: <h6><?php echo $form_info['form_prix'] ?> euros</h6></h4>
    <h4>Durée de la formation: <h6><?php echo $form_info['form_duree'] ?> jour(s)</h6></h4>
    <h4>Prochaine date de session<h6>
    <?php  
        if (!empty($a = $session_info->fetch())){ /* condition qui verifie si la formation possede des session*/
            echo $a['session_date']." Nb places restant : ".$a['session_place']."</br>";
            while ($a = $session_info->fetch()){ /* si la formation possede des session alors on affiche les dates */ 
                echo $a['session_date']." Nb places restant : ".$a['session_place']."</br>"; 
            }
        }else{
            echo 'Pas de date prévu, reste connecté ! ;)';
        }
    ?></h6></h4>
    <a href="formation_inscription.php?id=<?php echo $id; ?>" class="btn btn-info" role="button">S'inscrire a une session !</a> <!-- on redirige vers le formulaire d'inscription a une formation -->
    
    
    
    
    
</div>
    

    
    
 <!-- <php  include 'footer.php'; > -->