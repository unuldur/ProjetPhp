<html>
<?php require_once "Entete.php"?>
    <body>
        <div class="container" >
            <?php require_once "Debut.php";?>
            <div class="jumbotron">
                <div class="alert alert-success" role="alert">
                    <div class="row">
                        <div class="col-lg-11"><?php echo $text ?></div>
                        <div class="col-lg-1"><span class='glyphicon glyphicon-saved'></span></div>
                    </div>
                </div>
                <a class="btn btn-info btn-md" href="Index.php">Continuer...</a>
            </div>
        </div>
        <?php require (__DIR__."/Footer.php")?>
    </body>
</html>