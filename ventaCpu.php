<!DOCTYPE html>
<html>
    <head>
        <title>Ventas de Procesadores</title>
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
                Procesadores
            </p>
        </h1>

        <table class="tablaServicios">
            <tbody>
                <tr class="tituloTabla">
                    <td class="tituloServicios" colspan="4" >
                        <br>Procesadores disponibles<br><br>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('r5-5600x') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Ryzen 5 5600X</p>
                            <p class="precioProducto">$249.990</p>
                        </a>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('r9-5900x') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Ryzen 9 5900X</p>
                            <p class="precioProducto">$479.990</p>
                        </a>
                        
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('i3-12100') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Intel i3-12100F</p>
                            <p class="precioProducto">$109.990</p>
                        </a>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('i5-12600k') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Intel i5-12600K</p>
                            <p class="precioProducto">$289.990</p>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="tdServicios" colspan="2">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('i9-12900K') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Intel i9-12900K</p>
                            <p class="precioProducto">$649.990</p>
                        </a>
                    </td>
                    <td align="center" class="tdServicios" colspan="2">
                        <a href="formularioVenta.php">
                            <?php
                                $op = new Datos;
                                echo "<img src=" . $op->obtenerImagen('threadRipper') . " class='imagenesTablas'>";
                            ?>
                            <p class="descripcionServicio">Ryzen Threadripper Pro 3995WX</p>
                            <p class="precioProducto">$6.099.990</p>
                        </a>
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