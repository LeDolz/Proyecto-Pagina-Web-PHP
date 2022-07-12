<!DOCTYPE html>
<html>
    <head>
        <title>Venta de Gráficas</title>
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
                Tarjetas gráficas
            </p>
        </h1>

        <table class="tablaServicios">
            <tbody>
                <tr class="tituloTabla">
                    <td class="tituloServicios" colspan="4" >
                        <br>Tarjetas gráficas disponibles<br><br>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('asus1650') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">ASUS TUF GTX 1650<br>GDDR5</p>
                            <p class="precioProducto">$229.990</p>
                        </a>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('msiRx6600xt') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">MSI RX6600 XT MECH 2X</p>
                            <p class="precioProducto">$459.990</p>
                        </a>
                        
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('evga3060ti') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">EVGA 3060Ti FTW<br>Ultra Gaming</p>
                            <p class="precioProducto">$649.990</p>
                        </a>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('asusGt1030') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">ASUS PH-GT1030 O2G<br>GDDR5</p>
                            <p class="precioProducto">$119.990</p>
                        </a>
                    </td>
                </tr>
                <tr class="tituloTabla">
                    <td class="tituloServicios" colspan="4" >
                        <br>Proximamente<br><br>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="tdServicios" colspan="4">
                        <?php
                            $op = new Datos;
                            echo "<img src=" . $op->obtenerImagen('aorus3090ti') . " class='imagenesTablas'>";
                        ?>
                        <p class="descripcionServicio">Aorus 3090Ti Gaming <br>OC 24G</p>
                        <p class="precioProductoProx">$2.499.990</p>
                    </td>
                </tr>
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