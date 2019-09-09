<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;

class PermissionsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Roles');
        $this->loadModel('RolePermission');
    }

    public function index($roleId)
    {
        $role = $this->Roles->get($roleId, ['contain' => 'RolePermission.Permissions']);

        $permissions = $this->Permissions->find('all');

        $groupsPermission = [];

        foreach($permissions as $permission) {

            if (strpos($permission->slug, 'post')) {

                $groupsPermission['posts'][] = $permission;
            }

            if (strpos($permission->slug, 'categor')) {

                $groupsPermission['categories'][] = $permission;
            }
        }

        $permissionAssigned = array_map(function ($item) {
            return $item->permission->id;
        }, $role->role_permission);

        $this->set(compact('role', 'groupsPermission', 'permissionAssigned'));
    }

    public function save($roleId)
    {
        if ($this->request->is('post') && !empty($this->request->getData())) {

            $rolePermission = $this->RolePermission->query()
                ->delete()
                ->where(['role_id' => $roleId])
                ->execute();

            foreach ($this->request->getData()['permissions'] as $permissionId) {

                $newPermission = ['role_id' => $roleId, 'permission_id' => $permissionId];

                $rolePermission = $this->RolePermission->patchEntity(
                    $this->RolePermission->newEntity(), 
                    $newPermission
                );
    
                $this->RolePermission->save($rolePermission);
            }

            $this->Flash->success(__('Permissões foram atribuídas.'));
        }

        return $this->redirect(['_name' => 'permissions.roles', $roleId]);
    }
}
