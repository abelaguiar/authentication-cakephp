<?php

use Migrations\AbstractSeed;

class RolesSeed extends AbstractSeed
{
    public function run()
    {
        $date = new \DateTime('NOW');
        $datetime = $date->format('Y-m-d H:i:s');

        $data = [
            'name' => 'Administrador',
            'description' => 'Grupos de usuários administradores',
            'created' => $datetime,
            'modified' => $datetime
        ];

        $table = $this->table('roles');
        $table->insert($data)->save();
    }
}
