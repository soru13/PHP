<?php
    //$appBaseUrl =   "http://www.yosoy132culiacan.org.mx/canvas";

  /* 
     * Facebook dirige al usuario a la baseUrl tras autentificarlo
     * Comprobamos si nos ha devuelto un $_GET['code']
     * para redirigirlo al appBaseUrl 
     */
    /*if (isset($_GET['code'])){
        header("Location: " . $appBaseUrl);
        exit;
    }    
    
    
// Incluimos el PHP SDK v.3.0.0 de Facebook    
require 'api-PHP-Facebook/facebook.php';

// Creamos un nuevo objeto Facebook con los datos de nuestra aplicación (cambia los datos por los de tu App ID y tu App Secret).
$facebook = new Facebook(array(
  'appId'  => '450178278338515',
  'secret' => '45db688fde2dbe959d1178b616bcfb01',
));

// Obtener el ID del Usuario
$user = $facebook->getUser();

// Podemos obtener o no este dato dependiendo de si el usuario se ha identificado en Facebook o no

if ($user) {
  try {
    // Procedemos a saber si tenemos a un usuario que se ha identificado en Facebook que está autentificado.
    // Si hay algún error se guarda en un archivo de texto (error_log)   
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// la url de Login o Logout dependerá del estado actual del usuario, si está autentificado o no en nuestra aplicación
// Aquí obtenemos los permisos del usuario. Por defecto obtenemos una serie de permisos básicos
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl(            array(
                'scope'         => 'email,publish_stream,user_birthday,user_location,user_work_history,user_about_me,user_hometown'
            ));
}

    if (!$user) {
        echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
        exit;
    }
*/
?>
<?php
$raiz="./";//desde la raiz
include_once("libreria/FuncionesComunes.php"); 
$titulo_pagina="#yosoy132culiacan";
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>
	    <?php
	        parametro_plantilla("titulo_pagina"); 
	    ?>
	</title>
	<meta name="Description" content="<?php parametro_plantilla('Description');?>">
	<meta name="Keywords" content="<?php parametro_plantilla('Keywords');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Finger+Paint' rel='stylesheet' type='text/css'>
	<!--jquery-->
	<link rel="icon" type="image/png" href="img/icon.png" />
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/slider.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css"/>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

	<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
 	<script type="text/javascript" src="js/slider.jquery.js"></script>
	<!--kendo ui--><!--Then paste the following for Kendo UI Web scripts-->
	<link href="http://api.jmnetworking.org/kendoui/styles/kendo.common.min.css" rel="stylesheet" type="text/css" />
    <link href="http://api.jmnetworking.org/kendoui/styles/kendo.default.min.css" rel="stylesheet" type="text/css" />
    <script src="http://api.jmnetworking.org/kendoui/js/kendo.web.min.js" type="text/javascript"></script>
    <script src="http://api.jmnetworking.org/js/js.js" type="text/javascript"></script>
    <script src="/js/textualizer.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/script.js"></script>

</head>
<body>
	<header>
		<audio preload autoplay controls  style="float:left;">
			<?php
			$tipos = array ("mp3","audio/ogg");
			$mp3=listarFicheros($tipos, "mp3");
			echo $mp3;
			echo '<source src="mp3/'.$mp3.'" type="audio/ogg" />';
			echo '<source src="mp3/'.$mp3.'" type="audio/mpeg" />';
			?>
			Tu explorador no soporta HTML 5, te recomiendo actualizarlo
		</audio>
		
        <div id="imagen"></div>
	</header>
	
		

	</div>
	<section id="contenedor">
		
	</section>

	<footer>
		<nav>
			<ul class="nav">
				<li><a href="#" id="canton">Cant&oacuten</a></li>
				<!--<li><a href="#">Principios Generales</a>
					<ul>
						<li><a href="#">P.G. Culiacan&nbsp;&nbsp;&rarr;</a>
							<ul>
								<li><a href="#">Vigentes</a></li>
								<li><a href="#">En estudio</a></li>
							</ul>
						</li>
						<li><a href="#">P.G. Nacional</a></li>
					</ul>
				</li>
				<li><a href="#">Archivos</a>
					<ul>
						<li><a href="#">P.G. Culiacan&nbsp;&nbsp;&rarr;</a>
							<ul>
								<li><a href="#">Vigentes</a></li>
								<li><a href="#">En estudio</a></li>
							</ul>
						</li>
						<li><a href="#">P.G. Nacional</a></li>
					</ul>
				</li>-->
				<li><a href="#" id="evento">Eventos</a><!--
					<ul>
						<li><a href="#">P.G. Culiacan&nbsp;&nbsp;&rarr;</a>
							<ul>
								<li><a href="#">Vigentes</a></li>
								<li><a href="#">En estudio</a></li>
							</ul>
						</li>
						<li><a href="#">P.G. Nacional</a></li>
					</ul>
				</li>
				<li><a href="#">Protocolos</a>
					<ul>
						<li><a href="#">P.G. Culiacan&nbsp;&nbsp;&rarr;</a>
							<ul>
								<li><a href="#">Vigentes</a></li>
								<li><a href="#">En estudio</a></li>
							</ul>
						</li>
						<li><a href="#">P.G. Nacional</a></li>
					</ul>
				</li>-->
				<li><a id="PrinGenerales" href=<?php PrinGenerales(); ?> >Objetivos generales</a></li>
				<li><a id="CodEtica" href=<?php CodEtica(); ?> >C&oacutedigo de  &eacutetica</a></li>
				<li><a href="#" id="undo" class="k-button">Tioigo</a></li>
				<li><a href="http://yosoy132culiacan.org.mx/notificaciones/" >soporte</a></li>
			</ul>
		</nav>
	</footer>

<!--<div id="conectar_facebook">
    <a href="javascript:login(); return false;" onclick="login(); return false;">Conectarse a Facebook</a>
  </div>-->
	<!--formularios ocultos-->
	<div id="window">
		<center>
			<form id="email">
				<label>Tu correo</label>
				<input type="email" name="correo" placeholder="pon tu email" title="email" required/><br><br>
				<label>Nombre: </label>
				<input type="text" name="nombre" placeholder="nombre" title="nombre" required/><br><br>
				<label>Asunto</label>
				<input type="text" name="asunto" placeholder="asunto" title="asunto" required/><br><br>
				<label>Comentario o Duda: </label><br>
				<textarea name="descripcion" style="width:100%;height:130px;" placeholder="Duda o Comentario" title="Descripcion" required></textarea>
				<input type="submit" id="enviar" value="enviar">
			</form>
			<center><h1></h1></center>
		</center>
	</div>
	<div id="NOTICIERO" style="width:100%;">
		
	</div>
</body>
</html>
