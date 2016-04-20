<?php
	// View code - src/Template/Articles/json/index.ctp
	foreach ($gempa as $gem) {
		foreach ($nearby as $near) {
	    	unset($near->generated_html);
		}
	    unset($gem->generated_html);
	}
	echo json_encode(compact(['gempa','nearby']));
?>