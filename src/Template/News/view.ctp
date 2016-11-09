<div class="news view large-9 medium-8 columns content">
    <legend><?= h($news->title) ?></legend>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title: ') ?></th>
            <td><?= h($news->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User: ') ?></th>
            <td><?= $news->has('user') ? $this->Html->link($news->user->id, ['controller' => 'Users', 'action' => 'view', $news->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category: ') ?></th>
            <td><?= $news->has('category') ? $this->Html->link($news->category->name, ['controller' => 'Categories', 'action' => 'view', $news->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active: ') ?></th>
            <td><?= $news->is_active ? __('Oui'):__('Non'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($news->content)); ?>
    </div>
    <legend>Comentaire</legend>

    <?php foreach ($com as $coms): ?>
        <div class="well">
        <p><?= $coms->content ?></p>
        <p><?= $coms->has('user') ? $this->Html->link($news->user->username, ['controller' => 'Users', 'action' => 'view', $news->user->id],['class'=>'pull-right']) : '' ?></p>
        </div>
    <?php endforeach;?>

    <div class="com"></div>
</div>
<script>
    $('.com').load('/coments/add/<?= $news->id ?>');
</script>
