<?php 
include_once("funciones_comunes.php");
//DEBO PREPARAR LOS TEXTOS QUE VOY A BUSCAR si la cadena existe
if(         isset($_POST["busqueda"])  ||  (isset($_POST["de"]) && isset($_POST["a"])) || isset($_GET["id"])           ){
    $de=$_POST["de"];
    $a=$_POST["a"];
    $id=$_GET["id"];
    /**---------------------buscador con select option---------------------------*/
    if ($id==1){
         $ssql="select * from sistemas ORDER BY id_sistemas DESC LIMIT 10";
        $rs=mysql_query($ssql);
                            While($fila=mysql_fetch_array($rs)) 
                            { 
                                $contador=$fila["id_sistemas"];
                                    echo '<div id="AgrupadorOcultar">';
                                    echo '<div id="Numero'.$contador.'">';
                                    echo '<div class="Despliege">';
                                    echo '<div id="cargando'.$contador.'" style="display:none; color: green;"><img src="imagenes/iconos/cargar.gif"></div>';
                                    echo '<div class="Despliege'.$contador.'">';
                                            echo '<div class="article"><p>'.$fila["Direccion_IP"].'</p></div>';
                                            echo '<div class="article"><p>'.$fila["Nombre"].'</p></div>';
                                            echo '<div class="article"><p>'.$fila["Ubicacion"].'</p></div>';
                                            echo '<div class="mp4"><p><a title="view" onClick="view('.$contador.')"></a></p></div>';
                                            echo '<div class="Link"><p><img src="imagenes/iconos/link.png"></p></div>';
                                            echo '<div class="editar"><p><button id="editar" title="editar" onClick="editar('.$contador.')"></button></p></div>';
                                            echo '<div class="borrar"><p><button id="borrar" title="borrar" onClick="borrar('.$contador.')"></button></p></div>';
                                    echo "</div></div></div></div>";
                                    include("/formularioEditar.html");
                            } mysql_free_result($rs);//para liberar memoria de lo que habia en rs el acceso ala tabla
    }elseif($id==2){
         $ssql="select * from sistemas ORDER BY id_sistemas ASC LIMIT 10";
         $rs=mysql_query($ssql);
                            While($fila=mysql_fetch_array($rs)) 
                            { 
                                $contador=$fila["id_sistemas"];
                                    echo '<div id="AgrupadorOcultar">';
                                    echo '<div id="Numero'.$contador.'">';
                                    echo '<div class="Despliege">';
                                    echo '<div id="cargando'.$contador.'" style="display:none; color: green;"><img src="imagenes/iconos/cargar.gif"></div>';
                                    echo '<div class="Despliege'.$contador.'">';
                                            echo '<div class="article"><p>'.$fila["Direccion_IP"].'</p></div>';
                                            echo '<div class="article"><p>'.$fila["Nombre"].'</p></div>';
                                            echo '<div class="article"><p>'.$fila["Ubicacion"].'</p></div>';
                                            echo '<div class="mp4"><p><a title="view" onClick="view('.$contador.')"></a></p></div>';
                                            echo '<div class="Link"><p><img src="imagenes/iconos/link.png"></p></div>';
                                            echo '<div class="editar"><p><button id="editar" title="editar" onClick="editar('.$contador.')"></button></p></div>';
                                            echo '<div class="borrar"><p><button id="borrar" title="borrar" onClick="borrar('.$contador.')"></button></p></div>';
                                    echo "</div></div></div></div>";
                                    include("/formularioEditar.html");
                            } mysql_free_result($rs);//para liberar memoria de lo que habia en rs el acceso ala tabla
    }elseif($id==3){
         $ssql="select * from sistemas ORDER BY id_sistemas  DESC";
         $rs=mysql_query($ssql);
                            While($fila=mysql_fetch_array($rs)) 
                            { 
                                $contador=$fila["id_sistemas"];
                                    echo '<div id="AgrupadorOcultar">';
                                    echo '<div id="Numero'.$contador.'">';
                                    echo '<div class="Despliege">';
                                    echo '<div id="cargando'.$contador.'" style="display:none; color: green;"><img src="imagenes/iconos/cargar.gif"></div>';
                                    echo '<div class="Despliege'.$contador.'">';
                                            echo '<div class="article"><p>'.$fila["Direccion_IP"].'</p></div>';
                                            echo '<div class="article"><p>'.$fila["Nombre"].'</p></div>';
                                            echo '<div class="article"><p>'.$fila["Ubicacion"].'</p></div>';
                                            echo '<div class="mp4"><p><a title="view" onClick="view('.$contador.')"></a></p></div>';
                                            echo '<div class="Link"><p><img src="imagenes/iconos/link.png"></p></div>';
                                            echo '<div class="editar"><p><button id="editar" title="editar" onClick="editar('.$contador.')"></button></p></div>';
                                            echo '<div class="borrar"><p><button id="borrar" title="borrar" onClick="borrar('.$contador.')"></button></p></div>';
                                    echo "</div></div></div></div>";
                                    include("/formularioEditar.html");
                            } mysql_free_result($rs);//para liberar memoria de lo que habia en rs el acceso ala tabla
    }
    
                                /**---------------------buscador con rango---------------------------*/
    
    
    
    
    $ssql="Select * from sistemas where Ultima_Fecha_Mantenimiento BETWEEN '$de' AND '$a'";
     $rs=mysql_query($ssql);
                            While($fila=mysql_fetch_array($rs)) 
                            { 
                                $contador=$fila["id_sistemas"];
                                    echo '<div id="AgrupadorOcultar">';
                                    echo '<div id="Numero'.$contador.'">';
                                    echo '<div class="Despliege">';
                                    echo '<div id="cargando'.$contador.'" style="display:none; color: green;"><img src="imagenes/iconos/cargar.gif"></div>';
                                    echo '<div class="Despliege'.$contador.'">';
                                            echo '<div class="article"><p>'.$fila["Direccion_IP"].'</p></div>';
                                            echo '<div class="article"><p>'.$fila["Nombre"].'</p></div>';
                                            echo '<div class="article"><p>'.$fila["Ubicacion"].'</p></div>';
                                            echo '<div class="mp4"><p><a title="view" onClick="view('.$contador.')"></a></p></div>';
                                            echo '<div class="Link"><p><img src="imagenes/iconos/link.png"></p></div>';
                                            echo '<div class="editar"><p><button id="editar" title="editar" onClick="editar('.$contador.')"></button></p></div>';
                                            echo '<div class="borrar"><p><button id="borrar" title="borrar" onClick="borrar('.$contador.')"></button></p></div>';
                                    echo "</div></div></div></div>";
                                    include("/formularioEditar.html");
                            } mysql_free_result($rs);//para liberar memoria de lo que habia en rs el acceso ala tabla
                            
                            /**---------------------buscador con like o fulltex---------------------------*/
    $busqueda=$_POST["busqueda"];
            if ($busqueda<>''){
               //CUENTA EL NUMERO DE PALABRAS 
               $trozos=explode(" ",$busqueda); 
               $numero=count($trozos); 
              if ($numero==1) { 
               //SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE 
               $cadbusca="SELECT  * FROM sistemas WHERE Ubicacion LIKE '%$busqueda%' OR Nombre LIKE '%$busqueda%' OR Direccion_IP LIKE '%$busqueda%' OR Ultima_Fecha_Mantenimiento LIKE '%$busqueda%' LIMIT 10" ;
               
              } elseif ($numero>1) { 
              //SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST 
              //busqueda de frases con mas de una palabra y un algoritmo especializado
              $cadbusca="SELECT *, MATCH(Ubicacion, Nombre, MAC_Address, Modelo, Numero_de_Serie, Observaciones) AGAINST ( '$busqueda' ) AS Score FROM sistemas WHERE MATCH(Ubicacion, Nombre, MAC_Address, Modelo, Numero_de_Serie, Observaciones) AGAINST ( '$busqueda' ) ORDER BY Score DESC LIMIT 50";
              
              }
                            $result=mysql_query($cadbusca);
                            While($fila=mysql_fetch_array($result)) 
                            { 
                                   $contador=$fila["id_sistemas"];
                                    echo '<div id="AgrupadorOcultar">';
                                    echo '<div id="Numero'.$contador.'">';
                                    echo '<div class="Despliege">';
                                    echo '<div id="cargando'.$contador.'" style="display:none; color: green;"><img src="imagenes/iconos/cargar.gif"></div>';
                                    echo '<div class="Despliege'.$contador.'">';
                                            echo '<div class="article"><p>'.$fila["Direccion_IP"].'</p></div>';
                                            echo '<div class="article"><p>'.$fila["Nombre"].'</p></div>';
                                            echo '<div class="article"><p>'.$fila["Ubicacion"].'</p></div>';
                                            echo '<div class="mp4"><p><a title="view" onClick="view('.$contador.')"></a></p></div>';
                                            echo '<div class="Link"><p><img src="imagenes/iconos/link.png"></p></div>';
                                            echo '<div class="editar"><p><button id="editar" title="editar" onClick="editar('.$contador.')"></button></p></div>';
                                            echo '<div class="borrar"><p><button id="borrar" title="borrar" onClick="borrar('.$contador.')"></button></p></div>';
                                    echo "</div></div></div></div>";
                                    include("/formularioEditar.html");
                            } mysql_free_result($result);//para liberar memoria de lo que habia en rs el acceso ala tabla
            }
}
?>