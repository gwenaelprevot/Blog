<legend><?= __('Modifier Category') ?>
    <?= $this->Form->postLink(
        __('Suprimer'),
        ['action' => 'delete', $category->id],
        ['confirm' => __('Etes vous sur de vouloir la suprimer ?', $category->id),
            'class'=>'btn btn-striped-danger']
    )
    ?>
</legend>
<div class="categories form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>

        <?php
        echo $this->Form->input('name',['class'=>'form-control','label'=>'Name']);
        echo $this->Form->input('description',['class'=>'form-control','label'=>'Description']);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary pull-right']) ?>
    <?= $this->Form->end() ?>
</div>

