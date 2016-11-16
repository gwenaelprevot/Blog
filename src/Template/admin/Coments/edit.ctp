<div class="coments form large-9 medium-8 columns content">
    <?= $this->Form->create($coment) ?>
    <fieldset>
        <?php
            echo $this->Form->input('content',['class'=>'form-control','label'=>'Edit','id'=>'trumbowyg-demo']);
            echo $this->Form->hidden('user_id', ['options' => $users,'class'=>'hidden']);
            echo $this->Form->hidden('new_id', ['options' => $news,'class'=>'hidden']);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-striped-primary']) ?>
    <?= $this->Form->end() ?>
</div>
<script>
    function explode() {
        $('#trumbowyg-demo').trumbowyg({
            lang: 'fr',
            btns: [
                ['formatting'],
                'btnGrp-semantic',
                ['link'],
                'btnGrp-justify',
                'btnGrp-lists',
                ['horizontalRule']
            ]
        })
    }
    setTimeout(explode, 1000);
</script>