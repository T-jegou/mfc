<?php include 'header.php'; ?>

    <!-- Presentation de l'ecole -->
    MFC formation
    Le leader de la formation continu des profesionelles de l'informatique.
    Bienvenu sur l'outil digitale de la maison de la formation continue.
    Excepturi sint nobis ducimus consequuntur voluptatibus dolorem similique. 
    Ut eveniet non veniam sed sunt ut provident. 
    Numquam sint quam fugiat voluptate quidem quisquam modi voluptas. 
    Quo sequi earum sint tempore sint aut.
    
    
    <button type="button" class="btn btn-primary btn-lg">Nos formations</button>
    <button type="button" class="btn btn-secondary btn-lg">Nos locaux</button>
    <!-- fin de presentation -->
    
    <?php if(!empty($_SESSION)){
        echo 'Salut chibre';
    }else{
        echo 't pas co';
    } ?>
    
<?php include 'footer.php'; ?>