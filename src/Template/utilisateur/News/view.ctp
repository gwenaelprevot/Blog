<?php if (!empty($this->request->session()->read('Auth'))): ?>
    <?php if ($this->request->session()->read('Auth')['User']['id'] === $news->user_id): ?>
        <legend><?= h($news->title) ?>
            <?= $this->Html->link(__('Edit News'), ['action' => 'edit', $news->id], ['class' => 'btn btn-striped-success']) ?>
            <?= $this->Form->postLink(__('Delete News'), ['action' => 'delete', $news->id], ['confirm' => __('Are you sure you want to delete # {0}?', $news->id), 'class' => 'btn btn-striped-danger']) ?>
        </legend>
    <?php endif; ?>
<?php endif; ?>
<h2><?= h($news->title) ?></h2>
<p class="pull-right"><b><?= 'Categorie: ' ?></b><span class="label label-warning"><?= $news->has('category') ? h($news->category->name) : '' ?></span></p>
<hr>
<div class="row">
    <?= $this->Text->autoParagraph(h($news->content)); ?>
    <p class="pull-right">
        <b><?= 'Auteur: ' ?></b><span class="label label-success"> <?= $news->has('user') ? $news->user->username : '' ?></span>
    </p>
    <legend>Comentaire</legend>

    <?php foreach ($com as $coms): ?>
        <div class="well">
            <p><?= $this->Form->postLink(__(''), ['controller' => 'likes', 'action' => 'add', $coms->id,'prefix'=>false], ['class' => 'glyphicon glyphicon-heart pull-right like']) ?></p>
            <p><?= $coms->content ?></p>
            <span class="label label-success">
                <?= $coms->has('user') ? $coms->user->username : '' ?>
            </span>
        </div>

    <?php endforeach; ?>

    <div class="com"></div>
</div>
<?= $this->Html->script('trumbowyg.min.js') ?>
<?= $this->Html->script('langs/fr.min.js') ?>
<?= $this->Html->css('trumbowyg.min.css') ?>
<script>
    $('.com').load('/utilisateur/coments/add/<?= $news->id ?>');

    function explode() {
        $('#trumbowyg-demo').trumbowyg({
            lang: 'fr',
            btns: [
                ['formatting'],
                'btnGrp-semantic',
                ['link'],
                'btnGrp-justify',
                'btnGrp-lists',
                ['horizontalRule']
            ]
        })
    }
    setTimeout(explode, 1000);
</script>