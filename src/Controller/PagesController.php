<?php

namespace App\Controller;

use App\Controller\AppController;

class PagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Posts');
    }

    public function home()
    {
        $posts = $this->Posts->find()->count();

        $this->set(compact('posts'));
    }
}
