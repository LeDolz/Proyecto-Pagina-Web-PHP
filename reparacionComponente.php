<!DOCTYPE html>
<html>
    <head>
        <title>Reparación de piezas</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="perfil.css">
        <?php
            class Datos{
                private $db_host, $db_nombre, $db_usuario, $db_pass, $conexion;
                function __construct()
                {
                    $this->db_host = "localhost";
                    $this->db_nombre = "proyecto";
                    $this->db_usuario = "root";
                    $this->db_pass = "";
                    try {
                        $this->conexion = mysqli_connect($this->db_host, $this->db_usuario, $this->db_pass, $this->db_nombre);
                    }catch (Exception $e) {
                        echo "ERROR FATAL<br><br>$e";
                        exit();
                    }
                }
                public function obtenerImagen($nombre){
                    $sql = "call obtenerUrl('$nombre');";
                    $resultado = $this->conexion->query($sql);
                    $dato =  $resultado-> fetch_assoc();
                    return $dato["url"];
                }
            }
        ?>
    </head>
    <body>
        <header>
            <table class="tablaHeader">
                <tbody class="bodyHeader">
                    <td class="celdaHeader">
                        <a href="index.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('logoTienda') . ">";
                            ?>
                        </a>
                    </td>
                </tbody>
                <tbody>
                    <td class="celdaHeader">
                        Reparaciones y venta de componentes
                    </td>
                </tbody>
            </table>
            <hr>
        </header>

        <h1>
            <p>
                Reparaciones
            </p>
        </h1>

        <table>
            <tbody>
                <tr>
                    <td>
                        <p class="textoNormalImagenDerecha" align="justify">
                            En Computer Aid somo capaces de reparar piezas y periféricos de tu ordenador, para ello utilizamos técnicas certificadas por la industria en nuestros procesos.
                        </p>
                    </td>
                    <td rowspan="2">
                        <?php
                            $op = new Datos();
                            echo "<img src=" . $op->obtenerImagen('rep_soldarPlaca') . " style='padding-left: 350px; width: 640px; height: 360;'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br class="brGrande">
                        <p class="textoNormalImagenDerecha">
                            A continuación, te presentamos las piezas y componentes los cuales podemos reparar para su correcto funcionamiento.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>
                            <p>
                                <hr>
                                Componentes pequeños
                            </p>
                        </h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul class="listaNormal">
                            <li>Ventiladores</li>
                            <li>Tarjetas de red</li>
                            <li>Puertos de la placa madre</li>
                            <li>Unidades ópticas</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="textoNormalImagenDerecha">
                            El costo de la reparación de cualquiera de estos componentes es de <strong>$14.990</strong>
                        </p>
                        <p class="textoNormalImagenDerecha">
                            <a href="agendarHoraRepCompPequenio.php">
                                <?php
                                    $op = new Datos();
                                    echo "<img src=" . $op->obtenerImagen('rep_agendar1') . " width='64' height='64' style='vertical-align: middle;'>";
                                ?>
                                <strong>
                                    Agenda una hora aquí!
                                </strong>
                            </a>
                        </p>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>
                            <p>
                                Componentes Grandes
                            </p>
                        </h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul class="listaNormal">
                            <li>Procesadores</li>
                            <li>Tarjetas gráficas</li>
                            <li>Placas madres</li>
                            <li>Memorias RAM</li>
                            <li>Fuentes de poder</li>
                            <li>Refrigeraciones líquidas</li>
                            <li>Almacenamientos</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="textoNormalImagenDerecha">
                            El costo de la reparación de cualquiera de estos componentes es de <strong>$29.990</strong>
                        </p>
                        <p class="textoNormalImagenDerecha">
                            <a href="agendarHoraRepCompGrande.php">
                                <?php
                                    $op = new Datos();
                                    echo "<img src=" . $op->obtenerImagen('rep_agendar2') . " width='64' height='64' style='vertical-align: middle;'>";
                                ?>
                                <strong>
                                    Agenda una hora aquí!
                                </strong>
                            </a>
                        </p>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h2>
                            <p>
                                Periféricos
                            </p>
                        </h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul class="listaNormal">
                            <li>Mouses</li>
                            <li>Teclados</li>
                            <li>Audifonos</li>
                            <li>Impresoras</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="textoNormalImagenDerecha">
                            El costo de la reparación de cualquiera de estos componentes es de <strong>$12.990</strong>
                        </p>
                        <p class="textoNormalImagenDerecha">
                            <a href="agendarHoraRepPeriferico.php">
                                <?php
                                    $op = new Datos();
                                    echo "<img src=" . $op->obtenerImagen('rep_agendar3') . " width='64' height='64' style='vertical-align: middle;'>";
                                ?>
                                <strong>
                                    Agenda una hora aquí!
                                </strong>
                            </a>
                        </p>
                    </td>
                </tr>          
            </tbody>
        </table>

        </table>
        
        <hr>
        <footer>

            <table class="tbodyContacto">
                <tbody>
                    <tr>
                        <td colspan="2">
                            <p>
                                <h2 class="seleccionServicio">
                                    Contactos
                                </h2>
                            </p>
                            <br class="brGrande">
                        </td>
                        <td rowspan="4" class="trLogo">
                            <?php
                                $op = new Datos();
                                echo "<img src=" . $op->obtenerImagen('logoTienda') . ">";
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdContacto">Correo:</td>
                        <td class="tdContacto">contacto@computerAid.cl</td>
                        <td class="tdContacto"></td>
                    </tr>
                    <tr>
                        <td class="tdContacto">Número telefónico:</td>
                        <td class="tdContacto">+56 9 34728832</td>
                    </tr>
                    <tr>
                        <td class="tdContacto">Formulario de contacto:</td>
                        <td>
                            <a href="contactanos.php">
                                <?php
                                    $op = new Datos();
                                    echo "<img src=" . $op->obtenerImagen('footer_contacto') . " class='imagenMeta'>";
                                ?>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdContacto">Lista de mensajes</td>
                        <td>
                            <a href="listaMensajes.php">
                                <?php
                                    $op = new Datos();
                                    echo "<img src=" . $op->obtenerImagen('mensaje') . " class='imagenMeta'>";
                                ?>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </footer>
    </body>
</html>