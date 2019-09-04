<?php

use Migrations\AbstractSeed;

class DatabaseSeed extends AbstractSeed
{
    public function run()
    {
        $this->call('RolesSeed');
        $this->call('UsersSeed');
        $this->call('PermissionsSeed');
    }
}
