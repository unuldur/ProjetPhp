<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <?php
    require_once "Entete.php"
    ?>
    <body>
        <div class="container" >
            <?php
            require_once "Debut.php";
            ?>
            <form class="form-inline margin padding" method="post" >
                <div class="form-group col-md-12 <?php if(!$okpseudo) echo"has-error has-feedback" ?>">
                    <label class="col-md-6 text-right">Pseudo :</label>
                    <input class="form-control col-md-6" type="text" name="pseudo" value="<?php echo $pseudo ?>">
                </div>
                <div class="form-group col-md-12 <?php if(!$okmdp) echo"has-error has-feedback" ?>">
                    <br>
                    <label class="col-md-6 text-right">Mot de passe :</label>
                    <input class="form-control col-md-6" type="password" name="mdp">
                </div>
                <div class="col-md-12">
                    <p class=""></p>
                    <p class="col-md-offset-6 col-md-6"><input type="submit" name="action" value="connection" class="btn btn-info btn-md"></p>
                </div>



            </form>
        </div>
        <?php
        require (__DIR__."/Footer.php")
        ?>
    </body>
</html>