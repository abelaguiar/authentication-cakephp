<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;

class PermissionsController extends AppController
{
    public function initialize()
    {
        $this->loadModel('Roles');
        $this->loadModel('RolePermission');
    }

    public function index($roleId)
    {
        $role = $this->Roles->get($roleId, ['contain' => 'RolePermission.Permissions']);

        $permissions = $this->Permissions->find('all');

        $permissionAssigned = array_map(function ($item) {
            return $item->permission->id;
        }, $role->role_permission);

        $groupsPermission = [];

        foreach($permissions as $permission) {

            if (strpos($permission->slug, 'post')) {

                $groupsPermission['posts'][] = $permission;
            }

            if (strpos($permission->slug, 'categor')) {

                $groupsPermission['categories'][] = $permission;
            }
        }

        $rolePermission = $this->RolePermission->where('role_id', $role->id);

        dd($rolePermission);

        //$role = TableRegistry::get('RolePermission')->delete(['role_id', $role->id]);

        if ($this->request->is('post') && !empty($this->request->getData())) {

            $permissions = [];

            foreach ($this->request->getData()['permissions'] as $permission) {

                $permissions[] = ['role_id' => $role->id, 'permission_id' => $permission];
            }

            $rolePermission = $this->RolePermission->patchEntity(
                $this->RolePermission->newEntity(), 
                $permissions
            );

            $this->RolePermission->save($rolePermission);
        }

        $this->set(compact('role', 'groupsPermission', 'permissionAssigned'));
    }
}
