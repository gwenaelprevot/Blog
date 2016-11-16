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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">S'inscrire</button>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">S'inscrire</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    <script>$('.modal-body').load('/users/add')</script>
</div>