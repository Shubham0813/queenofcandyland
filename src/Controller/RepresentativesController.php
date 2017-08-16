<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Representatives Controller
 *
 * @property \App\Model\Table\RepresentativesTable $Representatives
 *
 * @method \App\Model\Entity\Representative[] paginate($object = null, array $settings = [])
 */
class RepresentativesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $representatives = $this->paginate($this->Representatives);

        $this->set(compact('representatives'));
        $this->set('_serialize', ['representatives']);
    }

    /**
     * View method
     *
     * @param string|null $id Representative id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $representative = $this->Representatives->get($id, [
            'contain' => ['Vendors']
        ]);

        $this->set('representative', $representative);
        $this->set('_serialize', ['representative']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $representative = $this->Representatives->newEntity();
        if ($this->request->is('post')) {
            $representative = $this->Representatives->patchEntity($representative, $this->request->getData());
            if ($this->Representatives->save($representative)) {
                $this->Flash->success(__('The representative has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The representative could not be saved. Please, try again.'));
        }
        $this->set(compact('representative'));
        $this->set('_serialize', ['representative']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Representative id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $representative = $this->Representatives->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $representative = $this->Representatives->patchEntity($representative, $this->request->getData());
            if ($this->Representatives->save($representative)) {
                $this->Flash->success(__('The representative has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The representative could not be saved. Please, try again.'));
        }
        $this->set(compact('representative'));
        $this->set('_serialize', ['representative']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Representative id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $representative = $this->Representatives->get($id);
        if ($this->Representatives->delete($representative)) {
            $this->Flash->success(__('The representative has been deleted.'));
        } else {
            $this->Flash->error(__('The representative could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
