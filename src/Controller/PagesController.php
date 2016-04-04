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
        // debug($this->request->query['subscribe']);
        // exit;
        // if ($this->request->query['subscribe']=='true') {
            
        // }
        $path = func_get_args();

        $this->loadModel('Gempa');
        // $gempa = $this->paginate($this->Gempa, [
        //     'order' => ['Gempa.created' => 'DESC']
        // ]);

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
        $this->set(compact('page', 'subpage', 'gempa'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }
    public function detail($id=null, $slug=null)
    {
        $this->loadModel('Gempa');
        $this->loadModel('NearbyCities');
        $gempa = $this->Gempa->find('all', [
            'conditions' => [ 'Gempa.id_gempa' => $id ]
        ])->all(); 
        $nearby = $this->NearbyCities->find('all', [
            'conditions' => [ 'NearbyCities.id_gempa' => $id ]
        ])->all();       
        $this->set(compact('gempa', 'nearby'));
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
        $gempa = $this->paginate($this->Gempa);

        $this->set(compact('gempa'));
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

    }
    public function dmca() 
    {
        
    }
}
