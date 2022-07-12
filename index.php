<!DOCTYPE html>
<html>
    <head>
        <title>Computer Aid | Reparaciones y Ventas</title>
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
        <p>
            <h1>
                ¿Qué deseas hoy?
            </h1>
        </p>
        
        <table class="tablaServicios">
            <tbody class="tituloTabla">
                <tr>
                    <td class="tituloServicios" colspan="4" >
                        <br>Reparaciones<br><br>    
                    </td>
                </tr>
                <tr>
                    <td align="center" class="tdServicios">
                        <a href="mantencionPc.php">
                            <?php
                                $op = new Datos();
                                echo "<img src=" . $op->obtenerImagen('index_optimizarPc') . " class='imagenesTablas'>";
                            ?>
                        </a>
                        <p class="descripcionServicio">Mantención de PC</p>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="formateoPc.php">
                            <?php
                                $op = new Datos();
                                echo "<img src=" . $op->obtenerImagen('index_formateoPC') . " class='imagenesTablas'>";
                            ?>
                        </a>
                        <p class="descripcionServicio">Restauración de PC</p>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="reparacionComponente.php">
                            <?php
                                $op = new Datos();
                                echo "<img src=" . $op->obtenerImagen('index_reapararCompontente') . " class='imagenesTablas'>";
                            ?>
                        </a>
                        <p class="descripcionServicio">Reparación de componente o periférico</p>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="diagnostoRep.php">
                            <?php
                                $op = new Datos();
                                echo "<img src=" . $op->obtenerImagen('index_diagnosticoYRe') . " class='imagenesTablas'>";
                            ?>
                        </a>
                        <p class="descripcionServicio">Diagnóstico y reparación</p>
                    </td>
                </tr>
                <tr class="tituloTabla">
                    <td class="tituloServicios" colspan="4">
                        <br>Venta de artículos tecnológicos<br><br>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="tdServicios">
                        <a href="ventaLaptops.php">
                            <?php
                                $op = new Datos();
                                echo "<img src=" . $op->obtenerImagen('index_laptop') . " class='imagenesTablas'>";
                            ?>
                        </a>
                        <p class="descripcionServicio">Laptops</p>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="ventaCpu.php">
                            <?php
                                $op = new Datos();
                                echo "<img src=" . $op->obtenerImagen('index_procesador') . " class='imagenesTablas'>";
                            ?>
                        </a>
                        <p class="descripcionServicio">Procesadores</p>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="ventaGraficas.php">
                            <?php
                                $op = new Datos();
                                echo "<img src=" . $op->obtenerImagen('index_grafica') . " class='imagenesTablas'>";
                            ?>
                        </a>
                        <p class="descripcionServicio">Tarjetas gráficas</p>
                    </td>
                    <td align="center" class="tdServicios">
                        <a href="ventaSoftware.php">
                            <?php
                                $op = new Datos();
                                echo "<img src=" . $op->obtenerImagen('index_software') . " class='imagenesTablas'>";
                            ?>
                        </a>
                        <p class="descripcionServicio">Software</p>
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