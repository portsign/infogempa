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
</style>

<section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title bg-text">Blog</h1>
                            <p class="p-title bg-text-lokasi"><strong>Blog with right sidebar</strong></p>
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
                            foreach ($jsons->posts as $value) {
                                $title = $value->title;
                                $content = $value->content;
                                $author = $value->author->{'name'};
                                $count_comment = count($value->comments);
                                $category = $value->categories[0]->title;
                                $thumb = $value->attachments[0]->url;
                                
                                $date = date('d', strtotime($value->date));
                                $month = date('M', strtotime($value->date));
                                $actual_date = $value->date;

                                $string = strip_tags($content);

                                if (strlen($string) > 400) {
                                    $stringCut = substr($string, 0, 400);
                                    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="/this/story">Read More</a>'; 
                                }

                        ?>
                         <div class="col-md-6 col-sm-12 blog-padding-right">
                            <div class="single-blog two-column">
                                <div class="post-thumb">
                                    <a href="blogdetails.html"><img src="<?= $thumb ?>" class="img-responsive" style="height:270px;" alt=""></a>
                                    <div class="post-overlay">
                                        <span class="uppercase"><a href="#"><?= $date ?><br /><small><?= $month ?></small></a></span>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="blogdetails.html"><?= $title ?></a></h2>
                                    <h3 class="post-author"><a href="#">Posted by <?= $author ?></a> &nbsp;&nbsp; <small><i><?= $actual_date ?></i></small></h3>
                                    <p><?= $string ?></p>
                                    <a href="#" class="read-more">View More</a>
                                    <div class="post-bottom overflow">
                                        <ul class="nav nav-justified post-nav">
                                            <li><a href="#"><i class="fa fa-tag"></i><?= $category ?></a></li>
                                            <li><a href="#"><i class="fa fa-comments"></i><?= $count_comment ?> Comment</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php } ?>

                        
                    </div>
                    <div class="blog-pagination">
                        <ul class="pagination">
                          <li><a href="#">left</a></li>
                          <li><a href="#">1</a></li>
                          <li><a href="#">2</a></li>
                          <li class="active"><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                          <li><a href="#">6</a></li>
                          <li><a href="#">7</a></li>
                          <li><a href="#">8</a></li>
                          <li><a href="#">9</a></li>
                          <li><a href="#">right</a></li>
                        </ul>
                    </div>
                 </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                            <h3>Comments</h3>

                            <?php 
                            foreach ($jsons->posts as $value) {
                                // debug($value);
                                // exit;
                                

                                if ($value->comments==[]) {
                                } else {
                                    // $lates_comment = $value->comments[0]->content;
                                    $lates_comment = preg_replace('/<p[^>]*?>/', '', $value->comments[0]->content);
                                    $string = strip_tags($lates_comment);
                                    if (strlen($string) > 40) {
                                        $stringCut = substr($string, 0, 40);
                                        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
                                    }
                                    $actual_latest_comment = $string;

                                    ?>
                                    <div class="media">
                                        <div class="pull-left">
                                            <a href="#"><img src="images/portfolio/project1.jpg" alt=""></a>
                                        </div>
                                        <div class="media-body">
                                            <h4><a href="#"><?= $actual_latest_comment ?></a></h4>
                                            <p>posted on  07 March 2014</p>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                            

                            <?php } ?>
                        </div>
                        <div class="sidebar-item categories">
                            <h3>Categories</h3>
                            <ul class="nav navbar-stacked">
                                <li><a href="https://infogempa.com/artikel/category/belajar-geologi">Belajar Geologi<span class="pull-right">(1)</span></a></li>
                                <!-- <li class="active"><a href="#">Dolor sit amet<span class="pull-right">(8)</span></a></li> -->
                                <li><a href="https://infogempa.com/artikel/category/news">News<span class="pull-right">(8)</span></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-item tag-cloud">
                            <h3>Latest Tag Cloud</h3>
                            <ul class="nav nav-pills">
                            <?php 
                            foreach ($jsons->posts as $value) {
                                $array = json_decode(json_encode($value), True);
                                foreach ($array['tags'] as $tag) { ?>
                                    <li><a href="#"><?= $tag['title'] ?></a></li>
                                <?php } break; ?>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->