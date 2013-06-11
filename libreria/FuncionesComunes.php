<?php
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

function MostrarSlider(){
				$ssql="select id_nota,titulo,url,region from  notificaciones ORDER BY id_nota DESC LIMIT 5";
                $rs=mysql_query($ssql);
                while($fila=mysql_fetch_array($rs)){
                	echo '<figure>
                	<li id="'.$fila["id_nota"].'"><img src="/notificaciones/ubpload/'.$fila["url"].'" alt="'.$fila["region"].'">
                  <figcaption>'.$fila["titulo"].'</figcaption>
	                </figure></li>
                  ';
                }
}
function frase(){
      $ssql2="Select * from frase order by id DESC LIMIT 1";
      $rs2=mysql_query($ssql2);
      $cont=0;
      $frase = array();

      while($row = mysql_fetch_assoc($rs2)){
        //echo "'\"".$fila["frase"]."\"'";
        $frase[$cont]= $row['frase'];
        $cont++;
        }
        echo "var list = ['".$frase[0]."', '".$frase[1]."', '".$frase[2]."'];";
}
function minuta(){
      $ssql2="Select * from minuta order by id DESC LIMIT 1";
      $rs2=mysql_query($ssql2);
      while($fila2=mysql_fetch_array($rs2)){
        echo'<a href="/notificaciones/pdf/'.$fila2["minuta"].'" style="padding-top:30px; text-decoration:none;color:#261c34;" alt="'.$fila2["minuta"].'">minuta de Asamble General Pasada</a>';
      }
}
function PrinGenerales(){
      $ssql2="Select * from PrinGenerales order by id DESC LIMIT 1";
      $rs2=mysql_query($ssql2);
      while($fila2=mysql_fetch_array($rs2)){
        echo"\"/notificaciones/principios/".$fila2["nombre"]." \" ";
      }
}
function CodEtica(){
      $ssql2="Select * from CodEtica order by id DESC LIMIT 1";
      $rs2=mysql_query($ssql2);
      while($fila2=mysql_fetch_array($rs2)){
        echo"\"/notificaciones/etica/".$fila2["nombre"]." \" ";
      }
}

function Asamblea(){
    $ssql2="Select * from asamblea order by id DESC LIMIT 1";
    $rs2=mysql_query($ssql2);
      while($fila2=mysql_fetch_array($rs2)){
        echo'
        <li><a href="#">Fecha : '.$fila2["fecha"].'</a></li>
        <li><a href="#">Hora : '.$fila2["hora"].'</a></li>
        <li><a href="#">lugar : '.$fila2["lugar"].'</a>
        <li><a href="#">Puntos a Tratar : '.$fila2["puntos"].'</a></li>
        ';
      }
}

function listarFicheros($tipos, $carpeta){
    //Comprobamos que la carpeta existe
    if (is_dir ($carpeta)){
        //Escaneamos la carpeta usando scandir
        $scanarray = scandir ($carpeta);
        for ($i = 0; $i < count ($scanarray); $i++){
            //Eliminamos  "." and ".." del listado de ficheros
            if ($scanarray[$i] != "." && $scanarray[$i] != ".."){
    //No mostramos los subdirectorios
    if (is_file ($carpeta . "/" . $scanarray[$i])){
                        //Verificamos que la extension se encuentre en $tipos
      $thepath = pathinfo ($carpeta . "/" . $scanarray[$i]);
      if (in_array ($thepath['extension'], $tipos)){
        return $scanarray[$i] . "
";
      }
                }
            }
        }
    } else {
        return "La carpeta no existe";
    }
}

?>