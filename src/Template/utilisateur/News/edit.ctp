<legend><?= __('Edit News ') ?><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $news->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $news->id),'class'=>'btn btn-striped-danger']
    )
    ?></legend>
<?= $this->Form->create($news) ?>
    <fieldset>
        <?php
        echo $this->Form->input('title',['class'=>'form-control','label'=>'Titre']);
        echo $this->Form->input('content',['class'=>'form-control','label'=>'Contenu']);
        echo $this->Form->input('categorie_id',['class'=>'form-control','label'=>'Categorie']);
        echo $this->Form->input('is_active',['type'=>'checkbox','class'=>'checkbox','label'=>'Publier']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Envoyer'),['class'=>' btn btn-primary pull-right']) ?>
    <?= $this->Form->end() ?>