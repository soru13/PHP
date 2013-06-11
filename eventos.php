<?php
$raiz="./";//desde la raiz
header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
header( 'Cache-Control: no-cache, must-revalidate' );
header( 'Pragma: no-cache' );
include_once("libreria/FuncionesComunes.php");
?>

		<section>
	        <a href="#" id="anterior">&laquo;</a>
	        <div id="marco">
	            <ul>
	                <?php MostrarSlider() ?>
	            </ul>
	           
	        </div>
	        <a href="#" id="siguiente">&raquo;</a>

	    </section>

	    <div id="#minuta" style="width: 18%;
		    position: relative;
		    float: right;
		    display: inline-block;
		    height: 100%;
		    text-align: center;">
	    	<nav>
			<ul><h1>Proxima Asamblea General</h1><hr>
				<?php
				Asamblea();
				?>
			</ul>
		</nav><br>
		<br>
		<br><div style=" border: 1px solid #a0a0a0;
        border-radius: 6px;">
		<?php
		minuta();
		?></div>
		<br><br>
		<h1 id="alt" style="display: inline-block;"></h1>
	    </div>
	    <script type="text/javascript">
			        $('#marco').marquesina({
			            onSlideChange : function() {
			                $slide = $(this);
			                var alt = $slide.find('img').attr('alt');
			                $('#alt').text(alt);
			            }
			        });
			        s=$('#marco').data('slider');
      				t=setInterval(function(){s.siguiente();},5000);
      				$("#NOTICIERO").empty();
      				$("#marco li").click(function(event){
				        event.preventDefault();
				        var ID = $(this).attr("id");
				         $.ajax({
                            async:true,
                            beforeSend: function(){
                                console.log("enviado");
                                },//Permite llamar una función antes de mandar el objeto ajax
                            type: "GET",
                            cache:false,
                            url: "libreria/noticiero.php",
                            data: "ID="+ID,
                            success: function(datos){
                            	$("#NOTICIERO").html(datos);
                            },
                    	});
				        var window = $("#NOTICIERO").kendoWindow({
				            title: "Evento",
				            visible: false,
				            actions: ["Close"],
				            modal: true,
				        });
				        window.data("kendoWindow").center().open().maximize();
				    });
	   		</script>


