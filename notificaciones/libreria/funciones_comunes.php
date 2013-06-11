<?php
session_start();
/*funciones generales para no repetir codigo*/
//para poner titlo a cada plantilla creando variable global para toda la pagina
function parametro_plantilla($variable){
    if (isset($GLOBALS[$variable])){
        echo $GLOBALS[$variable];
    }else{
        echo "Sin datos cargados",$variable;
    }
}

//conexion ala base de datos
function conectar_baseDatos(){
    $conexion=mysql_connect("localhost","jmnetwor_soporte","13254601");
    mysql_select_db("jmnetwor_132");//seleccionamos la base de datos
    return $conexion;//devuelvo el identificador de la conexion
}

//creo la conexion para todas las paginas
$con=conectar_baseDatos();

//para uatenticar quien entra
function estas_autenticado(){
    //compruebo si existen variables
    if(isset($_SESSION["usuario"]) && isset($_SESSION["password"])){
        //aparte compruebo al usuario en la base de datos
        $ssql="select usuario from usuarios where id_usuario='".$_SESSION["id_usuario"]."' and contrasena='".$_SESSION["password"]."'";
        //si la setencia de buscar al usuario va bien continuamos
        if($rsusuario=mysql_query($ssql)){
            //compruebo que esa setencia me devuelva un usuario
            if(mysql_num_rows($rsusuario)==1){//asi compruebo que hay un solo usuariodevuelto por la ssql
                //compruebo que el usuario que tengo es el mismo que el de la variable de session
                $usuario_encontrado=mysql_fetch_array($rsusuario);
                if($usuario_encontrado["usuario"]==$_SESSION["usuario"]){
                    //si todo va bien el usuario esta autenticado
                    return true;
                }
            }
        }
    }
    return false;
}
//mostrador de errores
function errores(){
    //voy a recibir unos codigos de errores, para mostrar mensajes de error
        if(isset($_GET["errorlogin"])){
            echo "<p class='error'><b style='color:black;'>Error de acceso:</b></br>";
            if($_GET["errorlogin"]=="1"){
                echo "no tengo los datos, favor de proporcionarlos";
            }elseif($_GET["errorlogin"]=="2"){
                echo "usuario o contraseña no pueden estar vacios";
            }elseif($_GET["errorlogin"]=="3"){
                echo "hubo un error en la base de datos";
            }elseif($_GET["errorlogin"]=="4"){
                echo "no existe usuario con esa contraseña";
            }elseif($_GET["errorlogin"]=="5"){
                echo "la contraseña no corresponde con el usuario";
            }else{
                echo "error desconocido";
            }
        }
}
//pantalla inicial
function Mostrar(){
    echo '<div id="AgrupadorMostrar">';
    echo '<div id="AgrupadorOcultar">';
     $ssql="select * from  notificaciones ORDER BY id_nota DESC LIMIT 10";
                $rs=mysql_query($ssql);
                while($fila=mysql_fetch_array($rs)){
		$contador=$fila["id_nota"];
	    echo '<div id="Numero'.$contador.'">';
        echo '<article class="Despliege">';
	    echo '<div id="cargando'.$contador.'" style="display:none; color: green;"><img src="imagenes/iconos/cargar.gif"></div>';
	    echo '<div class="Despliege'.$contador.'">';
		    echo '<div class="article"><p>'.$fila["fecha"].'</p></div>';
            echo '<div class="article"><p>'.$fila["titulo"].'</p></div>';
		    echo '<div class="article"><p>'.$fila["nota"].'</p></div>';
                    echo '<div class="mp4"><p><a title="view" onClick="view('.$contador.')"></a></p></div>';
                    echo '<div class="Link"><p>'.$fila["region"].'</p></div>';
                    echo '<div class="editar"><p><button id="editar" title="editar" onClick="editar('.$contador.')"></button></p></div>';
                    echo '<div class="borrar"><p><button id="borrar" title="borrar" onClick="borrar('.$contador.')"></button></p></div>';
            echo "</div></article></div>";
	    include("libreria/formularioEditar.html");
                } mysql_free_result($rs);//para liberar memoria de lo que habia en rs el acceso ala tabla
	    echo "</div></div>";
}









//mostrar el usuario logeado
function mostrar_usuario($texto_mostrar="Bienvenido:"){
    if(estas_autenticado()){
        global $raiz;
        echo '<div class="muestrousuario">';
        echo /*'<img src="'.$raiz.'imagenes/fotoUsuario.png" width=62 heigth=52>'.*/$texto_mostrar.'&nbsp<b>'.$_SESSION["usuario"].'</b>&nbsp|&nbsp<a href="'.$raiz.'salir.php">cerrar session</a>';
        echo "</div>";
    }
}







class validarUpload{ 
         
    public $extensiones = 'gif|jpg|png'; 

    protected function imagen($archivo,$extension){ 
        $imagenes = array('bmp','gif','jpg','png'); 

        foreach($imagenes as $ext){ 
            if($extension==$ext){ 
                if(getimagesize($archivo)==false){ 
                    $resultado = false; 
                }else{ 
                    $resultado = true; 
                } 
            }else{ 
                $resultado = true; 
            } 
        } 
        return $resultado; 
    } 
     
    public function formato($tipo){ 
        $tipos = array( 
            'image/jpeg' => 'jpg', 
            'image/jpg' => 'jpg', 
            'image/pjpeg' => 'jpg', 
            'image/gif' => 'gif', 
            'image/png'    => 'png', 
            'application/vnd.openxmlformats-officedocument.word' => 'docx', 
            'application/msword' => 'doc', 
            'application/vnd.openxmlformats-officedocument.pres' => 'pptx', 
            'application/vnd.ms-powerpoint' => 'ppt', 
            'application/pdf' => 'pdf', 
            'text/plain' => 'txt', 
            'video/mpeg' => 'mpeg' 
        ); 
        foreach($tipos as $mime=>$formato){ 
            if($mime==$tipo){ 
                return $formato; 
            } 
        } 
    } 
     
    public function validar($archivo){ 
        $tipo = $_FILES[$archivo]['type']; 
        $extension = explode('|',$this->extensiones); 
        $generarNombre = time().md5(uniqid(rand())); 
        $archivoFormato = $this->formato($tipo); 
        $imagen = $this->imagen($_FILES[$archivo]['tmp_name'],$archivoFormato); 
         
        if($imagen==true){ 
            foreach($extension as $ext){ 
                if($archivoFormato==$ext){ 
                    $resultado = true; 
                } 
            } 
             
            if($resultado==true){ 
                return $generarNombre.'.'.$archivoFormato; 
            }else{ 
                return false; 
            } 
        }else{ 
            return false; 
        } 
    } 
     
}
?>