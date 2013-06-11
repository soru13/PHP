<?php
$raiz="./";//desde la raiz
include_once($raiz."libreria/funciones_comunes.php");
$titulo_pagina="Administrador";
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php parametro_plantilla("titulo_pagina"); ?></title>
    <meta name="Description" content="<?php parametro_plantilla('Description');?>">
    <meta name="Keywords" content="<?php parametro_plantilla('Keywords');?>">
    <link rel="stylesheet" href="cs3.css"/>
    <!--Jquery-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script><!--JQuery-->
    <!--Jquery  UI -->
    <script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>

 	<!--Then paste the following for Kendo UI Web scripts-->
	<link href="http://api.jmnetworking.org/kendoui/styles/kendo.common.min.css" rel="stylesheet" type="text/css" />
    <link href="http://api.jmnetworking.org/kendoui/styles/kendo.default.min.css" rel="stylesheet" type="text/css" />
    <script src="http://api.jmnetworking.org/kendoui/js/kendo.web.min.js" type="text/javascript"></script>
    <script src="http://api.jmnetworking.org/js/js.js" type="text/javascript"></script>

    <script language="javascript">
	    function borrar(id){
		var variableid=id;
		$("#cargando"+variableid).css("display", "inline");
		$(".Despliege"+variableid).css("display","none");
		$(".Despliege"+variableid).load("libreria/eliminar.php",{IdNota:id}, function(){
		    $("#cargando"+variableid).css("display", "none");
		    $("#Numero"+variableid).css("display","none");
		});
		//eliminamos via ajax
	    }
	    function view(id){
		$("#viewmostrador").dialog({
		    modal: false,// para quitar el fondo negro y poder navegar con los dos
			    //title: "Caja con opciones",
			    width: 700,
			    minWidth: 700,
			    maxWidth: 700,	   
		})
		$("#viewmostrador").load("libreria/view.php",{IdNota:id},function(){
		    });
	    }
	    function editar(id){
		var variableid=id;
		    $("#formulario"+variableid).dialog({
			    modal: false,// para quitar el fondo negro y poder navegar con los dos
			    //title: "Caja con opciones",
			    width: 530,
			    minWidth: 300,
			    maxWidth: 300,
			    height:380,
			    show: "fold",
			    hide: "slow",
			    resizable: false,
		    });
		    $('#form'+variableid).css("display","block");
		    $(".Exito"+variableid).css("display", "none");
		    $("#form"+variableid).submit(function(){
			   var cadena = $(this).serialize();
			   alert(cadena);
			   $(".cargandoEditar"+variableid).css("display", "inline");
			   $('#form'+variableid).css("display","none");
			     $.ajax({
				    type: "POST",
				    url: "libreria/editar.php?IdNota="+variableid,
				    data: cadena,
				    success: function(datos) {
					$(".Despliege"+variableid).html(datos);
						$(".cargandoEditar"+variableid).css("display", "none");
						$(".Exito"+variableid).css("display", "block");
				    }	  
			    });
			     return false;
		    });
		    
		    $(".response"+variableid).css("color","red");
	    }
    $(document).ready(function(){//cuando este lisata lapagina ejecuta el codigo jquery


    		$("#minuta").bind("click", function(e){
    			$("#4").css("display", "none");
				$("#2").css("display", "none");
				$("#3").css("display", "none");
				$("#5").css("display", "none");
    			$("#formminuta").submit(function(){
				    var cadena = $(this).serialize();
				    $.ajax({
				    	 	async:true,
		        			beforeSend: function(){
		        				$("form").hide();
				     			$(".cargando").fadeIn("slow");},//Permite llamar una función antes de mandar el objeto ajax
						    type: "POST",
						    url: "libreria/insertar.php",
						    data: cadena,
						    success: function(datos){
						    	       	$(".cargando").hide();
						    	       	$("#mensaje").text(datos).fadeOut(3000);
						    	       	$('#formminuta')[0].reset();
						    	       	$("#1").css("display", "none");
						    },
				    });
				    return true;
				});
			   if ($("#1").css("display")!="none")
			      $("#1").css("display", "none");
			   else
			      $("#1").css("display", "block");

			});

			$("#frase").bind("click", function(e){
				$("#1").css("display", "none");
				$("#4").css("display", "none");
				$("#3").css("display", "none");
				$("#5").css("display", "none");
				$("form").submit(function(){
				    var cadena = $(this).serialize();
				    $.ajax({
				    	 	async:true,
		        			beforeSend: function(){
		        				$("form").hide();
				     			$(".cargando").fadeIn("slow");},//Permite llamar una función antes de mandar el objeto ajax
						    type: "POST",
						    url: "libreria/insertar.php",
						    data: cadena,
						    success: function(datos){
						    	       	$(".cargando").hide();
						    	       	$("#mensaje").text(datos).fadeOut(3000);
										$("form").limpiaForm();
										$("#2").css("display", "none");
							},
				    });
				    return false;
				});
			   if ($("#2").css("display")!="none")
			      $("#2").css("display", "none");
			   else
			      $("#2").css("display", "block");
			});
			$("#Asamblea").bind("click", function(e){
				$("#1").css("display", "none");
				$("#2").css("display", "none");
				$("#4").css("display", "none");
				$("#5").css("display", "none");
				$("#fecha").datepicker({dateFormat: 'yy-mm-dd'});
				$("#formmAsamGenr").submit(function(){
					 var cadena = $(this).serialize();
					 alert(cadena);
					$.ajax({
				    	 	async:true,
		        			beforeSend: function(){
		        				$("form").hide();
				     			$(".cargando").fadeIn("slow");},//Permite llamar una función antes de mandar el objeto ajax
						    type: "POST",
						    url: "libreria/insertar.php",
						    data: cadena,
						    success: function(datos){
						    	       	$(".cargando").hide();
										$("#mensaje").text(datos).fadeOut(3000);
										$("form").limpiaForm();
										$('#formmAsamGenr')[0].reset();
										$("#3").css("display", "none");
						    },
				    });
				    return false;
				});
				
			   if ($("#3").css("display")!="none")
			      $("#3").css("display", "none");
			   else
			      $("#3").css("display", "block");
			});
			$("#principios").bind("click", function(e){
				$("#1").css("display", "none");
				$("#2").css("display", "none");
				$("#3").css("display", "none");
				$("#5").css("display", "none");
				$("#formPrincipios").submit(function(){
					$.ajax({
				    	 	async:true,
		        			beforeSend: function(){
		        				$("form").hide();
				     			$(".cargando").fadeIn("slow");},//Permite llamar una función antes de mandar el objeto ajax
						    type: "POST",
						    url: "libreria/insertar.php",
						    data: cadena,
						    success: function(datos){
						    	       	$(".cargando").hide();
						    	       	$("#mensaje").text(datos).fadeOut(3000);
						    	       	$('#formPrincipios')[0].reset();
						    	       	$("#1").css("display", "none");
						    },
				    });
				    return true;
				});
				
			   if ($("#4").css("display")!="none")
			      $("#4").css("display", "none");
			   else
			      $("#4").css("display", "block");
			});
			$("#codigo").bind("click", function(e){
				$("#1").css("display", "none");
				$("#2").css("display", "none");
				$("#3").css("display", "none");
				$("#4").css("display", "none");
				$("#formEtica").submit(function(){
					$.ajax({
				    	 	async:true,
		        			beforeSend: function(){
		        				$("form").hide();
				     			$(".cargando").fadeIn("slow");},//Permite llamar una función antes de mandar el objeto ajax
						    type: "POST",
						    url: "libreria/insertar.php",
						    data: cadena,
						    success: function(datos){
						    	       	$(".cargando").hide();
						    	       	$("#mensaje").text(datos).fadeOut(3000);
						    	       	$('#formEtica')[0].reset();
						    	       	$("#5").css("display", "none");
						    },
				    });
				    return true;
				});
				
			   if ($("#5").css("display")!="none")
			      $("#5").css("display", "none");
			   else
			      $("#5").css("display", "block");
			});



















    	var window = $("#Formulario").kendoWindow({
		title: "Nueva Nota",
		visible: false,
		actions: ["Maximize", "Minimize", "Close"],
		draggable: true,
		height: "400px",
		modal: true,
		resizable: false,
		width: "820px",


	})
	$("#Agregar").click(function(){
		var window = $("#Formulario").data("kendoWindow");
		window.center();
		window.open();
		
	});
	    //---------------------------buscador--------------------------
	    
	    $("#formbuscador").submit(function(){
		$("#AgrupadorOcultar").css("display","none");
		var cadena = $(this).serialize();
			     $.ajax({
				    type: "POST",
				    url: "libreria/buscar.php",
				    data: cadena,
				    success: function(datos) {
					$("#AgrupadorMostrar").html(datos);
				    }	  
			    });
			    return false;
	    });
	    //---------------------------buscador con rango--------------------------
	    $("#rangobutton").click(function(){
		        $(function() {
				var dates = $( "#de, #a" ).datepicker({
					defaultDate: "+1w",
					dateFormat: 'yy-mm-dd',
					changeMonth: true,
					numberOfMonths: 1,
					onSelect: function( selectedDate ) {
						var option = this.id == "de" ? "minDate" : "maxDate",
							instance = $( this ).data( "datepicker" ),
							date = $.datepicker.parseDate(
								instance.settings.dateFormat ||
								$.datepicker._defaults.dateFormat,
								selectedDate, instance.settings );
						dates.not( this ).datepicker( "option", option, date );
					}
				});
			});
			$("#rangoFecha").dialog({
			    altura: 240,
			    width: 500,
			    minWidth: 500,
			    maxWidth: 500,
			    modal: true,
			    resizable: false,
			    hide:"slide",
			});
			$("#formRango").submit(function(){
			    var cadena = $(this).serialize();
			     $.ajax({
				    type: "POST",
				    url: "libreria/buscar.php",
				    data: cadena,
				    success: function(datos) {
					$("#AgrupadorOcultar").css("display","none");
					$("#AgrupadorMostrar").html(datos);
				    }	  
			    });
			    return false;
	    	});
	    });
		$(".Despliege").bind("mouseenter mouseleave", function(e){
			  $(this).toggleClass("blanco");
			});
	     //---------------------------buscador Select option--------------------------
	     $("#selector").change(function(event){
		var id = $("#selector").find(':selected').val();
		$("#AgrupadorOcultar").css("display","none");
		$("#AgrupadorMostrar").load('libreria/buscar.php?id='+id);
	    });
    });//load cierre
    </script>
