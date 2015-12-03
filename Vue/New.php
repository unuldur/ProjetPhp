<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
<?php require_once "Entete.php";?>
    <body>
        <div class="container">
            <?php
                require_once "Debut.php";
            ?>
            <div class="jumbotron">
                <img src="<?php echo $new->image ?>" align="right" height="100px">
                <h1><?php echo $new->titre; ?></h1>
                <p><?php echo $new->contenu; ?></p>
                <p><?php echo  $new->date; ?></p>
            </div>
            <hr>
            <!-- Commentaires -->
                <!-- Commenter -->
                <div class="well">
                    <h4>Poster un commentaire :</h4>
                    
                    <form role="form">
                        <div class="form-group">
                            <h5>Pseudo* :</h5>
                            <input type="text"/>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Poster</button>
                    </form>
                </div>

                <hr>

                <!-- Commentaires existants -->

                <!-- Commentaire -->
                <div class="media">
                    <div class="media-body">
                        <h4 class="media-heading">Pseudo
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Commentaire (contenu)
                    </div>
                </div>
                
                <hr>
                
                <!-- Commentaire -->
                <div class="media">
                    <div class="media-body">
                        <h4 class="media-heading">Pseudo
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Commentaire (contenu)
                    </div>
                </div>            
        </div>
        <?php require_once "Footer.php"; ?>
    </body>
</html>
