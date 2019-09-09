<?php $this->assign('pageTitle', 'Grupos'); ?>

<div class="card border-left-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            Ver Grupo
        </h6>
        <div class="dropdown no-arrow">
            <?= $this->Html->link(__('Voltar'), ['action' => 'index']); ?>
        </div>
    </div>
    <div class="roles view large-9 medium-8 columns content">
        <table class="table vertical-table">
            <tr>
                <th scope="row">Nome</th>
                <td><?= h($role->name) ?></td>
            </tr>
            <tr>
                <th scope="row">Criado</th>
                <td><?= h($role->created->format('d/m/Y')) ?></td>
            </tr>
            <tr>
                <th scope="row">Alterado</th>
                <td><?= h($role->modified->format('d/m/Y')) ?></td>
            </tr>
        </table>
        <div class="row-fluid ml-2">
            <h4>Descrição</h4>
            <?= $this->Text->autoParagraph(h($role->description)); ?>
        </div>
    </div>
</div>

<?php if (!empty($role->users)): ?>
    <div class="card border-left-primary mt-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                Ver Usuários Associado
            </h6>
        </div>
        <table class="table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Criado</th>
                <th scope="col">Alterado</th>
                <th scope="col" class="actions">Actions</th>
            </tr>
            <?php foreach ($role->users as $users): ?>
            <tr>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= $users->created->format('d/m/Y') ?></td>
                <td><?= $users->modified->format('d/m/Y') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?> | 
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?> | 
                    <?= $this->Form->postLink(__('Excluir'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>