<?php
$raiz="./";//desde la raiz
include_once($raiz."funciones_comunes.php");
echo $id=$_POST['IdNota'];
     $ssql="select * from  sistemas WHERE id_sistemas=$id";
     echo $ssql;
                $rs=mysql_query($ssql);
                while($fila=mysql_fetch_array($rs)){
                    echo 'ubicacion&nbsp'.$fila["Ubicacion"];
                    echo '<br>nombre&nbsp'.$fila["Nombre"];
                    echo 'Direccion_IP&nbsp'.$fila["Direccion_IP"];
                    echo '<br>MAC_Address&nbsp'.$fila["MAC_Address"];
                    echo 'Modelo&nbsp'.$fila["Modelo"];
                    echo '<br>Numero_de_Serie&nbsp'.$fila["Numero_de_Serie"];
                    echo 'Ultima_Fecha_Mantenimiento&nbsp'.$fila["Ultima_Fecha_Mantenimiento"];
                    echo '<br>Acceso_a_Internet&nbsp'.$fila["Acceso_a_Internet"];
       
                    /*programas instalados*/
                    echo '<fieldset style="border:1px solid#F00; float:left; width:590px;"><legend><b>Sistemas Instalados</b></legend>';
                            echo '<br>financiero&nbsp';if($fila["financiero"]!= NULL){
                                echo $fila["financiero"];
                            }else{echo "No Instalado";}
                            
                            echo '<br>cobranza&nbsp';if($fila["cobranza"]!= NULL){
                                echo $fila["cobranza"];
                            }else{echo "No Instalado";}
                            
                            echo '<br>sigho&nbsp';if($fila["sigho"]!= NULL){
                                echo $fila["sigho"];
                            }else{echo "No Instalado";}
                            
                            echo '<br>imagenologia&nbsp';if($fila["imagenologia"]!= NULL){
                                echo $fila["imagenologia"];
                            }else{echo "No Instalado";}
                            
                            echo '<br>farmacia&nbsp';if($fila["farmacia"]!= NULL){
                                echo $fila["farmacia"];
                            }else{echo "No Instalado";}
                            
                            echo '<br>cajas&nbsp';if($fila["cajas"]!= NULL){
                                echo $fila["cajas"];
                            }else{echo "No Instalado";}
                            
                            echo '<br>cobranza&nbsp';if($fila["cobranza"]!= NULL){
                                echo $fila["cobranza"];
                            }else{echo "No Instalado";}
                            
                            echo '<br>comercializacion&nbsp';if($fila["comercializacion"]!= NULL){
                                echo $fila["comercializacion"];
                            }else{echo "No Instalado";}
                            
                            echo '<br>sistema_cirugia&nbsp';if($fila["sistema_cirugia"]!= NULL){
                                echo $fila["sistema_cirugia"];
                            }else{echo "No Instalado";}
                            
                            echo '<br>sistema_cocina&nbsp';if($fila["sistema_cocina"]!= NULL){
                                echo $fila["sistema_cocina"];
                            }else{echo "No Instalado";}
                            
                            echo '<br>sistema_checador&nbsp';if($fila["sistema_checador"]!= NULL){
                                echo $fila["sistema_checador"];
                            }else{echo "No Instalado";}
                            
                            echo '<br>sistema_web&nbsp';if($fila["sistema_web"]!= NULL){
                                echo $fila["sistema_web"];
                            }else{echo "No Instalado";}
                            
                            echo '<br>sistema_layout&nbsp';if($fila["sistema_layout"]!= NULL){
                                echo $fila["sistema_layout"];
                            }else{echo "No Instalado";}
                    
                    echo '</fieldset>';
                    echo '<br>Status&nbsp'.$fila["Status"];
                    echo 'sigho'.$fila["sigho"];
                    echo '<br>Observaciones&nbsp'.$fila["Observaciones"];
                     
                }
?>