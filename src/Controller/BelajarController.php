<?php
namespace App\Controller;

use App\Controller\AppController;

class BelajarController extends AppController
{
	public function index()
    {
    	// $this->loadModel('NearbyCities');
        $content = file_get_contents('https://infogempa.com/artikel/api/get_recent_posts/');
        $jsons = json_decode($content);

        // debug($jsons);
        // exit;

        $this->set(compact('jsons'));
        $this->set('_serialize', ['gempa']);

        
    }
}