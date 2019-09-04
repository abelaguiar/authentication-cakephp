<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

class User extends Entity
{
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'role_id' => true,
        'created' => true,
        'modified' => true
    ];

    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {

          return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
