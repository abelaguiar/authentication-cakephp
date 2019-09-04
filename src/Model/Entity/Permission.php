<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Permission extends Entity
{
    protected $_accessible = [
        'name' => true,
        'slug' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'role_permission' => true,
        'user_permission' => true
    ];
}
