<div class="card border-left-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            Ver Categoria
        </h6>
        <div class="dropdown no-arrow">
            <?= $this->Html->link(__('Voltar'), ['action' => 'index']); ?>
        </div>
    </div>
    <div class="categories view large-9 medium-8 columns content">
        <table class="table vertical-table">
            <tr>
                <th scope="row">Nome</th>
                <td><?= h($category->name); ?></td>
            </tr>
            <tr>
                <th scope="row">Criado</th>
                <td><?= h($category->created->format('d/m/Y')); ?></td>
            </tr>
            <tr>
                <th scope="row">Alterado</th>
                <td><?= h($category->modified->format('d/m/Y')); ?></td>
            </tr>
        </table>
    </div>
</div>

<div class="card mt-3 border-left-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            Posts Atrelados
        </h6>
    </div>
    <?php if (!empty($category->posts)): ?>
        <table class="table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Criado</th>
                <th scope="col" class="actions">Ações</th>
            </tr>
            <?php foreach ($category->posts as $posts): ?>
            <tr>
                <td><?= h($posts->title); ?></td>
                <td><?= h($posts->created->format('d/m/Y')); ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Posts', 'action' => 'view', $posts->id]); ?> | 
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]); ?> | 
                    <?= $this->Form->postLink(__('Excluir'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>