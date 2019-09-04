<?php

use Migrations\AbstractSeed;

class PermissionsSeed extends AbstractSeed
{
    public function run()
    {
        $data = [];

        $table = $this->table('permissions');
        $table->insert($data)->save();
    }
}
