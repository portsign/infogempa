<?php 
	foreach ($gempa as $gempas) {
	    unset($gempas->generated_html);
	}
	echo json_encode(compact('gempas'));
?>