<?php
sleep(2);
include_once("funciones_comunes.php");
if (!$_POST){
    echo "no estoy recibiendo nada del formulario";
}else{
    $id=$_GET["IdNota"];
    $ssql= "UPDATE  sistemas SET  Ubicacion='".$_POST["Ubicacion"]."',Nombre='".$_POST["Nombre"]."',MAC_Address='".$_POST["MAC_Address"]."',Modelo='".$_POST["Modelo"]."',Numero_de_Serie='".$_POST["Numero_de_Serie"]."',Ultima_Fecha_Mantenimiento='".$_POST["Ultima_Fecha_Mantenimiento"]."',Acceso_a_Internet='".$_POST["Acceso_a_Internet"]."',financiero='".$_POST["financiero"]."',sigho='".$_POST["sigho"]."',imagenologia='".$_POST["imagenologia"]."',farmacia='".$_POST["farmacia"]."',cajas='".$_POST["cajas"]."',cobranza='".$_POST["cobranza"]."',comercializacion='".$_POST["comercializacion"]."',sistema_cirugia='".$_POST["sistema_cirugia"]."',sistema_cocina='".$_POST["sistema_cocina"]."',sistema_checador='".$_POST["sistema_checador"]."',sistema_web='".$_POST["sistema_web"]."',sistema_layout='".$_POST["sistema_layout"]."',Status='".$_POST["Status"]."',Observaciones='".$_POST["Observaciones"]."' WHERE 	id_sistemas=$id";//setencia sql para insertar datos en la table
                    if(mysql_query($ssql)){
                      $ssql="select * from sistemas WHERE id_sistemas =$id";
                      $rs=mysql_query($ssql);
                      while($fila=mysql_fetch_array($rs)){
                        $contador=$fila["id_sistemas"];
                        echo '<div id="Numero'.$contador.'">';
                        echo '<div class="Despliege">';
                        echo '<div id="cargando'.$contador.'" style="display:none; color: green;"><img src="imagenes/iconos/cargar.gif"></div>';
                        echo '<div class="Despliege'.$contador.'">';
                                echo '<div class="article"><p>'.$fila["Direccion_IP"].'</p></div>';
                                echo '<div class="article"><p>'.$fila["Nombre"].'</p></div>';
                                echo '<div class="article"><p>'.$fila["Ubicacion"].'</p></div>';
                                echo '<div class="mp4"><p><img src="imagenes/iconos/mp4.png"></p></div>';
                                echo '<div class="Link"><p><img src="imagenes/iconos/link.png"></p></div>';
                                echo '<div class="editar"><p><button id="editar" title="editar" onClick="editar('.$contador.')"></button></p></div>';
                                echo '<div class="borrar"><p><button id="borrar" title="borrar" onClick="borrar('.$contador.')"></button></p></div>';
                        echo "</div></div></div>";
                        include("/formularioEditar.html");
                            } mysql_free_result($rs);//para liberar memoria de lo que habia en rs el acceso ala tabla
                    }else{
                       echo "<p>hubo un error al insertar los datos</p>" . mysql_error();//mysql_error para ver el error que eme tira si e escrito mal la setencia de inserccion
                    }  
}
?>