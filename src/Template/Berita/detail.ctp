<style type="text/css">
    .title, .p-title{
        color: #FFF;
    }
    .bg-text{
        color: white;
        font: bold 24px/45px Helvetica, Sans-Serif;
        letter-spacing: -1px;
        background: rgb(0, 0, 0);
        background: rgba(0, 0, 0, 0.7);
        padding: 6px;
        padding-right: 10px;
        font-size: 2.2vw;
        font-weight: normal;
        font-family: 'Roboto', serif;
        width: 220px;
    }
    .bg-text-lokasi {
        color: white!important;
        height:41px;
        padding-top: 0px!important;
        font: bold 24px/45px Helvetica, Sans-Serif;
        background: rgb(0, 0, 0);
        background: rgba(0, 0, 0, 0.7);
        padding: 6px;
        padding-right: 10px;
        font-size: 2.2vw;
        font-weight: normal;
        font-family: 'Roboto', serif;
        width: 400px;
    }
    .i-small {
        font-size: 12px;
    }
    .img-responsive {
        width: 100%;
    }
</style>

<section id="page-breadcrumb">
    <div class="vertical-center sun">
         <div class="container">
            <div class="row">
                <div class="action">
                    <div class="col-sm-12">
                        <h1 class="title bg-text">Berita Gempa</h1>
                        <p class="p-title bg-text-lokasi"><strong>Berita gempa hanya di wilayah indonesia</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="blog" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">

                        <?php 
                        foreach ($detail as $details) {
                            $date = date('d', strtotime($details->created));
                            $month = date('M', strtotime($details->created));
                            $actual_date = $details->created;
                        ?>

                         <div class="col-md-12 col-sm-12">
                            <div class="single-blog blog-details two-column">
                                <div class="post-thumb">
                                    <a href="#"><img src="<?= $details->thumbnail; ?>" class="img-responsive" alt=""></a>
                                    <div class="post-overlay">
                                        <span class="uppercase"><a href="#"><?= $date; ?> <br><small><?= $month; ?></small></a></span>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h1 class="post-title bold"><?= $details->title ?></h1>
                                    <h3 class="post-author"><a href="/">Posted by Admin infogempa.com</a> <i class="i-small"><?= $actual_date ?></i></h3>
                                    <p><?= $details->content ?></p>              
                                </div>
                            </div>
                        <?php 
                            echo 'Tags : ';
                            $tags = explode(',', $details->tags);
                            foreach ($tags as $tag) {
                                echo '<a href="#" class="btn btn-default btn-xs">'.$tag.'</a>';
                            }
                            echo '</div>';
                        } 
                        ?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        
                        <div class="sidebar-item categories">
                            <h3>Main Menus</h3>
                            <ul class="nav navbar-stacked">
                                <li><a href="/">Home<span class="pull-right">(20)</span></a></li>
                                <li><a href="/belajar">Belajar Geologi<span class="pull-right">(4)</span></a></li>
                                <li class="active"><a href="/berita">Berita<span class="pull-right">(8)</span></a></li>
                                <li><a href="/dmca">DMCA</a></li>
                                <li><a href="/privacy-policy">Privacy Policy</a></li>
                                <li><a href="#contact">Contact</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-item tag-cloud">
                            <h3>Tag Cloud</h3>
                            <ul class="nav nav-pills">
                                <?php 
                                foreach ($detail as $articles) {
                                    $tags = explode(',', $articles->tags);
                                    foreach ($tags as $tag) {
                                        echo '<li><a href="#">'.$tag.'</a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- <div class="sidebar-item popular">
                            <h3>Latest Photos</h3>
                            <ul class="gallery">
                                <li><a href="#"><img src="images/portfolio/popular1.jpg" alt=""></a></li>
                                <li><a href="#"><img src="images/portfolio/popular2.jpg" alt=""></a></li>
                                <li><a href="#"><img src="images/portfolio/popular3.jpg" alt=""></a></li>
                                <li><a href="#"><img src="images/portfolio/popular4.jpg" alt=""></a></li>
                                <li><a href="#"><img src="images/portfolio/popular5.jpg" alt=""></a></li>
                                <li><a href="#"><img src="images/portfolio/popular1.jpg" alt=""></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->