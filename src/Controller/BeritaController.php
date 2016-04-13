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
        $meta_desc = 'Info Gempa | Kami menyediakan informasi mengenai gempa bumi yang terjadi di dunia. untuk mendapatkan informasi secara update silahkan subscribe';
        $this->set(compact('article', 'title', 'meta_desc'));
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
            $content = $details->content;
            $string = strip_tags($content);

            if (strlen($string) > 167) {
                $stringCut = substr($string, 0, 167);
                $string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
            }
        }

        $title = $seo_title.' | infogempa.com';
        $meta_desc = $string;

        $this->set(compact('detail','title', 'meta_desc'));
        
    }
}