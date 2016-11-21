<div class="categories form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Ajouter Category') ?></legend>
        <?php
            echo $this->Form->input('name',['class'=>'form-control','label'=>'Name']);
            echo $this->Form->input('description',['class'=>'form-control','label'=>'Description']);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
