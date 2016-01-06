<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
<?php require_once "Entete.php";?>
<body>
<div class="container">
    <?php require_once "Debut.php";?>
    <div class="jumbotron">
        <img src="<?php echo $new->image ?>" align="right" height="100px">
        <h1><?php echo $new->titre; ?></h1>
        <p><?php echo nl2br($new->getContenu()); ?></p>
        <p><?php echo DateTime::createFromFormat("Y-m-d H:i:s", $new->date)->format('\L\e d/m/Y \à H\hi') ?></p>
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

    <!-- Commentaires postés -->
    <?php
    if($allCom || $nbCom < $nbComAff)
        $j = $nbCom;
    else
        $j = $nbComAff;
    for($i=0;$i<$j; ++$i)
    {
        $com = $new->commentaires[$i];
        ?>
        <div class="media inline">
            <div class="media-body">
                <h4 class="media-heading"><?php echo $com->pseudo ?>
                    <small><?php echo $com->infos ?></small>
                </h4>
                <?php echo nl2br($com->getContenu()) ?>
            </div>
            <div class="text-right">
                <?php
                if($admin)
                {
                    ?>
                    <form method="post">
                        <button type="submit" class="btn btn-danger btn-sm" name="action" value="delCom">Supprimer</button>
                        <input type="hidden" name="idCom" value="<?php echo $com->id ?>"/>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
        <hr>
        <?php
    }
    if($nbCom > $nbComAff && !$allCom)
    {
        ?>
        <a href="Index.php?action=affAll&page=<?php echo $idNew ?>" class="btn btn-primary">Afficher plus de commentaires (<?php echo ($nbCom-10); ?>)</a>
        <?php
    }
    ?>
</div>
<?php require_once "Footer.php"; ?>
</body>
</html>
