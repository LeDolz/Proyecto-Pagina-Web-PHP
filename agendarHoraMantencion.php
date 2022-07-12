<!DOCTYPE html>
<html>
    <head>
        <title>Mantención</title>
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
                Mantención de PC
            </p>
        </h1>

        <p class="textoNormal" align="justify">
            En este formulario puedes asignar una hora para la revisión y mantención de tu PC. <br>
            Una vez que hayas rellenado el formulario se verificará si es que la hora se encuentra disponible.<br>
            Para poder atenderte deberás llevar tu equipo a nuestro establecimiento para poder arreglarlo.
        </p>

        <form action="agendarHoraMantencion.php" method="POST">
            <table>
                <tbody>
                    <tr>
                        <td class="tdContactanos">
                            <p>
                                Nombre completo
                            </p>
                        </td>
                        <td>
                            <input type="text" class="textoLargoContacto" required name="nombre">
                        </td>
                    </tr>
                    <tr>
                        <td class="tdContactanos">
                            <p>
                                Teléfono movil
                            </p>
                        </td>
                        <td>
                            <input type="text" class="textoLargoContacto" required name="telefono">
                        </td>
                    </tr>
                    <tr>
                        <td class="tdContactanos">
                            <p>
                                Tipo de dispositivo
                            </p>
                        </td>
                        <td class="tdContactanos">
                            Desktop
                            <input type="radio" value="Desktop" name="tipoDispositivo" style="margin-right: 70px;" required>
                            Laptop
                            <input type="radio" value="Laptop" name="tipoDispositivo" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdContactanos">
                            <p>
                                Oficina donde será atendido
                            </p>
                        </td>
                        <td>
                            <select name="oficina">
                                <option value="Santiago Centro">Santiago Centro</option>
                                <option value="Valparaiso">Valparaíso</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdContactanos">
                            <P>
                                Fecha en la que será atendido
                            </P>
                        </td>
                        <td>
                            <input type="date" required name="fecha">
                        </td>
                    </tr>
                    <tr>
                        <td class="tdContactanos">
                            <P>
                                Hora en la que será atendido
                            </P>
                        </td>
                        <td>
                            <input type="time" required name="hora">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                                <input type="submit" value="Agendar hora" class="botonesContactanos" name="enviar"> 
                            </td>
                        <td align="right">
                            <input type="reset" value="Reestablecer" class="botonesContactanos">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

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
    <?php
    
    if(isset($_POST["enviar"])){
        @$nombre = $_POST["nombre"];
        @$numTel = $_POST["telefono"];
        @$tipoDisp = $_POST["tipoDispositivo"];
        @$oficina = $_POST["oficina"];
        @$fecha = $_POST["fecha"];
        @$hora = $_POST["hora"];
        @$servicio = "MantencionPc";

        $op = new Datos();
        $op->agendarHoraMantPc($nombre, $numTel, $tipoDisp, $oficina, $fecha, $hora, $servicio);
    }
    
    
    ?>
</html>