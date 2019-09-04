<div class="card border-left-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            Atualizar Usuário
        </h6>
        <span class="pull-right">
            <?= $this->Html->link(__('Voltar'), ['action' => 'index']); ?>
        </span>
    </div>
    <?= $this->Form->create($user); ?>
        <div class="card-body">
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <?= $this->Form->control('name', ['class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <?= $this->Form->control('email', ['class' => 'form-control']); ?>
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
