<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\Controller\Controller;

class AppController extends Controller
{
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])    
        ) {

            $this->set('_serialize', true);
        }

        $this->set('auth', $this->request->session()->read('Auth'));
    }

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', ['enableBeforeRedirect' => false]);
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
            'loginAction' => ['controller' => 'Users', 'action' => 'login'],
            'logoutRedirect' => ['controller' => 'Users', 'action' => 'login'],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
            'storage' => 'Session'
        ]);

        if ($this->Auth->user()) {

            $this->viewBuilder()->setLayout('default');

        } else {

            $this->viewBuilder()->setLayout('login');
        }
    }

    public function isAuthorized($user = null)
    {
        // Any registered user can access public functions
        if (! $this->request->getParam('prefix')) {

            return true;
        }

        //Only admins can access admin functions
        // if ($this->request->getParam('prefix') === 'admin') {
        //     return (bool)($user['role'] === 'admin');
        // }

        return false;
    }
}
