<?php

use Migrations\AbstractMigration;

class CreateUserPermission extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('user_permission');

        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ])
        ->addIndex(['user_id'])
        ->addForeignKey('user_id', 'users', ['id'], 
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
        );

        $table->create();
    }
}
