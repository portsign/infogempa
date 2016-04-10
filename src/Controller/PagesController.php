<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\Entity;
use Cake\Mailer\Email;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('RequestHandler');
    }
    
    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display()
    {
        $path = func_get_args();

        $this->loadModel('Gempa');

        $this->paginate = [
            'order' => [
                'Gempa.time' => 'DESC'
            ]
        ];
        $gempa = $this->paginate($this->Gempa);

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $title = 'Info Gempa Dunia | Informasi Gempa Bumi Dunia | infogempa.com';
        $this->set(compact('page', 'subpage', 'gempa', 'title'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }
    public function sitemap() 
    {
        $this->RequestHandler->ext = 'xml';
        $this->loadModel('Gempa');
        $this->paginate = [
            'order' => [
                'Gempa.time' => 'DESC'
            ],
            'limit' => 18
        ];
        $gempa = $this->paginate($this->Gempa);
        $this->set(compact('gempa'));
        $this->set('_serialize', ['gempa']);
    }
    public function detail($id=null, $slug=null)
    {
        $this->loadModel('Gempa');
        $this->loadModel('NearbyCities');
        $gempa = $this->Gempa->find('all', [
            'conditions' => [ 'Gempa.id_gempa' => $id ]
        ])->all(); 

        foreach ($gempa as $get_data) {
            $title = $get_data->title.' '.$get_data->mag.' Skala Richter | infogempa.com';
        }
        $nearby = $this->NearbyCities->find('all', [
            'conditions' => [ 'NearbyCities.id_gempa' => $id ]
        ])->all();     

        $this->set(compact('gempa', 'nearby', 'title'));
    }
    public function search($place='', $country='', $skala_richter=null, $tsunami=null) 
    {

        $this->loadModel('Gempa');
        $place = $this->request->query['place'];
        $country = $this->request->query['country'];
        $skala_richter = $this->request->query['skala_richter'];
        $tsunami = $this->request->query['tsunami'];

        $condition = [];

        if(!empty($place)){
            $condition[] = ['Gempa.place LIKE' => '%'.$place.'%']; 
        }

        if(!empty($country)){
            $condition[] = ['Gempa.place LIKE' => '%'.$country.'%']; 
        }

        if(!empty($skala_richter)){
            $condition[] = ['Gempa.mag >' => $skala_richter]; 
        }

        if(!empty($tsunami)){
            $condition[] = ['Gempa.tsunami' => $tsunami]; 
        }

        $this->paginate = [
            'conditions' => [$condition],
            'order' => ['Gempa.created' => 'DESC']
        ];

        $title = 'Info Gempa Dunia | Informasi Gempa Bumi Dunia | infogempa.com';

        $gempa = $this->paginate($this->Gempa);

        $this->set(compact('gempa','title'));
    }

    public function subscribe()
    {

        $this->loadModel('Subscribers');
        $captcha = $this->request->data['g-recaptcha-response'];
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LciLRwTAAAAAFFQlcJ900GkG6m34z3_WqsZDYQN&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        $responseData = json_decode($response);
        
        if ($responseData->success) {
            $subscribe = $this->Subscribers->newEntity();
            if ($this->request->is('post')) {
                $subscribe = $this->Subscribers->patchEntity($subscribe, $this->request->data);
                if ($this->Subscribers->save($subscribe)) {
                    $this->Flash->success('Terimakasih sudah subscribe kami', [
                        'key' => 'subscribe_scs'
                    ]);
                    return $this->redirect('/');
                } else {
                    $this->Flash->error('Email anda sudah terdaftar', [
                        'key' => 'subscribe_emrg'
                    ]);
                    return $this->redirect('/');
                }
            }
            $this->set(compact('subscribe'));
            $this->set('_serialize', ['subscribe']);
        } else {
            $this->Flash->recaptcha('Pastikan anda bukan robot, centang captcha dibawah ini', [
                'key' => 'subscribe_capt'
            ]);
            return $this->redirect('/');
        }
    }

    public function contactAction() 
    {
        if ($this->request->is('post')) {
            $this->Flash->success('Terimakasih sudah Mengontak Kami. Kami akan segera menanggapi pesan anda', [
                'key' => 'success_contact'
            ]);
            $email = new Email('default');
            $email->emailFormat('html');
            $email->from([$this->request->data['email'] => 'Contact Info Gempa'])
                ->to(['info@infogempa.com', 'nafiansyah.aqi@gmail.com'])
                ->subject('Contact Message')
                ->send('<h3>Contact InfoGempa Notification</h3><table><tr><td>Nama</td><td>:</td><td>'.$this->request->data['name'].'</td></tr><tr><td>Email</td><td>:</td><td>'.$this->request->data['email'].'</td></tr><tr><td>Message</td><td>:</td><td>'.$this->request->data['message'].'</td></tr></table>');
               
            return $this->redirect('/#contact');
        }
    }
    public function privacyPolicy() 
    {
        $title = 'Info Gempa Dunia | Informasi Gempa Bumi Dunia | infogempa.com';
        $this->set(compact('title'));
    }
    public function dmca() 
    {
        $title = 'Info Gempa Dunia | Informasi Gempa Bumi Dunia | infogempa.com';
        $this->set(compact('title'));
    }
    public function news()
    {

        $this->loadModel('Articles');

        require_once(ROOT .DS. 'vendor' . DS . 'simplehtmldom' . DS . 'simple_html_dom.php');
        $content = file_get_html('http://news.okezone.com/topic/75/gempa');
        $jsons = json_decode($content);
        foreach($content->find('h2') as $e) {
            // Ini judul
            echo($e->plaintext)."<br />";
            $title = $e->plaintext;
            $tag = explode( ' ', $title );
            $tags = join(',', $tag);
            $tags = str_replace(',,', ',', $tags);
            $tags = str_replace('di', ',', $tags);
            $tags = str_replace('pada', ',', $tags);
            $tags = str_replace('ke', ',', $tags);
            $tags = str_replace('karena', ',', $tags);
            $tags = preg_replace('/[0-9]/', '', $tags);
            $tags = str_replace(',,,', ',', $tags);
            $tags = str_replace('satu', '', $tags);
            $tags = str_replace('Satu', '', $tags);
            $tags = str_replace(',,', ',', $tags);
            $tags = str_replace('dua', '', $tags);
            $tags = str_replace('tiga', '', $tags);
            $tags = str_replace('empat', '', $tags);
            $tags = str_replace('lima', '', $tags);
            $tags = str_replace('enam', '', $tags);
            $tags = str_replace('tujuh', '', $tags);
            $tags = str_replace('delapan', '', $tags);
            $tags = str_replace('sembilan', '', $tags);
            $tags = str_replace('sepuluh', '', $tags);
            $tags = str_replace('dan', '', $tags);
            $tags = str_replace('itu', '', $tags);
            $tags = str_replace('ini', '', $tags);
            $tags = str_replace('hanya', '', $tags);
            $tags = str_replace('oleh', '', $tags);
            $tags = str_replace('akan', '', $tags);
            $tags = str_replace('alih-alih', '', $tags);
            $tags = str_replace('antara', '', $tags);
            $tags = str_replace('seantero', '', $tags);
            $tags = str_replace('bagaikan', '', $tags);
            $tags = str_replace('bagi', '', $tags);
            $tags = str_replace('sebelum', '', $tags);
            $tags = str_replace('buat', '', $tags);
            $tags = str_replace('dari', '', $tags);
            $tags = str_replace('demi', '', $tags);
            $tags = str_replace('dengan', '', $tags);
            $tags = str_replace('di atas', '', $tags);
            $tags = str_replace('terhadap', '', $tags);
            $tags = str_replace('hingga', '', $tags);
            $tags = str_replace('menjelang', '', $tags);
            $tags = str_replace('ke', '', $tags);
            $tags = str_replace('kecuali', '', $tags);
            $tags = str_replace('sekeliling', '', $tags);
            $tags = str_replace('mengenai', '', $tags);
            $tags = str_replace('sekitar', '', $tags);
            $tags = str_replace('melalui', '', $tags);
            $tags = str_replace('selama', '', $tags);
            $tags = str_replace('lepas', '', $tags);
            $tags = str_replace('lewat', '', $tags);
            $tags = str_replace('sepanjang', '', $tags);
            $tags = str_replace('per', '', $tags);
            $tags = str_replace('seputar', '', $tags);
            $tags = str_replace('bersama', '', $tags);
            $tags = str_replace('sampai', '', $tags);
            $tags = str_replace('sejak', '', $tags);
            $tags = str_replace('seluruh', '', $tags);
            $tags = str_replace('semenjak', '', $tags);
            $tags = str_replace('seperti', '', $tags);
            $tags = str_replace('serta', '', $tags);
            $tags = str_replace('sesudah', '', $tags);
            $tags = str_replace('tentang', '', $tags);
            $tags = str_replace('menuju', '', $tags);
            $tags = str_replace('menurut', '', $tags);

            $slug = preg_replace('/[^a-zA-Z0-9\']/', '-', $title);
            $slug = str_replace('--', '-', $slug);
            $slug = strtolower($slug);

            $input = [
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-01.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-02.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-03.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-04.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-05.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-06.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-07.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-08.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-09.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-10.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-11.jpg", 
                    ];
            $rand_keys = array_rand($input, 2);

            // ini thumbnail
            echo $input[$rand_keys[1]] . "\n";
            $thumb = $input[$rand_keys[1]];

            foreach($content->find('div.content-hardnews') as $div) {
                foreach($div->find('h2 a') as $a) {
                    $link = $a->href;
                    $artikel = file_get_html($link);
                    foreach ($artikel->find('div.detail-img') as $art) {
                        // ini artikelnya
                        echo(str_replace('okezone','infogempa', str_replace('Okezone','Infogempa.com',$art->plaintext))).'<br />';
                        $konten = str_replace('okezone','infogempa', str_replace('Okezone','Infogempa.com',$art->plaintext));
                    }
                        // Manipulasi waktu
                        $date = date('Y-m-d H:i:s');
                        $date = strtotime($date);
                        $date = strtotime("+7 day", $date);
                        $time = date('Y-m-d H:i:s', $date);

                        $article = $this->Articles->find('all',[
                            'condition' => [ 'Articles.title' => '%'.$title.'%' ],
                            'limit' => 1
                        ])->all();

                        $value = [];
                        foreach ($article as $value) {
                        }
                            if ($value->title == $title) {
                                echo 'postingan sudah ada';
                                exit;
                                // DIE
                            } else {
                                // QUERY SAVE DATA BARU

                                $this->request->data = [];
                                $this->request->data['title'] = $title;
                                $this->request->data['thumbnail'] = $thumb;
                                $this->request->data['content'] = $konten;
                                $this->request->data['tags'] = $tags;
                                $this->request->data['slug'] = $slug;
                                $this->request->data['created'] = $time;
                                $this->request->data['modified'] = $time;

                                $data_save = $this->Articles->newEntity();
                                $data = (array)$this->request->data;
                                $data_save = $this->Articles->patchEntity($data_save, $data);
                                // debug($data_save);
                                // exit;
                                $this->Articles->save($data_save);
                                exit;
                            }
                    exit;
                }
            }
        }
    }
}
