<?php
namespace App\Controller;

use App\Controller\AppController;

class RadarController extends AppController
{
	public function index()
    {
    	$title = 'Info Gempa Dunia | Radar Pendeteksi Gempa | infogempa.com';
    	$this->set(compact('title'));
    }
}