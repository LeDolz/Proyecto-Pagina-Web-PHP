<!DOCTYPE html>
<html>
    <head>
        <title>Ventas de Laptops</title>
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
                Laptops
            </p>
        </h1>

        <table class="tablaServicios">
            <tbody>
                <tr class="tituloTabla">
                    <td class="tituloServicios" colspan="4" >
                        <br>Laptops disponibles<br><br>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('acerAspire5') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Acer Aspire 5 <br>Ryzen 3 3350U</p>
                            <p class="precioProducto">$349.990</p>
                        </a>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('ideaPadG3') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Lenovo IdeaPad Gaming 3<br>Ryzen 5 5600H<br>RTX 3050</p>
                            <p class="precioProducto">$699.990</p>
                        </a>
                        
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('macbookm1') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">MacBook Air<br>Apple M1</p>
                            <p class="precioProducto">$929.990</p>
                        </a>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('msiModern14') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">MSI Modern 14<br>Intel i7-1165G7</p>
                            <p class="precioProducto">$899.990</p>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('vivoBookOLED') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">ASUS VivoBook Pro 15 OLED<br>Ryzen 7 5800H<br>RTX 3050Ti</p>
                            <p class="precioProducto">$999.990</p>
                        </a>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('gigabyteAero') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Gigabyte AERO 17<br>Intel i9-11900H<br>RTX 3060</p>
                            <p class="precioProducto">$1.299.990</p>
                        </a>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('hp240') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">HP 240 G7<br>Intel Celeron N4020</p>
                            <p class="precioProducto">$219.990</p>
                        </a>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('lenovoLegion7') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Lenovo Legion 7<br>Ryzen 9 5900HX<br>RTX 3080</p>
                            <p class="precioProducto">$2.449.990</p>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="tdServicios" colspan="2">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('hpOmen') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">HP Omen 16<br>Intel i5-11400H<br>RTX 3060</p>
                            <p class="precioProducto">$949.990</p>
                        </a>
                    </td>
                    <td align="center" class="tdServicios" colspan="2">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('matebook') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Huawei Matebook D15<br>Intel i5-10210U</p>
                            <p class="precioProducto">$559.990</p>
                        </a>
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