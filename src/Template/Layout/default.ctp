<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="infogempa, info gempa, gempa bumi, gempa dunia, informasi gempa terupdate, info gempa terkini, aplikasi gempa bumi, gempa bumi alert">
    <link rel="canonical" href="https://infogempa.com/" />
    <title><?= $title; ?></title>
    <?= $this->Html->meta('favicon.ico', '/images/favicon.ico', ['type' => 'icon']) ?>
    <meta property="og:locale" content="id_ID"/>
    <meta property="og:locale:alternate" content="en_US"/>
    <meta property="og:locale:alternate" content="en_GB"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Info Gempa Dunia | Informasi Gempa Bumi Dunia | infogempa.com"/>
    <meta property="og:description" content="Info Gempa | Kami menyediakan informasi mengenai gempa bumi yang terjadi di dunia. untuk mendapatkan informasi secara update silahkan subscribe"/>
    <meta property="og:image:secure_url" content="https://infogempa.com/artikel/wp-content/uploads/2016/04/Damage-from-an-earthquake-007.jpg"/>
    <meta property="og:url" content="https://infogempa.com/"/>
    <meta property="og:site_name" content="Infogempa"/>
    <meta name="google-site-verification" content="WESXEFyXT-FfMwscd1hY5RbYwO7v5NynJl3uvrwoeIY" />
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-76128729-1', 'auto');
        ga('send', 'pageview');
    </script>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
    <script type="text/javascript">
        var email = $('#email').val();
        $('#email').on('change keypress keyup keydown paste', function(){
            if ($('#email').val().length==0) {
                $('.g-recaptcha').addClass('hidden');
            } else {
                $('.g-recaptcha').removeClass('hidden');
            }
        });
    </script>

</body>
</html>