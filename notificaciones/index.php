<?php
$raiz="./";
        include_once("libreria/funciones_comunes.php");
        $titulo_pagina="login";
//muestro el formulario para hacer login
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php parametro_plantilla("titulo_pagina"); ?></title>
    <meta name="Description" content="<?php parametro_plantilla('Description');?>">
    <meta name="Keywords" content="<?php parametro_plantilla('Keywords');?>">
    <link rel="stylesheet" href="cs3.css"/>
    <!--Jquery-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<body>
<section id="contenedor">
            <article id="login">
                        <h1>#YoSoy132Culiacan Org.</h1>
                        <div id="divicion"></div>
                        <div id="formulario">
                        <?php errores() ?>
                                <div class="error"></div>
                                <form action="dologin.php" id="form" method="post">
                                <label>Usuario</label><br>
                                <input type="text" name="usuario" autocomplete="off" placeholder="usuario" title="usuario" maxlength="20"  class="texbox" required><br>
                                <label>Password</label><br>
                                <input type="password" name="password" autocomplete="off" placeholder="password" maxlength="20" title="password" class="password" required>
                                <label>¿Olvidaste tu contraseña? <a href="#">Click Aqui</a></label><br>
                                <input type="submit" name="entrar" id="entrar" value="Entrar">
                                </form>
                        </div>
            </article>
</section>
</body>
</html>