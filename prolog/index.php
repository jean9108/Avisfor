<?php 
	/**Cadena de conexion**/
	$output = `swipl -s ejemplo.pl -g "test." -t halt.`;
  var_dump($output);
?>