    <?= $this->Form->create($coment) ?>
    <fieldset>
        <legend><?= __('Ajouter Comentaire') ?></legend>
        <?php
            echo $this->Form->input('content',['class'=>'form-control','id'=>'trumbowyg-demo2']);
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-striped-primary pull-right']) ?>
    <?= $this->Form->end() ?>

    <script>
        function explode() {
            $('#trumbowyg-demo2').trumbowyg({
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
