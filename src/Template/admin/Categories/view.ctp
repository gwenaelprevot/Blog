<legend><?= h($category->name) ?>
    <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id],['class'=>'btn btn-striped-success']) ?>
    <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id),'class'=>'btn btn-striped-danger']) ?>
</legend>
<div class="categories view large-9 medium-8 columns content">
        <p>
            <b><?= __('Name: ') ?></b>
            <?= h($category->name) ?>
        </p>
        <p>
            <b><?= __('Id: ') ?></b>
            <?= $this->Number->format($category->id) ?>
        </p>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($category->description)); ?>
    </div>
</div>
