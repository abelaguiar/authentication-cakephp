<div class="card border-bottom-primary">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            Lista de Usuários
        </h6>
        <span class="pull-right">
            <?= $this->Html->link(__('New User'), ['action' => 'add']); ?>
        </span>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name'); ?></th>
                <th scope="col"><?= $this->Paginator->sort('email'); ?></th>
                <th scope="col"><?= $this->Paginator->sort('created'); ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified'); ?></th>
                <th scope="col" class="actions"><?= __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= h($user->name); ?></td>
                    <td><?= h($user->email); ?></td>
                    <td><?= h($user->created); ?></td>
                    <td><?= h($user->modified); ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]); ?> | 
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')); ?>
        <?= $this->Paginator->prev('< ' . __('previous')); ?>
        <?= $this->Paginator->numbers(); ?>
        <?= $this->Paginator->next(__('next') . ' >'); ?>
        <?= $this->Paginator->last(__('last') . ' >>'); ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]); ?></p>
</div>
