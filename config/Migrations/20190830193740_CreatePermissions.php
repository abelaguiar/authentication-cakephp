<?php

use Migrations\AbstractMigration;

class CreatePermissions extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('permissions');
 
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
 
        $table->addColumn('slug', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
 
        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => true,
        ]);
 
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
 
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
 
        $table->create();
    }
}
