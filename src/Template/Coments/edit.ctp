<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $coment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $coment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Coments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New News'), ['controller' => 'News', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="coments form large-9 medium-8 columns content">
    <?= $this->Form->create($coment) ?>
    <fieldset>
        <legend><?= __('Edit Coment') ?></legend>
        <?php
            echo $this->Form->input('content');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('new_id', ['options' => $news]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
