<!DOCTYPE html>
<html>
    <head>
        <title>Computer Aid | Reparaciones y Ventas</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="perfil.css">
        <style>
            .tdmsj{
                padding-right: 5px;
                padding-left: 5px;
                background-color: white;
                border: solid black 1px;
                border-collapse: collapse;
            }
            .tablaMsj{
                font-size: larger;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                border-collapse: collapse;
            }
        </style>
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
                public function verMensajes(){
                    $sql = "call verMensajes()";
                    $resultado = $this->conexion->query($sql);
                    while(mysqli_next_result($this->conexion)){;}
                    echo "<hr><table class='tablaMsj' style='border-collapse:collapse ;'>
                        <tr>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Nombre
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'> 
                                Correo
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Mensaje
                            </td>
                        </tr>";
                    while($dato = $resultado->fetch_assoc()){
                        echo "
                            <tr>
                                <td class='tdmsj'>
                                    " . $dato["nombreCompleto"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["email"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["mensaje"] . "
                                </td>
                            </tr>
                            ";
                    }
                    echo "</table>";
                }
                public function verHoras(){
                    $sql = "call verHoras()";
                    $resultado = $this->conexion->query($sql);
                    while(mysqli_next_result($this->conexion)){;}
                    echo "<hr><table class='tablaMsj' style='border-collapse:collapse; font-family:Verdana;'>
                        <tr>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Nombre
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'> 
                                Número de teléfono
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Tipo de dispositivo
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Oficina
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Fecha
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Hora
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Tipo de servicio
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Descripción (Opcional)
                            </td>
                        </tr>";
                    while($dato = $resultado->fetch_assoc()){
                        echo "
                            <tr>
                                <td class='tdmsj'>
                                    " . $dato["nomCompleto"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["telefono"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["tipoDispositivo"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["oficina"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["fecha"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["hora"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["tipoServicio"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["descripcion"] . "
                                </td>
                            </tr>
                            ";
                    }
                    echo "</table>";
                }
                public function verVentasHardware(){
                    $sql = "call verVentaHard()";
                    $resultado = $this->conexion->query($sql);
                    while(mysqli_next_result($this->conexion)){;}
                    echo "<hr><table class='tablaMsj' style='border-collapse:collapse; font-family:Verdana;'>
                        <tr>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Nombre
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'> 
                                Nombre del receptor
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Número telefónico
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Correo
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Courier
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Región
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Ciudad
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Dirección
                            </td>
                                <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Cupón
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Medio de pago
                            </td>
                        </tr>";
                    while($dato = $resultado->fetch_assoc()){
                        echo "
                            <tr>
                                <td class='tdmsj'>
                                    " . $dato["nombre"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["nombreReceptor"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["telefono"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["email"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["courier"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["region"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["ciudad"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["direccion"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["cupon"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["medioPago"] . "
                                </td>
                            </tr>
                            ";
                    }
                    echo "</table>";
                }
                public function verVentasSoftware(){
                    $sql = "call verVentaSoft()";
                    $resultado = $this->conexion->query($sql);
                    while(mysqli_next_result($this->conexion)){;}
                    echo "<hr><table class='tablaMsj' style='border-collapse:collapse; font-family:Verdana;'>
                        <tr>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Nombre
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Número telefónico
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Correo
                            </td>
                                <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Cupón
                            </td>
                            <td class='tdmsj' align='center' style='font-weight:bold;'>
                                Medio de pago
                            </td>
                        </tr>";
                    while($dato = $resultado->fetch_assoc()){
                        echo "
                            <tr>
                                <td class='tdmsj'>
                                    " . $dato["nombre"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["telefono"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["email"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["cupon"] . "
                                </td>
                                <td class='tdmsj'>
                                    " . $dato["medioPago"] . "
                                </td>
                            </tr>
                            ";
                    }
                    echo "</table>";
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
        
        <form method="POST" action="listaMensajes.php">
            <table class="tablaMsj">
                <tr>
                    <td class="tdServicios">
                        <p class="descripcionServicio">
                            Mensajes de contacto
                        </p>
                    </td>
                    <td class="tdServicios" style="border-collapse:collapse ;">
                        <p class="descripcionServicio">
                            Horas agendadas
                        </p>
                    </td>
                    <td class="tdServicios">
                        <p class="descripcionServicio">
                            Venta de hardware
                        </p>
                    </td>
                    <td class="tdServicios">
                        <p class="descripcionServicio">
                            Venta de software
                        </p>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="tdServicios"> 
                    <button type="submit" name="verMensajes" class="botonMsj" style="width: 210px; height: 30px;">Ver los mensajes de contacto</button>  
                    </td>
                    <td align="center" class="tdServicios">
                        <button type="submit" name="verHoras" class="botonMsj" style="width: 210px; height: 30px;">Ver las horas agendadas</button>  
                    </td>
                    <td align="center" class="tdServicios">
                        <button type="submit" name="verCompraHard" class="botonMsj" style="width: 210px; height: 30px;">Ver las ventas de hardware</button>  
                    </td>
                    <td align="center" class="tdServicios">
                        <button type="submit" name="verCompraSoft" class="botonMsj" style="width: 210px; height: 30px;">Ver las ventas de software</button>  
                    </td>   
                </tr>
                
            </table>
        </form>

        <?php
        $op = new Datos();
        if(isset($_POST["verMensajes"])){
            $op->verMensajes();
        }
        if(isset($_POST["verHoras"])){
            $op->verHoras();
        }
        if(isset($_POST["verCompraHard"])){
            $op->verVentasHardware();
        }
        if(isset($_POST["verCompraSoft"])){
            $op->verVentasSoftware();
        }
        ?>

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