</head>
<?php
if(estas_autenticado()){
//si sale autenticado true lo dejo entrar
?>
<body>
    <div id="administrador">
		<section class="menuArriba">
				<!--mostrar usuario-->
				<a class="logo" href="admin.php"></a>
				<?php mostrar_usuario() ?>
				<!--Agregar nueva nota-->
				<button id="Agregar"></button>
		</section>
		<section id="submenu">
			<ul class="nav">
				<li><a href="#" id="minuta">Minuta</a></li>
				<li><a href="#" id="frase">frase</a></li>
				<li><a href="#" id="Asamblea">Asamblea General</a></li>
				<li><a href="#" id="principios">Prin. Generales</a></li>
				<li><a href="#" id="codigo">Cod. Etica</a></li>

				<div class="cargando" style="display:none;float:right;"><img src="imagenes/iconos/cargar.gif"></div>
				<div id="mensaje" style="display:inline-block;"></div>
			</ul>

			<div id="1" style="display:none;">
				
				<form id="formminuta" enctype="multipart/form-data" action="libreria/insertar.php" method="post">
			                <input type="file" name="pdf" id="archivo" />
			                <input type="submit">
			                <input name="action" type="hidden" value="upload" />
				</form>
			</div>
			<div id="2" style="display:none;">
				<form action="libreria/insertar.php" method="post">Frase: <input type="text" name="frase" placeholder="frase"/><input type="submit"></form>
			</div>
			<div id="3" style="display:none;">
				<form id="formmAsamGenr" enctype="multipart/form-data" action="libreria/insertar.php" method="post">
			                Fecha: <input type="text" name="fecha" id="fecha" placeholder="fecha" title="fehca" required/>
			                Hora : <input type="time" name="hora" id="hora" placeholder="hora"title="Hora" required/>
			                Lugar: <input type="text" name="lugar" id="lugar" placeholder="lugar" title="lugar" required/>
			                Puntos a Tratar: <textarea name="puntos" id="puntos"  placeholder="puntos a tratar" title="puntos a tratar" required></textarea>
			                <input type="submit"  value="Enviar">
				</form>
			</div>
			<div id="4" style="display:none;">
				<form id="formPrincipios" enctype="multipart/form-data" action="libreria/insertar.php" method="post">
			                <input type="file" name="principios" id="archivo" />
			                <input type="submit">
			                <input name="action" type="hidden" value="upload" />
				</form>
			</div>
			<div id="5" style="display:none;">
				<form id="formEtica" enctype="multipart/form-data" action="libreria/insertar.php" method="post">
			                <input type="file" name="etica" id="archivo" />
			                <input type="submit">
			                <input name="action" type="hidden" value="upload" />
				</form>
			</div>
		</section>
		<section id="buscador">
		    <article id="mostrar">
                        <select id="selector">
                            <option value="1">Primeras 10</option>
                            <option value="2">Ultimas 10</option>
                            <option value="3">Todas</option>
                        </select>
            </article>
            <div id="agrupador">
                    <article id="rango"><button id="rangobutton"><img src="imagenes/iconos/fecha.png">Por fecha</button></article>
			        <article id="Buscar">
							<FORM METHOD=POST ACTION="libreria/buscar.php" id="formbuscador">
							    <input type="text" name="busqueda" placeholder="buscar..." class="Buscar">
							    <a><input type="submit" id="botonBuscar" value=""/></a>
							</FORM>
			    	</article>
            </div>
		</section>
		<div id="Menu">
		    <span style="padding:0px 190px 0px 100px;">fecha</span>
		    <span style="padding:0px 120px 0px 0px;">Titulo</span>
		    <span>Descripcion</span>
		</div>
		<?php Mostrar(); ?>
		<div id="rangoFecha" title="Buscar por rango">
		    <form id="formRango">
			    <label>de</label>
			    <input type="text" id="de" name="de"/>
			    <label>a</label>
			    <input type="text" id="a" name="a"/>
			    <input type="submit" value="buscar" id="submit" style="margin:0px auto;">
		    </form>
		</div>
    </div>
    <div id="Formulario" title="Agregar Programa"><?php include($raiz."libreria/formulario.html");?></div>
    <?php
            }else{//sino esta autenticado lo mando al login
                echo "<div class='MensajeError'>";
                echo "<h2>para poder entrar tienes que estar logeado</h2>";
                echo '<a href="index.php">Login</a></div>';
            }
    ?>
    
</body>
</html>