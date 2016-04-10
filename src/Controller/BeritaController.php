<?php
namespace App\Controller;

use App\Controller\AppController;

class BeritaController extends AppController
{
	public function index()
    {
		$this->loadModel('Articles');
		$this->paginate = [
            'order' => [
                'Articles.time' => 'DESC'
            ],
            // 'limit' => 1
        ];
        $article = $this->paginate($this->Articles);
        $title = 'Info Gempa Dunia | Berita Gempa Bumi Indonesia | infogempa.com';
        $this->set(compact('article', 'title'));
    }
    public function detail()
    {

		$this->loadModel('Articles');
    	$slug = $this->request->params['slug'];

    	$detail = $this->Articles->find('all', [
    		'condition' => [ 'Articles.slug' => $slug ]
    	])->all();

        foreach ($detail as $details) {
        	$seo_title = $details->title;
        }

        $title = $seo_title.' | infogempa.com';
        $this->set(compact('detail','title'));
        
    }
}