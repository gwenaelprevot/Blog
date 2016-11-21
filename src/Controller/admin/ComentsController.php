<?php
namespace App\Controller\admin;

use App\Controller\AppController;

/**
 * Coments Controller
 *
 * @property \App\Model\Table\ComentsTable $Coments
 */
class ComentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id= NULL)
    {
        $this->paginate = [
            'contain' => ['Users', 'News']
        ];
        $coments = $this->paginate($this->Coments->find('all')->where(['Coments.user_id'=>$id]));

        $this->set(compact('coments'));
        $this->set('_serialize', ['coments']);
    }

    public function indexlike($id= NULL)
    {
        $this->paginate = [
            'contain' => ['Users', 'News']
        ];
        $coments = $this->paginate($this->Coments->find('all')->innerJoinWith('Likes')->where(['Likes.user_id'=>$id]));

        $this->set(compact('coments'));
        $this->set('_serialize', ['coments']);
    }
    public function indexilike($id= NULL)
    {
        $this->paginate = [
            'contain' => ['Users', 'News']
        ];
        $coments = $this->paginate($this->Coments->find('all')->innerJoinWith('Likes')->where(['Coments.user_id'=>$id])->andWhere(['Likes.id IS NOT NULL']));

        $this->set(compact('coments'));
        $this->set('_serialize', ['coments']);
    }

    /**
     * View method
     *
     * @param string|null $id Coment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coment = $this->Coments->get($id, [
            'contain' => ['Users', 'News']
        ]);

        $this->set('coment', $coment);
        $this->set('_serialize', ['coment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = NULL)
    {
        $users = $this->Auth->User('id');
        $coment = $this->Coments->newEntity();
        if ($this->request->is('post')) {
            $coment = $this->Coments->patchEntity($coment, $this->request->data);
            $coment->user_id = $users ;
            $coment->new_id = $id ;
            if ($this->Coments->save($coment)) {

                return $this->redirect(['controller'=>'news','action' => 'view',$id]);
            } else {
            }
        }
        $users = $this->Coments->Users->find('list', ['limit' => 200]);
        $news = $this->Coments->News->find('list', ['limit' => 200]);
        $this->set(compact('coment', 'users', 'news'));
        $this->set('_serialize', ['coment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Coment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coment = $this->Coments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coment = $this->Coments->patchEntity($coment, $this->request->data);
            if ($this->Coments->save($coment)) {

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('The coment could not be saved. Please, try again.'));
            }
        }
        $iid = $id  ;
        $users = $this->Coments->Users->find('list', ['limit' => 200]);
        $news = $this->Coments->News->find('list', ['limit' => 200]);
        $this->set(compact('coment', 'users', 'news','iid'));
        $this->set('_serialize', ['coment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Coment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coment = $this->Coments->get($id);
        if ($this->Coments->delete($coment)) {
            $this->Flash->success(__('The coment has been deleted.'));
        } else {
            $this->Flash->error(__('The coment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
