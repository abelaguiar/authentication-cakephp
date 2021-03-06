<?php

namespace Articles\Model\Entity;

use Cake\ORM\Entity;

class Post extends Entity
{
    protected $_accessible = [
        'title' => true,
        'category_id' => true,
        'content' => true,
        'created' => true,
        'modified' => true,
        'category' => true
    ];
}
