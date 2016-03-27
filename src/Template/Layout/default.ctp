<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Info Gempa Terlengkap</title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('animate.min.css') ?>
    <?= $this->Html->css('lightbox.css') ?>
    <?= $this->Html->css('main.css') ?>
    <?= $this->Html->css('responsive.css') ?>
    <?= $this->Html->css('style.css') ?>
</head>
<body>
    
    <?= $this->element('header') ?>
    <?= $this->fetch('content') ?>
    <?= $this->element('footer') ?>
    
    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('lightbox.min.js') ?>
    <?= $this->Html->script('wow.min.js') ?>
    <?= $this->Html->script('main.js') ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.bold>').clone().appendTo('#appendTitle');
            $('#appendTitle').css({'font-size':'14px', 'color':'#888'})
        });
    </script>
</body>
</html>