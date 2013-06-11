<?php
$raiz="./";//desde la raiz
include_once($raiz."/funciones_comunes.php");

if(isset($_FILES['ubpload'])){ 
    $validarUpload = new validarUpload(); 
    $validarUpload->extensiones = 'pdf|jpg|png|doc'; 
    $archivo = $validarUpload->validar('ubpload'); 
     
    if($archivo==false){ 
        echo 'El archivo no es valido.'; 
    }else{ 
          $directorio = '/home/jmnetwor/public_html/yosoy132culiacan.org.mx/notificaciones/ubpload/'; 
          $guardar = $directorio . $archivo; 
          if(copy($_FILES['ubpload']['tmp_name'], $guardar)) { 
              echo 'El archivo se subio correctamente.'; 
          }else{ 
              echo 'Error al subir el archivo.';
          } 
    } 
    exit; 
}     
?>