    <body id="fondoinicio">



        <div id="container" class="header">
            <nav>
                <ul>
                   
                    <?php
                   
                    $tipo=$_SESSION["tipo"];
                    if($tipo=="administrador"){ ?>

                    <li><a href="principal.php">Inicio</a></li>
                    <li>
                        <a href="expediente.php">Expedientes</a>
                    </li>
                     <li>
                        <a href="abogados.php">Abogados</a>
                    </li>
                     <li>
                        <a href="cliente.php">Clientes</a>
                    </li>
                    <li>
                        <a href="admin.php">Administrar</a>
                    </li>
                    <?php } elseif ($tipo=="cliente") {
                        # code...
                     ?>
                     <li><a href="#">Inicio</a></li>
                    <li>
                        <a href="">Perfil</a>
                    </li>
                    <li>
                        <a href="">Historial</a>
                    </li>
                    <?php } elseif ($tipo=="licenciado") { ?>

                     <li><a href="principal.php">Inicio</a></li>
                    <li>
                        <a href="expediente.php">Expedientes</a>
                    </li>
                    <li>
                        <a href="cliente.php">Clientes</a>
                    </li>
                    <?php }?>
                    <li><a href="cerrarsesion.php">Salir</a></li>

                </ul>
            </nav>
        </div>