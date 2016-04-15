<!DOCTYPE html>
<!--[if IE 7 ]><html dir="ltr" lang="id" class="no-js ie7 oldie"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="id" class="no-js ie8 oldie"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html dir="ltr" lang="id" class="no-js" ><!--<![endif]-->
<html>
<head>
    <title><?= $title; ?></title>
    <?= $this->Html->charset() ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="<?= $title; ?>" />
    <meta name="description" content="<?= $meta_desc ?>">
    <meta name="keywords" content="infogempa, info gempa, gempa bumi, gempa dunia, informasi gempa terupdate, info gempa terkini, aplikasi gempa bumi, gempa bumi alert">
    <meta name="format-detection" content="telephone=no">
    <link rel="canonical" href="https://infogempa.com/" />
    <meta property="og:title" content="<?= $title; ?>"/>
    <meta property="og:description" content="Info Gempa | Kami menyediakan informasi mengenai gempa bumi yang terjadi di dunia. untuk mendapatkan informasi secara update silahkan subscribe"/>
    <meta property="og:site_name" content="Infogempa"/>
    <meta property="og:url" content="https://infogempa.com/"/>
    <meta property="og:image" content="https://infogempa.com/artikel/wp-content/uploads/2016/04/DeepinScreenshot20160412215908.png"/>
    <link href="https://plus.google.com/101362726249214736334" rel="publisher">
    <link rel="dns-prefetch" href="https://infogempa.com/">
    <meta property="og:locale" content="id_ID"/>
    <meta property="og:locale:alternate" content="en_US"/>
    <meta property="og:locale:alternate" content="en_GB"/>
    <meta property="og:type" content="website"/>
    <?= $this->Html->meta('favicon.ico', '/images/favicon.ico', ['type' => 'icon']) ?>
    <meta name="google-site-verification" content="WESXEFyXT-FfMwscd1hY5RbYwO7v5NynJl3uvrwoeIY" />
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-76128729-1', 'auto');
        ga('send', 'pageview');
    </script>
    <?= $this->AssetCompress->css('css-combined'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    
    <?= $this->element('header') ?>
    <?= $this->fetch('content') ?>
    <?= $this->element('footer') ?>
    
    <?= $this->AssetCompress->script('js-combined'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.bold>').clone().appendTo('#appendTitle');
            $('#appendTitle').css({'font-size':'14px', 'color':'#888'})
        });
 
        var email = $('#email').val();
        $('#email').on('change keypress keyup keydown paste', function(){
            if ($('#email').val().length==0) {
                $('.g-recaptcha').addClass('hidden');
            } else {
                $('.g-recaptcha').removeClass('hidden');
            }
        });
        
        $(document).ready(function(){
            $('.jalur-evakuasi').on('click', function(){
                $('#evakuasi').fadeToggle();
            });
        });
    </script>

    <a href="http://www.histats.com" target="_blank" title="counter easy hit" >
    <script  type="text/javascript" >
        try {Histats.start(1,3408822,4,0,0,0,"");
        Histats.track_hits();} catch(err){};
    </script>
    </a>
    <noscript>
        <a href="/secsrc?url=http://www.histats.com" target="_blank"><img  src="/secsrc?url=http://sstatic1.histats.com/0.gif?3408822&101" alt="counter easy hit" border="0"></a>
    </noscript>
</body>
</html>