<?
	$raiz="./";//desde la raiz
	include_once($raiz."/FuncionesComunes.php");
 $ssql= "insert into suscriptores(email,nombre) values('".$_POST["correo"]."','".$_POST["nombre"]."')";//setencia sql para insertar datos en la table
 if(mysql_query($ssql)){

                    
					$destinatario = "tioigo@yosoy132culiacan.org.mx"; 
					$asunto = $_POST["asunto"]; 
					$cuerpo = ' 
					<html> 
					<head> 
					   <title>Prueba de correo titulo</title>
					</head> 
					<body> 
					<h1>Hola amigos!</h1> 
					<p> correo: '.$_POST["correo"].'<br> descripcion: '.$_POST["descripcion"].'
					.
					</p> 
					</body> 
					</html> 
					'; 
					//para el envío en formato HTML 
					$headers = "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

					//dirección del remitente 
					$headers .= 'From: #Seguidores yosoy132Culiacan <'.$_POST["correo"].'>\r\n'; 

					//dirección de respuesta, si queremos que sea distinta que la del remitente 
					//$headers .= "Reply-To: jesus_ed13@hotmail.com\r\n"; //copia

					//ruta del mensaje desde origen a destino 
					//$headers .= "Return-path: holahola@desarrolloweb1.com\r\n"; 

					//direcciones que recibián copia 
					//$headers .= "Cc: jesus_ed13@hotmail.com\r\n"; 

					//direcciones que recibirán copia oculta 
					//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 

					if(mail($destinatario,$asunto,$cuerpo,$headers) ){
						echo "email enviado con exito";
						}else{
					    echo"fallo el envio del mail";
					}
}
?>