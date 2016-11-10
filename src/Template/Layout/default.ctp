<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <script
        src="https://code.jquery.com/jquery-3.1.1.js"
        integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
        crossorigin="anonymous"></script>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('bootstrap-theme.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('html5.image.preview.min') ?>
    <?= $this->Html->script('jquery.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


</head>
<body style="padding-top: 70px;" }>
<?php $prefix = 'utilisateur' ?>
<?php if (!empty($this->request->session()->read('Auth'))): ?>
    <?php if ($this->request->session()->read('Auth')['User']['is_admin'] === true): ?>
        <?php $prefix = 'admin' ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" data-topbar role="navigation">
        <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">News <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><?= $this->Html->link('News',['controller'=>'news','action'=>'index','prefix'=> $prefix ]) ?></li>
                    <li><?= $this->Html->link('Ajouter News',['controller'=>'news','action'=>'add','prefix'=> $prefix]) ?></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utilisateur <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><?= $this->Html->link('Utilisateur',['controller'=>'users','action'=>'index','prefix'=> $prefix]) ?></li>
                    <li><?= $this->Html->link('Ajouter Utilisateur',['controller'=>'users','action'=>'add','prefix'=> $prefix]) ?></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><?= $this->Html->link('Category',['controller'=>'categories','action'=>'index','prefix'=> $prefix]) ?></li>
                    <li><?= $this->Html->link('Ajouter Category',['controller'=>'categories','action'=>'add','prefix'=> $prefix]) ?></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Commentaire <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><?= $this->Html->link('Commentaire',['controller'=>'coments','action'=>'index','prefix'=> $prefix]) ?></li>
                </ul>
            </li>
        </ul>
            <ul class="nav navbar-nav navbar-right">
                <li id="li-brun" style="background-color: #985f0d"><a id="brun"></a></li>
                <li id="li-bleu" style="background-color: #2a6496"><a id="bleu"></a></li>
                <li id="li-vert" style="background-color: #2d6324"><a id="vert"></a></li>
                <?php $Ses = $this->request->session()->read('Auth');
                if (!empty($Ses)): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $this->request->session()->read('Auth')['User']['username'] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $this->request->session()->read('Auth')['User']['id']]) ?>">Mon Compte</a></li>
                            <li><a href="<?= $this->Url->build(['controller' => 'news', 'action' => 'index', $this->request->session()->read('Auth')['User']['id']]) ?>">Mes Brouillon</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout']) ?>">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li><a href="<?= $this->Url->build(['controller'=>'users','action'=>'logout']) ?>">Connexion</a></li>
                <?php endif;?>
        </ul>
        </div>
        </div>
    </nav>
    <?php elseif ($this->request->session()->read('Auth')['User']['is_admin'] === false): ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" data-topbar role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><?= $this->Html->link('News',['controller'=>'news','action'=>'index','prefix'=> $prefix ]) ?></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mes comentaire <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?= $this->Html->link('Tout mes comentaire',['controller'=>'coments','action'=>'index',$this->request->session()->read('Auth')['User']['id'],'prefix'=> $prefix ]) ?></li>
                            <li class="disabled"><?= $this->Html->link('Mes comentaire que j\'ais Liker',['controller'=>'coments','action'=>'indexilike',$this->request->session()->read('Auth')['User']['id'],'prefix'=> $prefix ],['class'=>'disabled']) ?></li>
                            <li><?= $this->Html->link('Mes comentaire Liker',['controller'=>'coments','action'=>'indexlike',$this->request->session()->read('Auth')['User']['id'],'prefix'=> $prefix ]) ?></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php $Ses = $this->request->session()->read('Auth');
                    if (!empty($Ses)): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $this->request->session()->read('Auth')['User']['username'] ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $this->request->session()->read('Auth')['User']['id']]) ?>">Mon Compte</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout']) ?>">Logout</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li><a href="<?= $this->Url->build(['controller'=>'users','action'=>'logout']) ?>">Connexion</a></li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>
<?php elseif (empty($this->request->session()->read('Auth'))===true): ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" data-topbar role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                            <li><?= $this->Html->link('News',['controller'=>'news','action'=>'index','prefix'=> $prefix ]) ?></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= $this->Url->build(['controller'=>'users','action'=>'login']) ?>">Connexion</a></li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>
    <?= $this->Flash->render() ?>
    <div class="container clearfix ">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
<script>
    $('#bleu').click('on',function () {
        $('.navbar').toggleClass('navbar-inverse');
        $('.navbar').toggleClass('navbar-bleu');
        $('.navbar').toggleClass('navbar-brun');
        $('#li-bleu').toggleClass('active');

    });
    $('#brun').click('on',function () {
        $('.navbar').toggleClass('navbar-inverse');
        $('.navbar').toggleClass('navbar-brun');
        $('.navbar').toggleClass('navbar-bleu');
        $('#li-brun').toggleClass('active');

    })
</script>
<style>
    .navbar-brun{
        background-color: #985f0d;
    }
    .navbar-brun .navbar-nav > li > a {
        color: black;
    }
    .active{
        background-color: lightgray;
    }
    .navbar-bleu{
        background-color: #2a6496;
    }
    .navbar-bleu .navbar-nav > li > a {
        color: white;
    }
    .active{
        background-color: lightgray;
    }
</style>
</html>
