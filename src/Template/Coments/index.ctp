
<div class="coments index large-9 medium-8 columns content">
    <h3><?= __('Tout Mes Commentaire') ?></h3>
    <table class="table table-responsive">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('Numero') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Utilisateur') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Contenu') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Article') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($coments as $coment): ?>
            <tr>
                <td><?= $this->Number->format($coment->id) ?></td>
                <td><?= $coment->has('user') ? $coment->user->username : '' ?></td>
                <td><?= $coment->content?></td>
                <td><?= $coment->has('news') ? $this->Html->link($coment->news->title, ['controller' => 'News', 'action' => 'view', $coment->news->id]) : '' ?></td>
                <?php if ($coment->user_id === $this->request->session()->read('Auth')['User']['id'] ):?>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller'=>'news', 'action' => 'view', $coment->new_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $coment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coment->id)]) ?>
                    </td>
                <?php endif; ?>
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
