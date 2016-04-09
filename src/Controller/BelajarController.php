<?php
namespace App\Controller;

use App\Controller\AppController;

class BelajarController extends AppController
{
	public function index()
    {
        $content = file_get_contents('https://infogempa.com/artikel/api/get_recent_posts/');
        $jsons = json_decode($content);

        $title = 'Info Gempa Dunia | Belajar Geologi dan Geofisika | infogempa.com';

        $this->set(compact('jsons','title'));
        $this->set('_serialize', ['gempa']);
    }
}