<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Role extends Entity
{
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'role_permission' => true,
        'users' => true
    ];
}
