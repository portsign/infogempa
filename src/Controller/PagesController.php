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

        $path = func_get_args();

        $this->loadModel('Gempa');
        $gempa = $this->paginate($this->Gempa, [
            'conditions'
        ]);

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
    public function search() 
    {
        // debug($this->request->query);
        $this->loadModel('Gempa');
        $place = $this->request->query['place'];
        $country = $this->request->query['country'];
        $skala_richter = $this->request->query['skala_richter'];
        $tsunami = $this->request->query['tsunami'];

        $this->paginate = [
            'conditions' => [ 'Gempa.place LIKE' => '%'.$place.'%', 
                            'Gempa.place LIKE' => '%'.$country.'%',
                            'Gempa.mag >' => $skala_richter,
                            'Gempa.tsunami' => $tsunami ]
        ];

        debug($this->paginate('Gempa'));

        $this->set(compact('gempa'));

    }
}
