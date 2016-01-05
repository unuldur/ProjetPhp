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
            <form class="form-inline margin padding text-center" method="post" >
                <div class="form-group text-center">
                    <label>Voulez vous supprimez la new : <?php echo $new->titre ?></label>
                    <br/>
                    <button type="submit" class="btn btn-warning btn-sm" name="action" value="delNew">
                        Oui
                    </button>
                    <input type="hidden" name="id" value="<?php echo $new->id ?>">
                    <a class="btn btn-info btn-sm" href="Index.php">
                        Non
                    </a>
                </div>
            </form>
        </div>
    </body>
</html>
