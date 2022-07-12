<!DOCTYPE html>
<html>
    <head>
        <title>Contáctanos</title>
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
                public function ingresarContacto($nombre, $email, $msj){
                    $sql = "call aniadirMsj('$nombre', '$email', '$msj')";
                    mysqli_query($this->conexion, $sql);
                    
                    echo '<script>alert("Se ha enviado tu mensaje!!");</script>';
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
                                $op = new Datos();
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

        <p class="textoNormal" align="justify">
            Para ponernos en contacto con usted, necesitamos que llene el siguiente formulario.<br>Una vez enviado, nos contactaremos con usted en la brevedad.
        </p>

        <form action="contactanos.php" method="POST">
            <table>
                <tbody>
                    <tr>
                        <td class="tdContactanos">
                            Nombre y apellido
                        </td>
                        <td>
                            <input type="text" class="textoLargoContacto" name="nombre" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdContactanos">
                            Correo electrónico
                        </td>
                        <td>
                            <input type="email" class="textoLargoContacto" name="email" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdContactanos">
                            Motivos del contacto
                        </td>
                        <td colspan="2">
                            <textarea class="textAreaContactanos" name="mensaje" required></textarea>
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

        <?php
            $op = new Datos();

            if(isset($_POST["enviar"])){
                @$nombre = $_POST["nombre"];
                @$email = $_POST["email"];
                @$msj = $_POST["mensaje"];
                $op->ingresarContacto($nombre, $email, $msj);
            }

        ?>
        
    </body>
</html>