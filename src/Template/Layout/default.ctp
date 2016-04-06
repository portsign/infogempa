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
    <title>Info Gempa Dunia Terlengkap dan Terupdate | InfoGempa.com</title>
    <?= $this->Html->meta('favicon.ico', '/images/favicon.ico', ['type' => 'icon']) ?>
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
    <!-- Histats.com  START (hidden counter)-->
    <script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
    <a href="http://www.histats.com" target="_blank" title="StatCounter - Free Web Tracker and Counter" ><script  type="text/javascript" >
    try {Histats.start(1,3408822,4,0,0,0,"");
    Histats.track_hits();} catch(err){};
    </script></a>
    <noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?3408822&101" alt="StatCounter - Free Web Tracker and Counter" border="0"></a></noscript>
    <!-- Histats.com  END  -->

</body>
</html>