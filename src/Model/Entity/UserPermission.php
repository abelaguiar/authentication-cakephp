<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class UserPermission extends Entity
{
    protected $_accessible = [
        'user_id' => true,
        'permission_id' => true,
        'user' => true,
        'permission' => true
    ];
}
