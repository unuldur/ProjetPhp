<html>
    <?php
    require_once "Entete.php"
    ?>
    <body>
        <div class="container" >
            <?php
            require_once "Debut.php";
            ?>
            <form class="form-inline margin padding" method="post" action="Verif.php" >
                <div class="form-group col-md-12">
                    <label class="col-md-6 text-right">Pseudo :</label>
                    <input class="form-control col-md-6" type="text" name="pseudo">
                </div>
                <div class="form-group col-md-12">
                    <br>
                    <label class="col-md-6 text-right">Mot de passe :</label>
                    <input class="form-control col-md-6" type="password" name="mdp">
                </div>
                <div class="col-md-12">
                    <p class=""></p>
                    <p class="col-md-offset-6 col-md-6"><input type="submit" name="act" value="Continuer" class="btn btn-info btn-md"></p>
                </div>



            </form>
        </div>
    </body>
</html>