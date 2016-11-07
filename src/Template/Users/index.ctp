<div class="row">
    <?php foreach ($users as $user): ?>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="<?= h($user->avatar) ?>" alt="...">
            <div class="caption">
                <h3><?= h($user->firstname) ?> <?= h($user->lastname) ?></h3>
                <p>Mail: <?= h($user->mail) ?></p>
                <p><?= $this->Html->link(__('View'), ['controller'=>'Users','action' => 'view', $user->id],['class'=>'btn btn-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller'=>'Users','action' => 'edit', $user->id],['class'=>'btn btn-success']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller'=>'users','action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id),'class'=>'btn btn-danger']) ?></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>