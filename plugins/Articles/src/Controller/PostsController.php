<?php

namespace Articles\Controller;

use Articles\Controller\AppController;

class PostsController extends AppController
{
    public function index()
    {
        $this->isAuthorizedPermission('list-post');

        $this->paginate = [
            'contain' => ['Categories']
        ];

        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));
    }

    public function view($id)
    {
        $this->isAuthorizedPermission('list-post');

        $post = $this->Posts->get($id, [
            'contain' => ['Categories']
        ]);

        $this->set('post', $post);
    }

    public function add()
    {
        $this->isAuthorizedPermission('create-post');

        $post = $this->Posts->newEntity();

        if ($this->request->is('post')) {

            $post = $this->Posts->patchEntity($post, $this->request->getData());

            if ($this->Posts->save($post)) {

                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error("O post não pode ser salvo.");
        }

        $categories = $this->Posts->Categories->find('list', ['limit' => 200]);

        $this->set(compact('post', 'categories'));
    }

    public function edit($id)
    {
        $this->isAuthorizedPermission('edit-post');

        $post = $this->Posts->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $post = $this->Posts->patchEntity($post, $this->request->getData());

            if ($this->Posts->save($post)) {

                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }

        $categories = $this->Posts->Categories->find('list', ['limit' => 200]);

        $this->set(compact('post', 'categories'));
    }

    public function delete($id)
    {
        $this->isAuthorizedPermission('destroy-post');

        $this->request->allowMethod(['post', 'delete']);

        $post = $this->Posts->get($id);

        if ($this->Posts->delete($post)) {

            $this->Flash->success(__('O post foi deletado.'));

        } else {

            $this->Flash->error(__('O post não pode ser deletado.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
