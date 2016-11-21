<legend><?= __('Edit News ') ?><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $news->id],
        ['confirm' => __('Etes vous sur de vouloir la suprimer ?', $news->id),'class'=>'btn btn-striped-danger']
    )
    ?></legend>
<?= $this->Form->create($news) ?>
<fieldset>
    <?php
    echo $this->Form->input('title',['class'=>'form-control','label'=>'Titre']);
    echo $this->Form->input('content',['class'=>'form-control','label'=>'Contenu','id'=>'trumbowyg-demo']);
    echo $this->Form->input('categorie_id',['class'=>'form-control','label'=>'Categorie']);
    echo $this->Form->input('is_active',['type'=>'checkbox','class'=>'checkbox','label'=>'Publier']);
    ?>
</fieldset>
<?= $this->Form->button(__('Envoyer'),['class'=>' btn btn-primary pull-right']) ?>
<?= $this->Form->end() ?>
<?= $this->Html->script('trumbowyg.min.js') ?>
<?= $this->Html->script('langs/fr.min.js') ?>
<?= $this->Html->css('trumbowyg.min.css') ?>
<script>
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
