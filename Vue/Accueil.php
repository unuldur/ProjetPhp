<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
    <?php
        require_once "Entete.php";
    ?>
    <body style="background-color: #333333">
    <div class="container">
        <?php
        require_once "Debut.php";
        ?>
        <?php
        foreach($newsTab as $new)
        if (isset($new)) {
            {
                ?>
                <div class="ro" >
                    <div class="col-md-2"></div>
                    <article class="col-md-8 border margin padding jumbotron">
                        <div class="row" >
                            <img src= "<?php echo $new->image?>" class="col-md-3" align="left" />
                            <div class="col-md-9">
                                <a class="col-md-12 h2" href="<?php echo "Index.php?action=toNew&page=".$new->id ?>"><?php echo $new->titre?></a>
                                <p class="col-md-12"><?php echo Modele::getResumer($new->contenu)?></p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4">
                                <?php echo $new->date?>
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

    <div class="container text-center">
        <ul class="pagination">
            <li <?php if($pageActuelle==1) echo 'class="disabled"'?>"><a <?php $a = $pageActuelle-1; if($pageActuelle!=1)echo' href="Index.php?page='.$a.'"'; ?>>&laquo;</a></li>
            <?php
                for($i=1;$i<=$nbPage;$i++)
                {
                    if($pageActuelle != $i)
                        echo '<li><a href="Index.php?page='.$i.'">'.$i.'</a></li>';
                    else
                        echo '<li class="active"><a href="#">'.$i.'</a></li>';
                }
            ?>
            <li <?php if($pageActuelle==$nbPage) echo 'class="disabled"'?>"><a <?php $a = $pageActuelle+1; if($pageActuelle!=$nbPage)echo' href="Index.php?page='.$a.'"'; ?>>&raquo;</a></li>
        </ul>
    </div>
    <?php require ("Footer.php"); ?>
    </body>
</html>
