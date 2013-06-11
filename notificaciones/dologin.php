<?php
$raiz="./";
include_once($raiz."libreria/funciones_comunes.php");
//en esta pagina se realiza el login del usuario

//valido los datos del login
if(!isset($_POST["usuario"]) || !isset($_POST["password"])){
    header("Location: index.php?errorlogin=1");
}elseif($_POST["usuario"]=="" || $_POST["password"]==""){
    header("Location: index.php?errorlogin=2");
}else{
    //si usuario y contraseña existen y pasaron la vadilacion, procedo a buscarlos en la base de datos
    $ssql="select * from usuarios where usuario='".$_POST["usuario"]."'";
    
    if(!$rsusuario=mysql_query($ssql)){
        header("Location: index.php?errorlogin=3");
    }else{
        //es que la setencia ssql rsusuario se creo
        if(mysql_num_rows($rsusuario)!=1){//arreglo que hace un recorrido para validar que no hayga un identificador 0
            header("Location: index.php?errorlogin=4");
        }else{
            //si estoy aqui es porque hay un usuario en la base de datos
            $usuario_encontrado=mysql_fetch_array($rsusuario);
            if($usuario_encontrado["contrasena"]!=$_POST["password"]){
                header("Location: index.php?errorlogin=5");
            }else{
                //es que la contraseña corresponde al usuario
                //continuo el login
                $_SESSION["usuario"]=$_POST["usuario"];
                $_SESSION["password"]=$_POST["password"];
                $_SESSION["id_usuario"]=$usuario_encontrado["id_usuario"];
                header("Location: admin.php");
            }
            
        }
    }
}
?>