<div class="news index large-9 medium-8 columns content">
    <h3><?= __('News') ?></h3>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categorie_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $news): ?>
            <tr>
                <td><?= $this->Number->format($news->id) ?></td>
                <td><?= h($news->title) ?></td>
                <td><?= $news->has('user') ? $this->Html->link($news->user->username, ['controller' => 'Users', 'action' => 'view', $news->user->id]) : '' ?></td>
                <td><?= $news->has('category') ? $this->Html->link($news->category->name, ['controller' => 'Categories', 'action' => 'view', $news->category->id]) : '' ?></td>
                <td><?= $news->is_active ? __('Oui'):__('Non') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $news->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $news->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $news->id], ['confirm' => __('Are you sure you want to delete # {0}?', $news->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
