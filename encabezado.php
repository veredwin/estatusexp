    <body id="fondoinicio">



        <div id="container" class="header">
            <nav>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <?php
                   
                    $tipo=$_SESSION["tipo"];
                    if($tipo=="administrador"){ ?>

                    <li>
                        <a href="">Expedientes</a>
                    </li>
                     <li>
                        <a href="">Abogados</a>
                    </li>
                     <li>
                        <a href="">Clientes</a>
                    </li>
                    <li>
                        <a href="admin.php">Administrar</a>
                    </li>
                    <?php } elseif ($tipo=="cliente") {
                        # code...
                     ?>
                    <li>
                        <a href="">Perfil</a>
                    </li>
                    <li>
                        <a href="">Historial</a>
                    </li>
                    <?php } elseif ($tipo=="licenciado") { ?>
                    <li>
                        <a href="">Expedientes</a>
                    </li>
                    <li>
                        <a href="">Clientes</a>
                    </li>
                    <?php }?>
                    <li><a href="cerrarsesion.php">Salir</a></li>

                </ul>
            </nav>
        </div>