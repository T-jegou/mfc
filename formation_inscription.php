<?php include 'header.php'; ?>
<?php
    $id_formation = $_GET['id'];
    
    $form_info = $bdd->prepare('SELECT * FROM session WHERE form_id = ?'); 
    $form_info->execute(array($id_formation));
    $form_info = $form_info->fetch(); /* on recupere tout les donnes de la table formation ou le form_id = a la variable $id */
?>

<?php include 'footer.php'; ?>


