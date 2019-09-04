<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission $permission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Permission'), ['action' => 'edit', $permission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Permission'), ['action' => 'delete', $permission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Permissions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Role Permission'), ['controller' => 'RolePermission', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role Permission'), ['controller' => 'RolePermission', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Permission'), ['controller' => 'UserPermission', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Permission'), ['controller' => 'UserPermission', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="permissions view large-9 medium-8 columns content">
    <h3><?= h($permission->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($permission->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($permission->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($permission->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($permission->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($permission->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($permission->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Role Permission') ?></h4>
        <?php if (!empty($permission->role_permission)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Permission Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($permission->role_permission as $rolePermission): ?>
            <tr>
                <td><?= h($rolePermission->id) ?></td>
                <td><?= h($rolePermission->role_id) ?></td>
                <td><?= h($rolePermission->permission_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RolePermission', 'action' => 'view', $rolePermission->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RolePermission', 'action' => 'edit', $rolePermission->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RolePermission', 'action' => 'delete', $rolePermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rolePermission->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Permission') ?></h4>
        <?php if (!empty($permission->user_permission)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Permission Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($permission->user_permission as $userPermission): ?>
            <tr>
                <td><?= h($userPermission->id) ?></td>
                <td><?= h($userPermission->user_id) ?></td>
                <td><?= h($userPermission->permission_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserPermission', 'action' => 'view', $userPermission->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserPermission', 'action' => 'edit', $userPermission->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserPermission', 'action' => 'delete', $userPermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userPermission->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
