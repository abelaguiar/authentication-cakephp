<div class="card border-left-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            Cadastrar Post
        </h6>
        <span class="pull-right">
            <?= $this->Html->link(__('Voltar'), ['action' => 'index']); ?>
        </span>
    </div>
    <?= $this->Form->create($post, ['enctype' => 'multipart/form-data']); ?>
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <?= $this->Form->control('title', ['class' => 'form-control', 'label' => 'Título']); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <?= $this->Form->control('category_id', ['class' => 'form-control', 'options' => $categories, 'label' => 'Categoria']); ?>
                    </div>
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <?= $this->Form->control('content', ['class' => 'form-control', 'label' => 'Conteúdo']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Cadastrar
            </button>
        </div>
    <?= $this->Form->end(); ?>
</div>
