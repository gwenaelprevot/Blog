<legend><?= __('Ajout Utilisateur ') ?><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $user->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $user->id),'class'=>'btn btn-striped-danger']
    )
    ?>
</legend>
<div class="news form large-9 medium-8 columns content">
    <?= $this->Form->create($user,['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <?php
        echo $this->Form->input('firstname',['class'=>'form-control','label'=>'Prenom']);
        echo $this->Form->input('lastname',['class'=>'form-control','label'=>'Nom']);
        echo $this->Form->input('username',['class'=>'form-control','label'=>'Pseudo']);
        echo $this->Form->input('is_admin',['class'=>'checkbox','label'=>'Admin']);
        echo $this->Form->input('password',['class'=>'form-control','label'=>'Mot de pass']);
        echo $this->Form->input('avatar',['label'=>'Avatar','type'=>'file' ]);
        ?>
        <div id="image-holder"></div>
        <?php
        echo $this->Form->input('mail',['class'=>'form-control','label'=>'Email']);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
<style>
    img{
        margin: 10px;
        width:130px;
        height: 130px;
        border: dotted 2px black;
    }
</style>
<script>
    $(document).ready(function() {
        $("#avatar").on('change', function() {
            //Get count of selected files
            if (typeof (FileReader) != "undefined") {

                var image_holder = $("#image-holder");
                image_holder.empty();

                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image"
                    }).appendTo(image_holder);

                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }
        });
    });
</script>