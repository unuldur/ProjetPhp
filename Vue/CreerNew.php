<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
<?php require_once "Entete.php";?>
    <body>
        <div class="container">
            <?php
                require_once "Debut.php";
            ?>
            <div class="jumbotron">
                <form class = "form" role = "form">
                    <div class = "form-inline">
                        <div class="form-group">
                            <input type = "text" class = "form-control" placeholder = "Titre de l'arcticle">
                        </div>
                        <div class = "form-group">
                            <img src="" class="img-thumbnail"/>
                        </div>
                    </div>

                    <div class = "form-group">
                        <input type = "file" id = "inputfile">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="10" placeholder="Contenu de l'arcticle"></textarea>
                    </div>
                    <button type = "submit" class = "btn btn-primary">Poster</button>
                </form>
            </div>
        </div>
        <?php require_once "Footer.php"; ?>
    </body>
</html>