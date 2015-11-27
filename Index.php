<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
    <?php
        require_once "Entete.php";
    ?>
    <body>
    <div class="container">
        <?php
        require_once "Debut.php";
        ?>
        <?php
        include_once "News.php";
        $newsTab = [new News("News1","Image/PlayerIl.png","12/11/1996","Un contenu certe un peu long mais c'est juste un test pour voir si celui ci marche ne serait ce que'un petit peu voila maintenat je suis content j'erit avec plein de fautes et beaucoup"
        ,1),new News("News2","Image/","45/45/45","ahzcouaecauevuc",2)];
        foreach($newsTab as $new)
        if (isset($new)) {
            {
                ?>
                <div class="ro" >
                    <div class="col-md-2"></div>
                    <article class="col-md-8 border margin padding jumbotron">
                        <div class="row" >
                            <img src= "<?php echo $new->getImage()?>" class="col-md-3" align="left" />
                            <div class="col-md-9">
                                <a class="col-md-12 h2" href="<?php echo "New.php?page=".$new->getId() ?>"><?php echo $new->getTitre()?></a>
                                <p class="col-md-12"><?php echo $new->getContenu()?></p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4">
                                <?php echo $new->getDate()?>
                            </p>
                            <p class="col-md-4"/>
                            <div class="col-md-4 text-right">
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </div>

                        </div>
                    </article>
                </div>
                <?php
                }
        }
        ?>
    </div>

    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js "></script>
    </body>
</html>
