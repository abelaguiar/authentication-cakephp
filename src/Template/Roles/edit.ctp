<?php $this->assign('pageTitle', 'Grupos'); ?>

<div class="card border-left-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            Atualizar Grupo
        </h6>
        <span class="pull-right">
            <?= $this->Html->link(__('Voltar'), ['action' => 'index']); ?>
        </span>
    </div>
    <?= $this->Form->create($role) ?>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'Nome']); ?>
                    </div>
                </div>
                <div class="col-3" style="margin-top: 38px;">
                    <div class="form-check">
                        <?= $this->Form->control('is_admin', ['class' => 'form-check-input', 'label' => 'É Administrador ?']); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <div class="form-group">
                        <?= $this->Form->control('description', ['class' => 'form-control', 'label' => 'Conteúdo']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Atualizar
            </button>
        </div>
    <?= $this->Form->end(); ?>
</div>
