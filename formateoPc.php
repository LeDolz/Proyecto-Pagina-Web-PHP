<!DOCTYPE html>
<html>
    <head>
        <title>Restauración</title>
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
                public function agendarHoraMantPc($nombre, $telefono, $tipoDis, $oficina, $fecha, $hora, $tipoServicio){
                    $sql = "call agendarHora('$nombre', '$telefono', '$tipoDis', '$oficina', '$fecha', '$hora', '$tipoServicio')";
                    $this->conexion->query($sql);
                    echo '<script>alert("Hora agendada correctamente");</script>';
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
                Restauración de PC
            </p>
        </h1>
        
        <table>
            <tbody>
                <tr>
                    <td>
                        <p class="textoNormalImagenDerecha" align="justify">
                            Si es que tu computadora arroja la denominada pantalla azul de la muerte o simplemente quieres restaurar el sistema operativo de tu ordenador, entonces esta opción es para ti. <br>
                            Con esta solución restauraremos tu HDD o SSD e instalaremos el sistema operativo que desees para que vuelvas a poder utilizarlo sin problemas.<br>
                            <h6>
                                (Se intalará la versión gratuita del SO que desees)
                            </h6>
                        </p>
                    </td>
                    <td>
                        <?php
                            $op = new Datos();
                            echo "<img src=" . $op->obtenerImagen('formateo_bsod') . " style='padding-left: 350px; width: 561px; height: 333;'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br class="brGrande">
                        <p class="textoNormalImagenDerecha">
                            <h3>
                                Los sitemas operativos que podemos instalar son los siguientes
                            </h3>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul class="listaNormal">
                            <li>Windows XP</li>
                            <li>Windows Vista</li>
                            <li>Windows 7</li>
                            <li>Windows 8</li>
                            <li>Windows 8.1</li>
                            <li>Windows 10</li>
                            <li>Windows 11</li>
                        </ul>
                    </td>
                    <td>
                        <?php
                            $op = new Datos();
                            echo "<img src=" . $op->obtenerImagen('formateo_windows') . ">";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <hr>
                        <p class="textoNormalImagenDerecha">
                            Si deseas llevar tu equipo completo, el costo es de <strong>$9.990</strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="textoNormalImagenDerecha">
                            <a href="agendarHoraFormateo.php">
                                <?php
                                    $op = new Datos();
                                    echo "<img src=" . $op->obtenerImagen('formateo_agendar1') . " width='64' height='64' style='vertical-align: middle;'>";
                                ?>
                                <strong>
                                    Agenda una hora aquí!
                                </strong>
                                <hr>
                            </a>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="textoNormalImagenDerecha">
                            Si tan solo deseas llevar tu HDD o SSD, el costo es de <strong>$4.490</strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="textoNormalImagenDerecha">
                            <a href="agendarHoraFormateoHDD-SSD.php">
                                <?php
                                    $op = new Datos();
                                    echo "<img src=" . $op->obtenerImagen('formateo_agendar2') . " width='64' height='64' style='vertical-align: middle;'>";
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