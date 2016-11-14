<?php foreach ($new as $news): ?>

    <?php
    $c = 0;
    foreach ($news->user as $user): ?>
        <?= $user->id ?>
        <?php foreach ($user->coment as $coments):$c++; ?>
            <?= $coments->id . 'a' ?>

        <?php endforeach; ?>
    <?php endforeach; ?>
    <div class="jumbotron col-md-12 col-sm-12">

        <p class="pull-right label label-warning">
            <small><?= $news->has('category') ? $news->category->name : ''; ?></small>
        </p>
        <h1><?= h($news->title) ?></h1>
        <p><?=
            $this->Text->truncate(
                $news->content,
                200,
                [
                    'ellipsis' => '...',
                    'exact' => false
                ]
            ); ?></p>
        <b>Auteur :</b>
        <small class="label label-success"><?= $news->has('user') ? $news->user->username : '' ?></small>
        <p><a class="btn btn-striped-primary btn-lg pull-right"
              href="<?= $this->Url->build(['action' => 'view', $news->id]) ?>" role="button">Lire Plus</a></p>
    </div>
<?php endforeach; ?>
<div class="row">
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
