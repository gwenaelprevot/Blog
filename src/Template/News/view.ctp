
        <legend><?= h($news->title) ?>
            <?= $this->Html->link(__('Edit News'), ['action' => 'edit', $news->id],['class'=>'btn btn-striped-success'] )?>
            <?= $this->Form->postLink(__('Delete News'), ['action' => 'delete', $news->id], ['confirm' => __('Are you sure you want to delete # {0}?', $news->id),'class'=>'btn btn-striped-danger']) ?>
        </legend>
        <p><?= __('Titre: ') ?><?= h($news->title) ?></p>
        <p><?= __('Username: ') ?><?= $news->has('user') ? $this->Html->link($news->user->username, ['controller' => 'Users', 'action' => 'view', $news->user->id]) : '' ?></p>
        <p><?= __('Categorie: ') ?><?= $news->has('category') ? h($news->category->name) : '' ?></p>
        <p><?= __('Publier: ') ?><?= $this->Number->format($news->is_active) ?></p>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($news->content)); ?>
    </div>
        <style>
            .btn-striped-danger{
                border-left: solid 2px red;
                background-color: darkgrey;
                color: white;
                border-radius: 0px;
            }
            .btn-striped-danger:hover{
                background-color: grey;
            }
            .btn-striped-success{
                border-left: solid 2px #10ff00;
                background-color: darkgrey;
                color: white;
                border-radius: 0px;
            }
            .btn-striped-success:hover{
                background-color: grey;
            }

        </style>
