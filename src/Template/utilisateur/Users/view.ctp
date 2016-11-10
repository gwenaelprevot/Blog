<legend>
    <?= h($user->id) ?>
    <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id],['class'=>'btn btn-striped-success']) ?>
    <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id),'class'=>'btn btn-striped-danger']) ?>
</legend>
<div class="row">
    <div class="container" style="text-align: center;">
        <img src="/upload/user/<?= h($user->avatar) ?>" class="col-md-4">
        <p>
            <b><?= __('Firstname') ?></b>
            <?= h($user->firstname) ?>
        </p>
        <p>
            <b><?= __('Lastname') ?></b>
            <?= h($user->lastname) ?>
        </p>
        <p>
            <b><?= __('Mail') ?></b>
            <?= h($user->mail) ?>
        </p>
        <p>
            <b><?= __('Id') ?></b>
            <?= $this->Number->format($user->id) ?>
        </p>
    </div>
</div>
