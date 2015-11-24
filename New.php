<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
<?php require_once "Entete.php";?>
    <body>
        <div class="container">
            <?php
                require_once "Debut.php";
                include_once "News.php";

            $newsTab = [new News("News1","Image/PlayerIl.png","12/11/1996","Un contenu certe un peu long mais c'est juste un test pour voir si celui ci marche ne serait ce que'un petit peu voila maintenat je suis content j'erit avec plein de fautes et beaucoup"
            ),new News("News2","Image/","45/45/45","ahzcouaecauevuc"), new News("Titre de la new","Image/PlayerIl.png","10/01/2015","Paragraphe de l'article")];
                if(!isset($_GET['page']))
                    $idNew = 1;
                else
                    $idNew = $_GET['page'];
                $idNew = filter_var($idNew,FILTER_SANITIZE_NUMBER_INT);
                if($idNew < 1)
                    $idNew = 1;
                if($idNew > count($newsTab))
                    $idNew = count($newsTab);
                $new = $newsTab[$idNew-1];
            ?>
            <div class="jumbotron">
                <img src="<?php echo $new->getImage() ?>" align="right" height="100px">
                <h1><?php echo $new->getTitre(); ?></h1>
                <p><?php echo $new->getContenu(); ?></p>
                <p><?php echo  $idNew; ?></p>
            </div>
        </div>
    </body>
</html>

