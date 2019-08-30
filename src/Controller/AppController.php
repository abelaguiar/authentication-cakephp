<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\Controller\Controller;

class AppController extends Controller
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', ['enableBeforeRedirect' => false]);
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
            'loginAction' => ['controller' => 'Users', 'action' => 'login'],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
            'storage' => 'Session'
        ]);

        //$this->loadComponent('Security');

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

        // Only admins can access admin functions
        //if ($this->request->getParam('prefix') === 'admin') {
        //    return (bool)($user['role'] === 'admin');
        //}

        return false;
    }
}
