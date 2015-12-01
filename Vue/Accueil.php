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
                            <img src= "<?php echo $new->getImage()?>" class="col-md-3" align="left" />
                            <div class="col-md-9">
                                <a class="col-md-12 h2" href="<?php echo "Index.php?action=toNew&page=".$new->getId() ?>"><?php echo $new->getTitre()?></a>
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
    <?php require ("Footer.php"); ?>
    </body>
</html>
