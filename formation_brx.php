<?php include 'header.php'; ?>



<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Consulter nos dernieres formation dans le domaine de la bureautique</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    <a href="formation.php" class="btn btn-info" role="button">Retourner au catégorie</a></br>
  </div>
</div>

<?php 
        $form_info = $bdd->query("SELECT * FROM formation WHERE form_cat ='brx' "); /* requete deselection de tout les formations de la categorie bureautique */
        while ($a = $form_info->fetch()){ /* boucle qui permet d'afficher les formations */
            $id = $a['form_id']; /* on stock l'id pour le faire transiter via l'url avec $_GET pour la fiche de formartion */
           
?>

    <div id='form_presentation'>
        <h1>Titre : <?php    echo $a['form_nom']; ?> </h1>
        <p>
            Prix : <?php    echo $a['form_prix']; ?> euros </br>
            Niveau requis : <?php    echo $a['form_niveau']; ?> </br>
            Nombre de participant: <?php    echo $a['form_nbplace']; ?> </br>
            Description : <?php echo substr($a['form_desc'], 0,200);/* substr($string, debut, fin) permet d'echo une partie de la description de la formation*/ ?> ..... </br>  
        </p>
        <a href="fiche_formation.php?id=<?php echo $id; ?>" class="btn btn-info" role="button">Voir plus</a> <!-- on fait transiter la variable id avec ?id= vers la fiche de formation personnalisé  -->
    </div>

<?php } ?>




