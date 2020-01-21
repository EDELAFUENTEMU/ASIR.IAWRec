<?php 
$resp ='';
$random = rand(1,25);

$servidor = "localhost";
$usuario = "server";
$password = "Server01%";
$db = "bolamagica";

$mbd = new PDO("mysql:host=$servidor;dbname=$db;charset=utf8", $usuario, $password);  
$mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['button'])){
    $sql = 'SELECT respuesta FROM respuestas WHERE id="'.$random.'"';
    foreach ($mbd->query($sql) as $row) {
       $resp = $row['respuesta'];
    }
}

?>
<html>
    <body>
        <form action="" method="post">
        <h2>Bienvenido a la página de la Bola Magica</h2>
        <p>La bola 8 magica contestara cualquier pregunta que hagas cuya respuesta sea del tipo Sí o No, simplemente escribela y pulsa el boton para conocer la sabia respuesta de la bola</p>
        <textarea cols="60" rows="3" id="textarea" name="preg"><?php if(isset($_POST['preg'])){echo $_POST['preg'];} ?></textarea>
        <br><br>
        <button type="submit" name="button">Pregunta a la bola</button>
        </form>
        <p><?php echo $resp; ?></p>
    </body>
</html>