<?php

use Cake\ORM\TableRegistry;
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

class UsersSeed extends AbstractSeed
{
    public function run()
    {
        $user = TableRegistry::get('Users');

        if (is_null($user->find()->first())) {

            $date = new \DateTime('NOW');
            $datetime = $date->format('Y-m-d H:i:s');

            $data = [
                'id' => 1,
                'name' => 'Abel Aguiar',
                'email' => 'abel.prog@gmail.com',
                'password' => (new DefaultPasswordHasher)->hash('123456'),
                'role_id' => 1,
                'created' => $datetime,
                'modified' => $datetime
            ];

            $table = $this->table('users');
            $table->insert($data)->save();
        }
    }
}
