<?php

namespace App\Controller;

use App\Controller\AppController;

class PostsController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));
    }

    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Categories']
        ]);

        $this->set('post', $post);
    }

    public function add()
    {
        $post = $this->Posts->newEntity();

        if ($this->request->is('post')) {

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

    public function edit($id = null)
    {
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

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $post = $this->Posts->get($id);

        if ($this->Posts->delete($post)) {

            $this->Flash->success(__('The post has been deleted.'));

        } else {

            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
