<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class RolePermission extends Entity
{
    protected $_accessible = [
        'role_id' => true,
        'permission_id' => true,
        'role' => true,
        'permission' => true
    ];
}
