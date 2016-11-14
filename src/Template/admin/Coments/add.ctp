    <?= $this->Form->create($coment) ?>
    <fieldset>
        <legend><?= __('Ajouter Comentaire') ?></legend>
        <?php
            echo $this->Form->input('content',['class'=>'form-control','id'=>'trumbowyg-demo']);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-striped-primary pull-right']) ?>
    <?= $this->Form->end() ?>
