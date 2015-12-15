<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
<?php require_once "Entete.php";?>
    <body>
        <div class="container">
            <?php require_once "Debut.php";?>
            <div class="jumbotron">
                <img src="<?php echo $new->image ?>" align="right" height="100px">
                <h1><?php echo $new->titre; ?></h1>
                <p><?php echo nl2br($new->contenu); ?></p>
                <p><?php echo  $new->date; ?></p>
            </div>
            <hr>
            <!-- Commentaires -->
                <!-- Commenter -->
                <div class="well">
                    <h4>Poster un commentaire :</h4>
                    <form role="form" method="post">
                        <div class="form-inline padding <?php if(!$okpseudo) echo"has-error has-feedback" ?>">
                            <label class="text-right">Pseudo* :</label>
                            <input class="form-control" type="text" name="pseudo" value="<?php echo $pseudo ?>"/>
                        </div>
                        <div class="form-group <?php if(!$oktexte) echo"has-error has-feedback" ?>">
                            <textarea class="form-control" rows="3" name="texte"><?php echo $texte ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="action" value="addCom">Poster</button>
                    </form>
                </div>

                <hr>

                <!-- Commentaires -->
                <?php
                    foreach($new->commentaires as $com)
                    {
                        ?>
                        <div class="media">
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $com->pseudo ?>
                                    <small><?php echo $com->infos ?></small>
                                </h4>
                                <?php echo $com->contenu ?>
                            </div>
                        </div>
                        <hr>
                        <?php
                    }
                ?>
        </div>
        <?php require_once "Footer.php"; ?>
    </body>
</html>
