<legend>
    <?= h($user->id) ?>
    <?= $this->Html->link(__('Ce Modifier'), ['action' => 'edit', $user->id],['class'=>'btn btn-striped-success']) ?>
    <?= $this->Form->postLink(__('Ce désinscrire'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id),'class'=>'btn btn-striped-danger']) ?>
</legend>
<div class="row">
    <div class="container" style="text-align: center;">
        <img src="/blog/webroot/upload/user/<?= h($user->avatar) ?>" class="col-md-4">
        <p>
            <b><?= __('Prenom') ?></b>
            <?= h($user->firstname) ?>
        </p>
        <p>
            <b><?= __('Nom') ?></b>
            <?= h($user->lastname) ?>
        </p>
        <p>
            <b><?= __('@Mail') ?></b>
            <?= h($user->mail) ?>
        </p>
    </div>
</div>
