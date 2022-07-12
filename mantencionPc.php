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

        <table>
            <tbody>
                <tr>
                    <td>
                        <p class="textoNormalImagenDerecha" align="justify">
                            Probablemente sientas que tu PC vaya más lento de lo usual, tarda demasiado en abrir páginas al igual que con los programas más simples y cotidianos.<br>
                            Es por ello que ofrecemos un mantenimiento a tu equipo para que vuelva a funcionar como cuando lo compraste.
                        </p>
                    </td>
                    <td>
                        <?php
                            $op = new Datos();
                            echo "<img src=" . $op->obtenerImagen('mantPc_Pclento') . " style='padding-right: 600px; padding-left: 50px; width: 350px; height: 234;'>";
                        ?>
                    </tr>
                <tr>
                    <td>
                        <br class="brGrande">
                        <p class="textoNormalImagenDerecha">
                            Aquí te ofrecemos una lista con los procedimientos que realizaremos para tratar a tu PC
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul class="listaNormal">
                            <li>Limpiar archivos redundantes</li>
                            <li>Optimizar aplicaciones</li>
                            <li>Realizar una limpieza mediante un antivirus</li>
                            <li>Administrar procesos en segundo plano</li>
                            <li>Limpieza general de los componentes</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="textoNormalImagenDerecha">
                            El costo del mantenimiento es de <strong>$23.990</strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="textoNormalImagenDerecha">
                            <a href="agendarHoraMantencion.php">
                                <?php
                                    $op = new Datos;
                                    echo "<img src=" . $op->obtenerImagen('mantPc_agendar') . " width='64' height='64' style='vertical-align: middle;'>";
                                ?>
                                <strong>
                                    Agenda una hora aquí!
                                </strong>
                            </a>
                        </p>
                    </td>
                    <td>
                        <?php
                            $op = new Datos();
                            echo "<img src=" . $op->obtenerImagen('mantPc_avast') . " style='width: calc(100%/2); margin-left: 300px;'>";
                        ?>
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