<?php
namespace App\Controller;

use App\Controller\AppController;

class BelajarController extends AppController
{
	public function index()
    {

    	function getSslPage($url) {
		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		    curl_setopt($ch, CURLOPT_HEADER, false);
		    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_REFERER, $url);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		    $result = curl_exec($ch);
		    curl_close($ch);
		    return $result;
		}

        $content = getSslPage('https://infogempa.com/artikel/api/get_recent_posts/');
        $jsons = json_decode($content);

        $title = 'Info Gempa Dunia | Belajar Geologi dan Geofisika | infogempa.com';
        $meta_desc = 'Info Gempa | Kami menyediakan informasi mengenai gempa bumi yang terjadi di dunia. untuk mendapatkan informasi secara update silahkan subscribe';
        $this->set(compact('jsons','title','meta_desc'));
        $this->set('_serialize', ['gempa']);
    }
}