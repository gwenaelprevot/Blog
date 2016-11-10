<div class="panel panel-info">
    <div class="panel-heading"><div class="panel-title"><?= __("Merci de rentrer vos nom d'utilisateur et mot de passe",['class'=>'form-signin-heading']) ?></div>
    </div>
<div class="panel-body">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create('User') ?>
    <fieldset>
        <?= $this->Form->input('username',['class'=>'form-control']) ?>
        <?= $this->Form->input('password',['class'=>'form-control']) ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Se Connecter'),['class'=>'btn btn-primary pull-right']); ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link("S'inscrire",['controller'=>'users','action'=>'add'],['class'=>'btn btn-primary']); ?>
</div>
</div>