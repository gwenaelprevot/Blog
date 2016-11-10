<?php foreach ($news as $news): ?>
    <div class="jumbotron col-md-12 col-sm-12">
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
        <p><small><?= $news->has('category') ? $news->category->name :'' ?>
                    <?= $news->is_active ? __('Oui') : __('Non'); ?></small>
                    <?= $news->has('user') ? $news->user->username : '' ?></p>
        <p><a class="btn btn-primary btn-lg pull-right" href="<?= $this->Url->build(['action' => 'view', $news->id]) ?>" role="button">Lire Plus</a></p>
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
