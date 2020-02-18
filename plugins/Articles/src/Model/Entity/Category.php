<?php

namespace Articles\Model\Entity;

use Cake\ORM\Entity;

class Category extends Entity
{
    protected $_accessible = [
        'name' => true,
        'created' => true,
        'modified' => true,
        'posts' => true
    ];
}
