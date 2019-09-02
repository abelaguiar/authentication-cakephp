<?php

namespace App\Controller;

use App\Controller\AppController;

class CategoriesController extends AppController
{
    public function index()
    {
        $categories = $this->paginate($this->Categories);

        $this->set(compact('categories'));
    }

    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['Posts']
        ]);

        $this->set('category', $category);
    }

    public function add()
    {
        $category = $this->Categories->newEntity();

        if ($this->request->is('post')) {

            $category = $this->Categories->patchEntity($category, $this->request->getData());

            if ($this->Categories->save($category)) {

                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }

        $this->set(compact('category'));
    }

    public function edit($id = null)
    {
        $category = $this->Categories->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $category = $this->Categories->patchEntity($category, $this->request->getData());

            if ($this->Categories->save($category)) {

                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }

        $this->set(compact('category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $category = $this->Categories->get($id);

        if ($this->Categories->delete($category)) {

            $this->Flash->success(__('The category has been deleted.'));

        } else {

            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
