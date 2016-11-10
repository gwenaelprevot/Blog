    <?= $this->Form->create($coment) ?>
    <fieldset>
        <legend><?= __('Add Coment') ?></legend>
        <?php
            echo $this->Form->input('content',['class'=>'form-control']);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary pull-right']) ?>
    <?= $this->Form->end() ?>
