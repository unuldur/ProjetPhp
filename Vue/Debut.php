
                <header class="page-header text-center">
                    <h1 class="h1"><img src="Vue/Image/Downhell.png"></h1>
                </header>
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav">
                            <li> <a href="Index.php">Accueil</a> </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" href="#">Informations<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Monstres</a></li>
                                    <li><a href="#">Armes</a></li>
                                    <li><a href="#">Compétences</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Ce qui est prévu</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-right form-inline" method="post">

                            <div class="form-group" >
                                <?php
                                if($admin) {
                                    ?>
                                    <button type="submit" class="btn btn-info btn-sm" name="action" value="toCreerNew">
                                        + 1 new
                                    </button>
                                    <button type="submit" class="btn btn-info btn-sm" name="action" value="deconnection">Deconnection</button>
                                    <?php
                                }
                                ?>
                                <button type="submit" class="btn btn-info btn-sm"  name="action" value="toFormulaire">Administrateur</button>
                            </div>

                        </form>
                    </div>
                </nav>