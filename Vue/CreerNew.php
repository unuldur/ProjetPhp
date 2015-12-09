<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
<?php require_once "Entete.php";?>
    <body>
        <div class="container">
            <?php
                require_once "Debut.php";
                if(!isset($oktitre)) $oktitre = true;
                if(!isset($oktexte)) $oktexte = true;
                if(!isset($titre)) $titre = "";
                if(!isset($texte)) $texte = "";
            ?>
            <div class="jumbotron">
                <form class = "form" role = "form" method="post">
                    <div class = "form-inline">
                        <div class="form-group <?php if(!$oktitre) echo"has-error has-feedback" ?>">
                            <input type = "text" class = "form-control" placeholder = "Titre de l'arcticle" name="titre" value="<?php echo $titre ?>">
                            <?php if(!$oktitre) echo "<span class='glyphicon glyphicon-warning-sign form-control-feedback'></span>" ?>
                        </div>
                        <div class = "form-group">
                            <img class="img-thumbnail" id="uploadPreview"/>
                        </div>
                    </div>

                    <div class = "form-group">
                        <input type = "file" id = "inputfile" name="image" onchange="PreviewImage();"/>
                        <script type="text/javascript">

                            function PreviewImage() {
                                var oFReader = new FileReader();
                                oFReader.readAsDataURL(document.getElementById("inputfile").files[0]);
                                oFReader.onload = function (oFREvent) {
                                    document.getElementById("uploadPreview").src = oFREvent.target.result;
                                };
                            };

                        </script>
                    </div>

                    <div class="form-group <?php if(!$oktexte) echo"has-error has-feedback" ?>">
                        <textarea class="form-control" rows="10" placeholder="Contenu de l'arcticle" name="texte"><?php echo $texte ?></textarea>
                        <?php if(!$oktexte) echo "<span class='glyphicon glyphicon-warning-sign form-control-feedback'></span>" ?>
                    </div>
                    <button type = "submit" class = "btn btn-primary" name="action" value="addNew">Poster</button>
                </form>
            </div>
        </div>
        <?php require_once "Footer.php"; ?>
    </body>
</html>