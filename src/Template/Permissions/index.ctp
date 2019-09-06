<?php $this->assign('pageTitle', 'Permissões do Grupo: ' . $role->name); ?>

<div class="card border-left-primary">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">
            Adicionar Permissões
        </h6>
        <span class="pull-right">
            <?= $this->Html->link(__('Voltar'), ['controller' => '', 'action' => 'index']); ?>
        </span>
    </div>
    <div class="card-body">
        <div class="alert alert-primary">
            <i class="fa fa-info-circle"></i> Cada bloco de menu tem uma lista de itens.
            <p>
                <b>Obs:</b> 
                Para tirar ou colocar permissões de um grupo, 
                selecione os checkboxs que deseja aplicar a permissão, 
                após isso, aperte em adicionar permissão, para assim aplicar as permissões.
            </p>
        </div>
        <?= $this->Form->create(null) ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <a href="#post" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="post">
                            <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
                        </a>
                        <div class="collapse" id="post" style="">
                            <div class="card-body">
                                <?php foreach ($groupsPermission['posts'] as $permission): ?>
                                    <div class="form-check">
                                        <input 
                                            name="permissions[]" 
                                            class="form-check-input" 
                                            type="checkbox" 
                                            value="<?= $permission->id; ?>" 
                                            id="check-<?= $permission->id; ?>"
                                            <?= in_array($permission->id, $permissionAssigned) ? 'checked' : ''; ?>
                                        >
                                        <label class="form-check-label" for="check-<?= $permission->id; ?>">
                                            <?= $permission->name; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <a href="#category" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="category">
                            <h6 class="m-0 font-weight-bold text-primary">Categorias</h6>
                        </a>
                        <div class="collapse" id="category" style="">
                            <div class="card-body">
                                <?php foreach ($groupsPermission['categories'] as $permission): ?>
                                    <div class="form-check">
                                        <input 
                                            name="permissions[]" 
                                            class="form-check-input" 
                                            type="checkbox" 
                                            value="<?= $permission->id; ?>" 
                                            id="check-<?= $permission->id; ?>"
                                            <?= in_array($permission->id, $permissionAssigned) ? 'checked' : ''; ?>
                                        >
                                        <label class="form-check-label" for="check-<?= $permission->id; ?>">
                                            <?= $permission->name; ?>
                                        </label>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Adicionar Permisssões</span>
            </button>
        <?= $this->Form->end() ?>
    </div>
</div>
