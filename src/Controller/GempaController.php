<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Entity;
use Cake\Console\Shell;
/**
 * Gempa Controller
 *
 * @property \App\Model\Table\GempaTable $Gempa
 */
class GempaController extends AppController
{


    public function saveGempa()
    {
        $this->loadModel('NearbyCities');
        $content = file_get_contents('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp');
        $get = str_replace('eqfeed_callback(', '', $content);
        $get = str_replace(');', '', $get);
        $jsons = json_decode($get);

        $gempa = $this->Gempa->find('all', [
            'order' => ['Gempa.id' => 'DESC'],
            'limit' => 1
        ]);
        foreach ($gempa as $gempa_data) {
            $datag = [];
            $datag = $gempa_data;
        }
        
        foreach ($jsons->features as $value) {
            $value->properties->coordinates1 = $value->geometry->coordinates[0];
            $value->properties->coordinates2 = $value->geometry->coordinates[1];
            $value->properties->coordinates3 = $value->geometry->coordinates[2];

            $insertAtBegining = array(
                'id_gempa' => $value->id,
            );

            $newArray = array_merge($insertAtBegining, (array)$value->properties);

            $data_gempa = $newArray;
            $gempa = $this->Gempa->newEntity();
            $gempa = $this->Gempa->patchEntity($gempa, $data_gempa);

            // GET DETAIL========================================================================
            $content_detail = file_get_contents($value->properties->detail);
            $get_detail = str_replace('eqfeed_callback(', '', $content_detail);
            $get_detail = str_replace(');', '', $get_detail);
            $jsons_detail = json_decode($get_detail);

            // GET NEARBY DETAIL
            $nearby_detail = $jsons_detail->properties->products->{'nearby-cities'}[0]->contents->{'nearby-cities.json'}->url;
            $content_nearby = file_get_contents($nearby_detail);
            $get_nearby = str_replace('eqfeed_callback(', '', $content_nearby);
            $get_nearby = str_replace(');', '', $get_nearby);
            $jsons_nearby = json_decode($get_nearby);
            // ==================================================================================
            $datag = [];
            if ($datag->id_gempa==$value->id) {
                //data sudah ada di database
                echo 'data sudah ada di database';
                exit;
            } else {

                foreach ($jsons_nearby as $jsnearb) {
                    // debug((array)$jsnearb);
                    $insertAtBegining_nearb = array(
                        'id_gempa' => $value->id,
                    );

                    $newArray_nearb = array_merge($insertAtBegining_nearb, (array)$jsnearb);
                    $gempa_near = $this->Gempa->newEntity();
                    $gempa_near = $this->Gempa->patchEntity($gempa_near, $newArray_nearb);
                    $this->NearbyCities->save($gempa_near);

                }
                $this->Gempa->save($gempa);
                exit;
            }

        }

    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $gempa = $this->paginate($this->Gempa);

        $this->set(compact('gempa'));
        $this->set('_serialize', ['gempa']);
    }

    /**
     * View method
     *
     * @param string|null $id Gempa id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gempa = $this->Gempa->get($id, [
            'contain' => []
        ]);

        $this->set('gempa', $gempa);
        $this->set('_serialize', ['gempa']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gempa = $this->Gempa->newEntity();
        if ($this->request->is('post')) {
            $gempa = $this->Gempa->patchEntity($gempa, $this->request->data);
            if ($this->Gempa->save($gempa)) {
                $this->Flash->success(__('The gempa has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The gempa could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('gempa'));
        $this->set('_serialize', ['gempa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gempa id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gempa = $this->Gempa->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gempa = $this->Gempa->patchEntity($gempa, $this->request->data);
            if ($this->Gempa->save($gempa)) {
                $this->Flash->success(__('The gempa has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The gempa could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('gempa'));
        $this->set('_serialize', ['gempa']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gempa id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gempa = $this->Gempa->get($id);
        if ($this->Gempa->delete($gempa)) {
            $this->Flash->success(__('The gempa has been deleted.'));
        } else {
            $this->Flash->error(__('The gempa could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
