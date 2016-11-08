<div class="news form large-9 medium-8 columns content">
    <?= $this->Form->create($news) ?>
    <fieldset>
        <legend><?= __('Add News') ?></legend>
        <?php
            echo $this->Form->input('title',['class'=>'form-control','label'=>'Titre']);
            echo $this->Form->input('content',['class'=>'form-control','label'=>'Contenu']);
            echo $this->Form->input('categorie_id',['class'=>'form-control','label'=>'Categorie']);
            echo $this->Form->input('is_active',['type'=>'checkbox','class'=>'checkbox','label'=>'Publier']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Envoyer'),['class'=>' btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
