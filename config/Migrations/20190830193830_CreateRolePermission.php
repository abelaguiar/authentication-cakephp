<?php

use Migrations\AbstractMigration;

class CreateRolePermission extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('role_permission');

        $table->addColumn('role_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ])
        ->addIndex(['role_id'])
        ->addForeignKey('role_id', 'roles', ['id'], 
            ['delete' => 'SET_NULL', 'update' => 'NO_ACTION']
        );

        $table->addColumn('permission_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ])
        ->addIndex(['permission_id'])
        ->addForeignKey('permission_id', 'permissions', ['id'], 
            ['delete' => 'SET_NULL', 'update' => 'NO_ACTION']
        );;

        $table->create();
    }
}
