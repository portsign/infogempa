<section id="home-slider">
        <div class="container">
            <div class="main-slider">
                <div class="slide-text">
                    <h1>Informasi Gempa Bumi Dunia</h1>
                    <p>Kami menyediakan informasi mengenai gempa bumi yang terjadi di dunia. untuk mendapatkan informasi secara update silahkan subscribe.</p>
                    <input type="text" class="form-control" placeholder="Email" />
                    <a href="#" class="btn btn-common">Subscribe</a>
                </div>
                <img src="/images/home/slider/slide1/house.png" class="img-responsive slider-house" alt="slider image">
                <img src="/images/home/slider/slide1/circle1.png" class="slider-circle1" alt="slider image">
                <img src="/images/home/slider/slide1/circle2.png" class="slider-circle2" alt="slider image">
                <img src="/images/home/slider/slide1/cloud1.png" class="slider-cloud1" alt="slider image">
                <img src="/images/home/slider/slide1/cloud2.png" class="slider-cloud2" alt="slider image">
                <img src="/images/home/slider/slide1/cloud3.png" class="slider-cloud3" alt="slider image">
                <img src="/images/home/slider/slide1/sun.png" class="slider-sun" alt="slider image">
                <img src="/images/home/cycle.png" class="slider-cycle" alt="">
            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>
    <!--/#home-slider-->
<div class="container">
            <div class="main-slider">

                <?php 
                    $content = file_get_contents('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp');
                    $get = str_replace('eqfeed_callback(', '', $content);
                    $get = str_replace(');', '', $get);
                    $jsons = json_decode($get);
                    // debug($jsons);
                ?>

                <table class="table table-striped table-gempa">
                    <thead>
                        <th>No</th>
                        <th>Lokasi Gempa</th>
                        <th>Skala Richter</th>
                        <th>Waktu Gempa</th>
                        <th>Detail</th>
                    </thead>
                    <tbody>
                    <?php 
                        $i = 1;
                        foreach ($jsons->features as $value) {
                        $time = substr($value->properties->time, 0, 10);
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><strong><?= (string)$value->properties->place ?></strong></td>
                            <td><?= (string)$value->properties->mag ?></td>
                            <td><?= date('d/m/Y H:i A', $time) ?></td>
                            <td><a href="/pages/<?= (string)$value->id ?>" class="btn btn-success" >Detail</a></td>
                        </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>