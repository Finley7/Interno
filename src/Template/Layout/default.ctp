<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <title>
        Interno |
        <?= isset($title) ? $title : $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Finley Siebert">

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('amaran.min.css'); ?>
    <?= $this->Html->css('animate.min.css'); ?>
    <?= $this->Html->css('wbbtheme.css'); ?>
    <?= $this->Html->css('base.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

    <?= $this->Html->script('jquery.wysibb.min'); ?>
    <?= $this->Html->script('bootstrap.min'); ?>
    <?= $this->Html->script('jquery.amaran.min'); ?>

</head>
<body>
<?= $this->Flash->render() ?>
<?= $this->Flash->render('auth') ?>
<?php
    if(!isset($user)) {
        echo $this->element('Menu/unauthorized');
    }
    else {
        echo $this->element('Menu/authorized');
    }
?>
<?= $this->fetch('content') ?>

<?= $this->element('footer'); ?>

</body>
</html>