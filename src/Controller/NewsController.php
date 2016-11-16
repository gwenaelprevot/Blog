<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * News Controller
 *
 * @property \App\Model\Table\NewsTable $News
 */
class NewsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id = NULL)
    {
        $this->loadModel('Category');

        $this->paginate = [
            'limit' =>4,
            'contain' => ['Users', 'Category','Coments']
        ];

/*        $new = $this->paginate($this->News->find('all')->contain('Category')->where(['is_active' => '1']));*/
        if (isset($id)=== false) {
            $new = $this->paginate($this->News->find('all')->where(['is_active' => '1']));
        } else {
            $new = $this->paginate($this->News->find('all')->where(['categorie_id' => $id])->andWhere(['is_active' => '1']));
        }
        $category = $this->Category->find('all');

        $this->set(compact('new','category'));
        $this->set('_serialize', ['news']);
    }

    /**
     * View method
     *
     * @param string|null $id News id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Coments');
        $news = $this->News->get($id, [
            'contain' => ['Users', 'Category']
        ]);
        $com = $this->Coments->find('all')->contain('Users')->where(['new_id'=> $id]);
        $this->set('news', $news);
        $this->set(compact('com'));
        $this->set('_serialize', ['news']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $users = $this->Auth->User('id');
        $news = $this->News->newEntity();
        if ($this->request->is('post')) {
            $news = $this->News->patchEntity($news, $this->request->data);
            $news->user_id = $users;
            if ($this->News->save($news)) {
                return $this->redirect(['action' => 'index']);
            } else {
            }
        }
        $users = $this->News->Users->find('list', ['valueField' => 'username']);
        $categories = $this->News->Categories->find('list', ['valueField' => 'name']);
        $this->set(compact('news', 'users', 'categories'));
        $this->set('_serialize', ['news']);
    }

    /**
     * Edit method
     *
     * @param string|null $id News id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $news = $this->News->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $news = $this->News->patchEntity($news, $this->request->data);
            if ($this->News->save($news)) {

                return $this->redirect(['action' => 'index']);
            } else {
            }
        }
        $users = $this->News->Users->find('list', ['limit' => 200]);
        $categories = $this->News->Categories->find('list', ['limit' => 200]);
        $this->set(compact('news', 'users', 'categories'));
        $this->set('_serialize', ['news']);
    }

    /**
     * Delete method
     *
     * @param string|null $id News id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $news = $this->News->get($id);
        $this->News->Coments->deleteAll(['new_id'=>$id]);
        if ($this->News->delete($news)) {
            $this->Flash->success(__('The news has been deleted.'));
        } else {
            $this->Flash->error(__('The news could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
