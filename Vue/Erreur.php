<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
    <?php
    require_once "Entete.php";
    ?>
    <body>
        <?php require ("Debut.php"); ?>
        <div class="container">
            <p class="has-error"> <?php echo $tabError[count($tabError)-1] ?> </p>
        </div>
        <?php require ("Footer.php"); ?>
    </body>
</html>
