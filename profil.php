<?php include 'header.php' ?>

<?php if(isset($_SESSION['id']) AND $_SESSION['id'] > 0){
    $requser = $bdd->prepare('SELECT * FROM user WHERE usr_id = ?');
    $requser->execute(array($_SESSION['id']));
    $usrinfo = $requser->fetch();
    ?>
    <h1> Bienvenu sur le profil de : <?php echo $usrinfo['usr_nom'] ?> <br>
        Ton mail :  <?php echo $usrinfo['usr_email']; ?>
    </h1>
    
    

    
<?php
    }else{
        header("Location: index.php");
    }
?>
    
<?php include 'footer.php' ?>