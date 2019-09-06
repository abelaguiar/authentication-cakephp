<?php $this->assign('pageTitle', 'Grupos'); ?>

<div class="card border-left-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            Lista de Grupos
        </h6>
        <div class="dropdown no-arrow">
            <?= $this->Html->link(__('Cadastrar'), ['action' => 'add']); ?>
        </div>
    </div>
    <table class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name', 'Nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', 'Criado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', 'Alterado') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role): ?>
            <tr>
                <td><?= h($role->name) ?></td>
                <td><?= $role->created->format('d/m/Y') ?></td>
                <td><?= $role->modified->format('d/m/Y') ?></td>
                <td class="actions">
                    <a href="/roles/<?= $role->id; ?>/permissions">
                        Permissões
                    </a> | 
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $role->id]) ?> | 
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $role->id]) ?> | 
                    <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="py-3 d-flex flex-row align-items-center justify-content-between">
    <ul class="pagination">
        <?= $this->Paginator->prev('&laquo; Anterior', ['escape' => false]); ?>
        <?= $this->Paginator->numbers(['escape' => false]); ?>
        <?= $this->Paginator->next('Próximo &raquo;', ['escape' => false, 'class' => 'disabled']); ?>
    </ul>
    <p><?= $this->Paginator->counter('Página {{page}} de {{pages}} | Total de Registros: {{count}}'); ?></p>
</div>
