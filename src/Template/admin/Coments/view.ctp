<div class="coments view large-9 medium-8 columns content">
    <legend>Numero # <?= h($coment->id) ?></legend>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $coment->has('user') ? $this->Html->link($coment->user->username, ['controller' => 'Users', 'action' => 'view', $coment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('News') ?></th>
            <td><?= $coment->has('news') ? $this->Html->link($coment->news->title, ['controller' => 'News', 'action' => 'view', $coment->news->id]) : '' ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($coment->content)); ?>
    </div>
</div>
