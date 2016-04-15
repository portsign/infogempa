<?php 
	header("Content-type: text/xml");
	foreach ($gempa as $gem) {
        $slug = preg_replace('/[^a-zA-Z0-9\']/', '-', $gem->place);
        $time = substr($gem->time, 0, 10);

        $data = [];
        $data['loc'] = '/pages/'.$gem->id_gempa.DS.$slug.'.html';
        $data['changefreq_1'] = 'daily';
        $data['lastmod'] = date('Y-m-d H:i:s', $time);
        $data['changefreq_2'] = 'weekly';
    }
?>