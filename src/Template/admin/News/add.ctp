<div class="news form large-9 medium-8 columns content">
    <?= $this->Form->create($news) ?>
    <fieldset>
        <legend><?= __('Ajouter News') ?></legend>
        <?php
        echo $this->Form->input('title',['class'=>'form-control','label'=>'Titre']);
        echo $this->Form->input('content',['class'=>'form-control','label'=>'Contenu','id'=>'trumbowyg-demo']);
        echo $this->Form->input('categorie_id',['class'=>'form-control','label'=>'Categorie']);
        echo $this->Form->input('is_active',['type'=>'checkbox','class'=>'checkbox','label'=>'Publier']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Envoyer'),['class'=>' btn btn-striped-primary pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
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