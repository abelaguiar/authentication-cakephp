<?php

use Cake\ORM\TableRegistry;
use Migrations\AbstractSeed;

class RolesSeed extends AbstractSeed
{
    public function run()
    {
        $role = TableRegistry::get('Roles');

        if (is_null($role->find()->first())) {

            $date = new \DateTime('NOW');
            $datetime = $date->format('Y-m-d H:i:s');

            $data = [
                'id' => 1,
                'name' => 'Administrador',
                'is_admin' => 1,
                'description' => 'Grupos de usuários administradores',
                'created' => $datetime,
                'modified' => $datetime
            ];

            $table = $this->table('roles');
            $table->insert($data)->save();
        }
    }
}
