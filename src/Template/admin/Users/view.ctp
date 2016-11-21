<legend>
    <?= h($user->id) ?>
    <?= $this->Html->link(__('Modifier utilisateur'), ['action' => 'edit', $user->id],['class'=>'btn btn-striped-success']) ?>
    <?= $this->Form->postLink(__('Suprimer l\'utilisateur'), ['action' => 'delete', $user->id], ['confirm' => __('Etes vous sur de vouloir la suprimer ?'),'class'=>'btn btn-striped-danger']) ?>
</legend>
<div class="row">
    <div class="container" style="text-align: center;">
    <img src="/blog/webroot/upload/user/<?= h($user->avatar) ?>" class="col-md-4 col-sm-4 col-xs-4">
        <p>
            <b><?= __('Id') ?></b>
            <?= $this->Number->format($user->id) ?>
        </p>
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
        <p>
            <b><?= __('Admin') ?></b>
            <?= $user->is_admin ? __('Oui') : __('Non'); ?>
        </p>
    </div>
</div>
