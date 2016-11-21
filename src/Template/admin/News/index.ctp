<div class="news index large-9 medium-8 columns content">
    <h3><?= __('Article') ?></h3>
    <table class="table table-inverse">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Numero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Titre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Utilisateur') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Categorie') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Nombres de Comentaires') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Publier') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $news): ?>
            <tr>
                <td><?= $this->Number->format($news->id) ?></td>
                <td><?= h($news->title) ?></td>
                <td><?= $news->has('user') ? $this->Html->link($news->user->username, ['controller' => 'Users', 'action' => 'view', $news->user->id]) : '' ?></td>
                <td><?= $news->has('category') ? $this->Html->link($news->category->name, ['controller' => 'Category', 'action' => 'view', $news->category->id]) : '' ?></td>
                <td><?= count($news->coments) ?></td>
                <td><?= $news->is_active ? __('Oui'):__('Non') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $news->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $news->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $news->id], ['confirm' => __('Etes vous sur de vouloir la suprimer ?', $news->id)]) ?>
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
