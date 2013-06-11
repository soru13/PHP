<?php
$raiz="./";//desde la raiz
include_once($raiz."/funciones_comunes.php");
sleep(1);
// Hacemos una condicion en la que solo permitiremos que se suban imagenes y que sean menores a 20 KB
    if (($_FILES["ubpload"]["type"] == "image/gif") || ($_FILES["ubpload"]["type"] == "image/jpeg") || ($_FILES["ubpload"]["type"] == "image/png") || ($_FILES["ubpload"]["type"] == "image/pjpeg")) {
  
          //Si es que hubo un error en la subida, mostrarlo, de la variable $_FILES podemos extraer el valor de [error], que almacena un valor booleano (1 o 0).
            if ($_FILES["ubpload"]["error"] > 0) { 
              echo $_FILES["ubpload"]["error"] . ""; 
            } else { 
              // Si no hubo ningun error, hacemos otra condicion para asegurarnos que el archivo no sea repetido 
              if (file_exists("/home/jmnetwor/public_html/yosoy132culiacan.org.mx/notificaciones/ubpload/" . $_FILES["ubpload"]["name"])) { 
                echo $_FILES["ubpload"]["name"] . " ya existe. "; 
              } else { 

                                      // Si no es un archivo repetido y no hubo ningun error, procedemos a subir a la carpeta /archivos, seguido de eso mostramos la imagen subida
                                     move_uploaded_file($_FILES["ubpload"]["tmp_name"],"/home/jmnetwor/public_html/yosoy132culiacan.org.mx/notificaciones/ubpload/".$_FILES["ubpload"]["name"]);


                              $ssql= "insert into notificaciones(fecha,titulo,nota,region,url) values('".date("y/m/d H:i:s")."','".$_POST["titulo"]."','".$_POST["nota"]."','".$_POST["region"]."','".$_FILES["ubpload"]["name"]."')";//setencia sql para insertar datos en la table
                              if(mysql_query($ssql)){
                                      $ssql2="Select * from notificaciones order by id_nota DESC LIMIT 1";
                                        $rs2=mysql_query($ssql2);
                                        while($fila=mysql_fetch_array($rs2)){
                                          echo '<div class="article"><p>'.$fila["fecha"].'</p></div>';
                                          echo '<div class="article"><p>'.$fila["titulo"].'</p></div>';
                                          echo '<div class="article"><p>'.$fila["nota"].'</p></div>';
                                          echo '<div class="article"><p>'.$fila["region"].'</p></div>';
                                      } mysql_free_result($rs2);//para liberar memoria de lo que habia en rs el acceso ala tabla
                              }else{
                                 echo "hubo un error al insertar los datos" . mysql_error();//mysql_error para ver el error que eme tira si e escrito mal la setencia de inserccion
                              }
              } 
            } 
    }elseif ($_FILES["pdf"]["type"]=="application/pdf") {
            //Si es que hubo un error en la subida, mostrarlo, de la variable $_FILES podemos extraer el valor de [error], que almacena un valor booleano (1 o 0).
            if ($_FILES["pdf"]["error"] > 0) {
              echo $_FILES["pdf"]["error"] . "";
            } else {
              // Si no hubo ningun error, hacemos otra condicion para asegurarnos que el archivo no sea repetido
              if (file_exists("/home/jmnetwor/public_html/yosoy132culiacan.org.mx/notificaciones/pdf/" . $_FILES["pdf"]["name"])) {
                echo $_FILES["pdf"]["name"] . " ya existe. ";
              } else {
               // Si no es un archivo repetido y no hubo ningun error, procedemos a subir a la carpeta /archivos, seguido de eso mostramos la imagen subida
                if (is_uploaded_file($_FILES["pdf"]["tmp_name"])) 
                { 
                    $ssql= "insert into minuta(minuta) values('".$_FILES["pdf"]["name"]."')";//setencia sql para insertar datos en la table
                    if(mysql_query($ssql)){
                        move_uploaded_file($_FILES["pdf"]["tmp_name"],"/home/jmnetwor/public_html/yosoy132culiacan.org.mx/notificaciones/pdf/".$_FILES["pdf"]["name"]); 
                      }
                }else{
                  echo "error al subir";
                }
                header("Location: http://yosoy132culiacan.org.mx/notificaciones/admin.php");
              }
            }
    }elseif ($_POST["frase"]) {
        $ssql= "insert into frase(fecha,frase) values('".date("y/m/d H:i:s")."','".$_POST["frase"]."')";//setencia sql para insertar datos en la table
                    if(mysql_query($ssql)){
                        echo "Se Guardo con Exito";
                    }
    }elseif ($_POST["fecha"]) {
        $ssql= "insert into asamblea(fecha,hora,lugar,puntos) values('".$_POST["fecha"]."','".$_POST["hora"]."','".$_POST["lugar"]."','".$_POST["puntos"]."')";//setencia sql para insertar datos en la table
                    if(mysql_query($ssql)){
                        echo "Se Guardo con Exito";
                    }
    }elseif ($_FILES["principios"]["type"]=="application/pdf") {
            //Si es que hubo un error en la subida, mostrarlo, de la variable $_FILES podemos extraer el valor de [error], que almacena un valor booleano (1 o 0).
            if ($_FILES["principios"]["error"] > 0) {
              echo $_FILES["principios"]["error"] . "";
            } else {
              // Si no hubo ningun error, hacemos otra condicion para asegurarnos que el archivo no sea repetido
              if (file_exists("/home/jmnetwor/public_html/yosoy132culiacan.org.mx/notificaciones/principios/" . $_FILES["principios"]["name"])) {
                echo $_FILES["principios"]["name"] . " ya existe. ";
              } else {
               // Si no es un archivo repetido y no hubo ningun error, procedemos a subir a la carpeta /archivos, seguido de eso mostramos la imagen subida
                if (is_uploaded_file($_FILES["principios"]["tmp_name"])) 
                { 
                    $ssql= "insert into PrinGenerales(nombre) values('".$_FILES["principios"]["name"]."')";//setencia sql para insertar datos en la table
                    if(mysql_query($ssql)){
                        move_uploaded_file($_FILES["principios"]["tmp_name"],"/home/jmnetwor/public_html/yosoy132culiacan.org.mx/notificaciones/principios/".$_FILES["principios"]["name"]); 
                      }
                }else{
                  echo "error al subir";
                }
                header("Location: http://yosoy132culiacan.org.mx/notificaciones/admin.php");
              }
            }
    }elseif ($_FILES["etica"]["type"]=="application/pdf") {
            //Si es que hubo un error en la subida, mostrarlo, de la variable $_FILES podemos extraer el valor de [error], que almacena un valor booleano (1 o 0).
            if ($_FILES["etica"]["error"] > 0) {
              echo $_FILES["etica"]["error"] . "";
            } else {
              // Si no hubo ningun error, hacemos otra condicion para asegurarnos que el archivo no sea repetido
              if (file_exists("/home/jmnetwor/public_html/yosoy132culiacan.org.mx/notificaciones/etica/" . $_FILES["etica"]["name"])) {
                echo $_FILES["etica"]["name"] . " ya existe. ";
              } else {
               // Si no es un archivo repetido y no hubo ningun error, procedemos a subir a la carpeta /archivos, seguido de eso mostramos la imagen subida
                if (is_uploaded_file($_FILES["etica"]["tmp_name"])) 
                { 
                    $ssql= "insert into CodEtica(nombre) values('".$_FILES["etica"]["name"]."')";//setencia sql para insertar datos en la table
                    if(mysql_query($ssql)){
                        move_uploaded_file($_FILES["etica"]["tmp_name"],"/home/jmnetwor/public_html/yosoy132culiacan.org.mx/notificaciones/etica/".$_FILES["etica"]["name"]); 
                      }
                }else{
                  echo "error al subir";
                }
                header("Location: http://yosoy132culiacan.org.mx/notificaciones/admin.php");
              }
            }
    }
    else { 
            // Si el usuario intenta subir algo que no es una imagen o una imagen que pesa mas de 20 KB mostramos este mensaje
            echo "Archivo no permitido que debo hacer";
    } 



    




  








    
?>