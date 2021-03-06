<legend><?= h($news->title) ?>
    <?php if (!empty($this->request->session()->read('Auth'))): ?>
        <?php if ($this->request->session()->read('Auth')['User']['id'] === $news->user_id): ?>
            <?= $this->Html->link(__('Modifier News'), ['action' => 'edit', $news->id], ['class' => 'btn btn-striped-success']) ?>
            <?= $this->Form->postLink(__('Suprimer News'), ['action' => 'delete', $news->id], ['confirm' => __('Etes vous sur de vouloir la suprimer ?', $news->id), 'class' => 'btn btn-striped-danger']) ?>
        <?php endif; ?>
    <?php endif; ?>
</legend>
<p class="pull-right"><b><?= 'Categorie: ' ?></b><span
        class="label label-warning"><?= $news->has('category') ? h($news->category->name) : '' ?></span></p>
<div class="row">
    <?= $this->Text->autoParagraph($news->content); ?>
    <p class="pull-right">
        <b><?= 'Auteur: ' ?></b><span
            class="label label-success"> <?= $news->has('user') ? $news->user->username : '' ?></span>
    </p>
    <legend>Comentaire</legend>

    <?php foreach ($com as $coms): ?>
        <div class="well">
            <?php if (isset($this->request->session()->read('Auth')['User']['id'])): ?>
                <?php if ($coms->user_id === $this->request->session()->read('Auth')['User']['id']): ?>
                    <span id="edit-<?= $coms->id ?>" class="label btn-striped-success">edit</span>
                <?php endif; ?>
                <p><?= $this->Form->postLink(__(''), ['controller' => 'likes', 'action' => 'add', $coms->id, 'prefix' => false], ['class' => 'glyphicon glyphicon-heart pull-right like']) ?></p>
            <?php endif; ?>
            <p><?= $coms->content ?></p>
            <img src="/blog/webroot/upload/user/<?= $coms->has('user') ? $coms->user->avatar : '' ?>" class="avatar">
            <span class="label label-success">
                <?= $coms->has('user') ? $coms->user->username : '' ?>
            </span>
        </div>
        <div id="id-<?= $coms->id?>" class="edit-<?= $coms->id?>" style="display: none"></div>
        <script>
            $('#edit-<?= $coms->id?>').on('click',function () {
                $('.edit-<?= $coms->id?>').load('/blog/admin/Coments/edit/<?= $coms->id?>');
                $('#id-<?= $coms->id?>').toggle('show');
                setTimeout(explode, 2000);
            });

        </script>
    <?php endforeach; ?>

    <div class="com"></div>
</div>
<?= $this->Html->script('trumbowyg.min.js') ?>
<?= $this->Html->script('langs/fr.min.js') ?>
<?= $this->Html->css('trumbowyg.min.css') ?>
<script>
    $('.com').load('/blog/admin/Coments/add/<?= $news->id ?>');
</script>
<script>
    function explode() {
        $('.trumbowyg-demo').trumbowyg({
            lang: 'fr',
            btns: [
                ['formatting'],
                'btnGrp-semantic',
                ['link'],
                'btnGrp-justify',
                'btnGrp-lists',
                ['horizontalRule']
            ]
        });
        setTimeout(explode, 1000);
    }
    setTimeout(explode, 1000);
</script>