<?php $this->assign('pageTitle', 'Posts'); ?>

<div class="card border-left-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            Ver Post
        </h6>
        <div class="dropdown no-arrow">
            <?= $this->Html->link(__('Voltar'), ['action' => 'index']); ?>
        </div>
    </div>
    <div class="posts view large-9 medium-8 columns content">
        <table class="table vertical-table">
            <tr>
                <th scope="row">Título</th>
                <td><?= h($post->title) ?></td>
            </tr>
            <tr>
                <th scope="row">Categoria</th>
                <td><?= $post->has('category') ? $this->Html->link($post->category->name, ['controller' => 'Categories', 'action' => 'view', $post->category->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row">Criado</th>
                <td><?= h($post->created->format('d/m/Y')) ?></td>
            </tr>
            <tr>
                <th scope="row">Alterado</th>
                <td><?= h($post->modified->format('d/m/Y')) ?></td>
            </tr>
        </table>
        <div class="row-flow ml-2">
            <h4>Conteúdo</h4>
            <?= $this->Text->autoParagraph(h($post->content)); ?>
        </div>
    </div>
</div>
