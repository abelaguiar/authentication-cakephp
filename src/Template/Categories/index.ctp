<div class="card border-left-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            Lista de Categorias
        </h6>
        <div class="dropdown no-arrow">
            <?= $this->Html->link(__('Cadastrar'), ['action' => 'add']); ?>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name', 'Nome'); ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', 'Criado'); ?></th>
                <th scope="col"><?= $this->Paginator->sort('midified', 'Alterado'); ?></th>
                <th scope="col" class="actions"><?= __('Ações'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= h($category->name); ?></td>
                <td><?= h($category->created->format('d/m/Y')); ?></td>
                <td><?= h($category->modified->format('d/m/Y')); ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $category->id]); ?> |
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $category->id]); ?> | 
                    <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]); ?>
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
