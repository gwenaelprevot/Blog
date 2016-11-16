<ul class="tags">
    <li><?= $this->Html->link(__('Tout'),['action'=>'index'],['class'=>'tag'] )?></li>
    <?php foreach ($category as $categorie):?>
        <li><?= $this->Html->link(__($categorie->name),['action'=>'index',$categorie->id],['class'=>'tag'] )?></li>
    <?php endforeach; ?>
</ul>
<hr>
<?php foreach ($new as $news): ?>
    <div class="jumbotron col-md-12 col-sm-12" style="display: none">
        <p class="label label-primary"><small><span class="glyphicon glyphicon-comment"></span> <?= count($news->coments) ?></small></p>
        <p class="pull-right label label-warning category"><small><?= $news->has('category') ? $news->category->name : ''; ?></small></p>
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
        <p><a class="btn btn-striped-primary btn-lg pull-right" href="<?= $this->Url->build(['action' => 'view', $news->id]) ?>" role="button">Lire Plus</a></p>
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function () {
        $( ".jumbotron" ).show('fade',1000 );
    })
</script>