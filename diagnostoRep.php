<!DOCTYPE html>
<html>
    <head>
        <title>Diagnóstico y Reparación</title>
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
                Diagnóstico y reparación
            </p>
        </h1>

        <table>
            <tbody>
                <tr>
                    <td>
                        <p class="textoNormalImagenDerecha" align="justify">
                            Tu PC no enciende, se sobrecalienta, está lento y desconoces el por qué?<br>
                            Con este servicio tan solo necesitas venir a nuestras oficinas con tu equipo para que determinemos el problema, para posteriormente resolverlo.<br>
                            En el caso de que alguna pieza esté dañada, se aplicará un cargo extra correspondiente al de la reparación. Por otro lado, si la pieza está irreparablemente dañada, se deberá reemplazar con otra nueva.
                        </p>
                    </td>
                    <td rowspan="2">
                        <?php
                            $op = new Datos;
                            echo "<img src=" . $op->obtenerImagen('diag_pcEnfermo') . " style='padding-right: 600px; padding-left: 50px; width: 350px; height: 234;'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br class="brGrande">
                        <p class="textoNormalImagenDerecha">
                            Aquí te ofrecemos una lista con los procedimientos que realizaremos para diagnosticar tu PC
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul class="listaNormal">
                            <li>Pruebas de encendido</li>
                            <li>Verificar si hay señal de video</li>
                            <li>Comprobar la BIOS</li>
                            <li>Determinar la pieza problemática</li>
                            <li>Tratar con la pieza problemática</li>
                            <li>Verificar el correcto funcionamiento</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="textoNormalImagenDerecha">
                            El costo del diagnóstico es de <strong>$11.990</strong>
                        </p>
                        <p class="textoNormalImagenDerecha">
                            Cualquier cargo extra relacionado con el tratado de una pieza problemática se cobrará en función del servicio que requiera
                        </p>
                    </td>
                    <td rowspan="2">
                        <?php
                            $op = new Datos;
                            echo "<img src=" . $op->obtenerImagen('diag_PcReparar') . " style='width: calc(100%/2); margin-left: 300px; vertical-align: middle;'>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="textoNormalImagenDerecha">
                            <a href="agendarHoraDiagostico.php">
                                <?php
                                    $op = new Datos;
                                    echo "<img src=" . $op->obtenerImagen('diag_seo') . " width='64' height='64' style='vertical-align: middle;'>";
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