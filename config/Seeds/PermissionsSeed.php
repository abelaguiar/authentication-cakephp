<?php

use Cake\ORM\TableRegistry;
use Migrations\AbstractSeed;

class PermissionsSeed extends AbstractSeed
{
    public function run()
    {
        $permission = TableRegistry::get('Permissions');

        if (is_null($permission->find()->first())) {

            $posts = $this->getPermissionsPost();
            $categories = $this->getPermissionsCategory();
            $users = $this->getPermissionsUsers();
            $roles = $this->getPermissionsRoles();
            $permissions = $this->getPermissions();

            $table = $this->table('permissions');

            $table->insert($posts)->save();
            $table->insert($categories)->save();
            $table->insert($users)->save();
            $table->insert($roles)->save();
            $table->insert($permissions)->save();
        }
    }

    public function getPermissionsPost()
    {
        return [
            [
                'name' => 'Listar Posts',
                'slug' => 'list-post',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
            [
                'name' => 'Cadastrar Post',
                'slug' => 'create-post',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
            [
                'name' => 'Editar Post',
                'slug' => 'edit-post',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
            [
                'name' => 'Excluir Post',
                'slug' => 'destroy-post',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
        ];
    }

    public function getPermissionsCategory()
    {
        return [
            [
                'name' => 'Listar Categorias',
                'slug' => 'list-category',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
            [
                'name' => 'Cadastrar Categoria',
                'slug' => 'create-category',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
            [
                'name' => 'Editar Categoria',
                'slug' => 'editar-category',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
            [
                'name' => 'Excluir Categoria',
                'slug' => 'excluir-category',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
        ];
    }

    public function getPermissionsUsers()
    {
        return [
            [
                'name' => 'Listar Usuários',
                'slug' => 'list-user',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
            [
                'name' => 'Cadastrar Usuário',
                'slug' => 'create-user',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
            [
                'name' => 'Editar Usuário',
                'slug' => 'edit-user',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
            [
                'name' => 'Excluir Usuário',
                'slug' => 'destroy-user',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
        ];
    }

    public function getPermissionsRoles()
    {
        return [
            [
                'name' => 'Listar Grupos',
                'slug' => 'list-role',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
            [
                'name' => 'Cadastrar Grupo',
                'slug' => 'create-role',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
            [
                'name' => 'Editar Grupo',
                'slug' => 'edit-role',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
            [
                'name' => 'Excluir Grupo',
                'slug' => 'destroy-role',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
        ];
    }

    public function getPermissions()
    {
        return [
            [
                'name' => 'Atribuir Permissões',
                'slug' => 'add-permission',
                'created' => $this->getDateTime(),
                'modified' => $this->getDateTime()
            ],
        ];
    }

    public function getDateTime()
    {
        $date = new \DateTime('NOW');

        return $date->format('Y-m-d H:i:s');
    }
}
