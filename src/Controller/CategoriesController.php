<?php

namespace App\Controller;

use App\Controller\AppController;

class CategoriesController extends AppController
{
    public function index()
    {
        $this->isAuthorizedPermission('list-category');

        $categories = $this->paginate($this->Categories);

        $this->set(compact('categories'));
    }

    public function view($id = null)
    {
        $this->isAuthorizedPermission('list-category');
    
        $category = $this->Categories->get($id, [
            'contain' => ['Posts']
        ]);

        $this->set('category', $category);
    }

    public function add()
    {
        $this->isAuthorizedPermission('create-category');

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
        $this->isAuthorizedPermission('edit-category');

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

    public function delete($id = null)
    {
        $this->isAuthorizedPermission('destroy-category');

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
