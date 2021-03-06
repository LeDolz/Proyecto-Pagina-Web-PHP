<!DOCTYPE html>
<html>
    <head>
        <title>Finalizar compra</title>
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
                public function aniadirVentaSoft($nombre, $telefono, $email, $cupon, $medioPago){
                    $sql = "call aniadirVentaSoft('$nombre', '$telefono', '$email', '$cupon', '$medioPago')";
                    $this->conexion->query($sql);
                    echo '<script>alert("Compra realizada exitosamente");</script>';
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
                Finaliza tu compra
            </p>
        </h1>

        <p class="textoNormal" align="justify">
            Para finalizar tu compra, necesitamos que nos indiques tu identidad, al igual que tu coreeo electr??nico, se enviar?? la clave de activaci??n a este ??ltimo.
        </p>

        <form action="formularioVentaSoft.php" method="POST">
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
                                Tel??fono movil
                            </p>
                        </td>
                        <td>
                            <input type="text" class="textoLargoContacto" required name="telefono">
                        </td>
                    </tr>
                    <tr>
                        <td class="tdContactanos">
                            <p>
                                Correo electr??nico
                            </p>
                        </td>
                        <td>
                            <input type="email" class="textoLargoContacto" required name="correo">
                        </td>
                    </tr>
                    <tr>
                        <td class="tdContactanos">
                            <P>
                                Cup??n de descuento<br>(Opcional)
                            </p>
                        </td>
                        <td>
                            <input type="text" class="textoLargoContacto" name="cupon">
                        </td>
                    </tr>
                    <tr>
                        <td class="tdContactanos">
                            <p>
                                Medio de pago
                            </p>
                        </td>
                        <td>
                            <select required name="medioPago">
                                <option value="Transferencia">Transferencia bancaria</option>
                                <option value="Webpay">WebPay</option>
                                <option value="Servipag">Servipag</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                                <input type="submit" value="Comprar ahora!" class="botonesContactanos" name="enviar"> 
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
                        <td class="tdContacto">N??mero telef??nico:</td>
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
        @$correo = $_POST["correo"];
        @$cupon = $_POST["cupon"];
        @$medioPago = $_POST["medioPago"];

        $op = new Datos();
        $op->aniadirVentaSoft($nombre, $numTel, $correo, $cupon, $medioPago);
    }
    ?>
</html>