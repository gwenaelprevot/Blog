<?php foreach ($news as $news): ?>
<div class="jumbotron col-md-6 col-sm-12">
    <h1><?= h($news->title) ?></h1>
    <p><?= h($news->content) ?></p>
    <p><small><?= $this->Number->format($news->categorie_id) ?></small>
    <small><?= $this->Number->format($news->is_active) ?></small></p>
    <p><a class="btn btn-primary btn-lg" href="<?= $this->Url->build(['action' => 'view', $news->id]) ?>" role="button">Lire Plus</a></p>
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
