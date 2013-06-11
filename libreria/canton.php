<?php
$raiz="./";//desde la raiz
header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
header( 'Cache-Control: no-cache, must-revalidate' );
header( 'Pragma: no-cache' );
include_once("libreria/FuncionesComunes.php");
?>

<center><h1 style="font-size: 2.5em;"><?php frase(); ?></h1></center>
<script type="text/javascript">
				var list = ['first blurb', 'second blurb', 'third blurb'];  // list of blurbs

				var txt = $('#txtlzr');  // The container in which to render the list

				var options = {
				  duration: 1000,          // Time (ms) each blurb will remain on screen
				  rearrangeDuration: 1000, // Time (ms) a character takes to reach its position
				  effect: 'random',        // Animation effect the characters use to appear
				  centered: true           // Centers the text relative to its container
				}

				txt.textualizer(list, options); // textualize it!
				txt.textualizer('start'); // start
</script>