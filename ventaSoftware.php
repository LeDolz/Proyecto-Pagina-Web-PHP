<!DOCTYPE html>
<html>
    <head>
        <title>Venta de Software</title>
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
                Software
            </p>
        </h1>

        <table class="tablaServicios">
            <tbody>
                <tr class="tituloTabla">
                    <td class="tituloServicios" colspan="4" >
                        <br>Software disponible<br><br>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="tdServicios">
                        <a href="formularioVentaSoft.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('windows10Home') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Windows 10 Home 64 Bits</p>
                            <p class="precioProducto">$124.990</p>
                        </a>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formularioVentaSoft.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('avast1anio') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Avast Premium Security<br>1 Año</p>
                            <p class="precioProducto">$18.900</p>
                        </a>
                        
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formularioVentaSoft.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('windows11home') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Windows 11 Home 64 Bits</p>
                            <p class="precioProducto">$139.990</p>
                        </a>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formularioVentaSoft.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('officeCaja') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Microsoft Office 2021<br>Hogar y oficina</p>
                            <p class="precioProducto">$269.990</p>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="tdServicios" colspan="4">
                        <a href="formularioVentaSoft.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('windows10Pro') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Windows 10 Professional<br>32/64 Bits</p>
                            <p class="precioProducto">$204.990</p>
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