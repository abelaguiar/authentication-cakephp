<?php

namespace App\View;

use Cake\View\View;

class AppView extends View
{
    public function initialize()
    {
        $this->loadHelper('Paginator', ['templates' => 'paginator-templates']);
    }
}
