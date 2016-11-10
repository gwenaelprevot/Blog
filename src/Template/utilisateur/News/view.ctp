<?php if (!empty($this->request->session()->read('Auth'))): ?>
    <?php if ($this->request->session()->read('Auth')['User']['id'] === $news->user_id): ?>
        <legend><?= h($news->title) ?>
            <?= $this->Html->link(__('Edit News'), ['action' => 'edit', $news->id], ['class' => 'btn btn-striped-success']) ?>
            <?= $this->Form->postLink(__('Delete News'), ['action' => 'delete', $news->id], ['confirm' => __('Are you sure you want to delete # {0}?', $news->id), 'class' => 'btn btn-striped-danger']) ?>
        </legend>
    <?php endif; ?>
<?php endif; ?>
<p><b><?= 'Titre: ' ?></b><?= h($news->title) ?></p>
<p>
    <b><?= 'Username: ' ?></b><?= $news->has('user') ? $this->Html->link($news->user->username, ['controller' => 'Users', 'action' => 'view', $news->user->id]) : '' ?>
</p>
<p><b><?= 'Categorie: ' ?></b><?= $news->has('category') ? h($news->category->name) : '' ?></p>
<hr>
<div class="row">
    <h4><b><?= __('Content') ?></b></h4>
    <?= $this->Text->autoParagraph(h($news->content)); ?>

    <legend>Comentaire</legend>

    <?php foreach ($com as $coms): ?>
        <div class="well">
            <p><?= $coms->content ?></p>
            <p><?= $coms->has('user') ? $this->Html->link($news->user->username, ['controller' => 'Users', 'action' => 'view', $news->user->id], ['class' => 'pull-right']) : '' ?></p>
        </div>
    <?php endforeach; ?>

    <div class="com"></div>
</div>
<script>
    $('.com').load('/admin/coments/add/<?= $news->id ?>');
</script>