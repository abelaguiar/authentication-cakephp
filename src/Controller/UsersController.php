<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Roles');
    }

    public function login()
    {
        if ($this->request->is('post')) {

            $user = $this->Auth->identify();

            if ($user) {

                $this->Auth->setUser($user);

                if ($this->Auth->authenticationProvider()->needsPasswordRehash()) {

                    $user = $this->Users->get($this->Auth->user('id'));
                    $user->password = $this->request->getData('password');

                    $this->Users->save($user);
                }

                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->warning("Não Autorizado! Você não tem um usuário válido.");
        }

        $this->render('/Auth/login');
    }

    public function logout()
    {
        $this->Flash->success("Sucesso! Você está desconectado agora.");

        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();

        $roles = $this->Roles->find('list');

        if ($this->request->is('post')) {

            if ($this->request->getData()['password'] != $this->request->getData()['confirm_password']) {

                $this->Flash->success(__('Senhas não coincidem.'));

                return $this->redirect(['action' => 'index']);
            }

            $user = $this->Users->patchEntity($user, $this->request->getData());

            $user->password = (new DefaultPasswordHasher)->hash($user->password);

            if ($this->Users->save($user)) {

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id);

        $roles = $this->Roles->find('list');

        if ($this->request->is(['patch', 'post', 'put'])) {

            $requestData = $this->request->getData();

            if (empty($requestData['password'])) {

                unset($requestData['password']);

            } else {

                if ($this->request->getData()['password'] != $this->request->getData()['confirm_password']) {

                    $this->Flash->success(__('Senhas não coincidem.'));
    
                    return $this->redirect(['action' => 'index']);
                }
    
                $requestData['password'] = (new DefaultPasswordHasher)->hash($requestData['password']);
            }

            $user = $this->Users->patchEntity($user, $requestData);

            if ($this->Users->save($user)) {

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $this->set(compact('user', 'roles'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $user = $this->Users->get($id);

        if ($this->Users->delete($user)) {

            $this->Flash->success(__('The user has been deleted.'));

        } else {

            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
