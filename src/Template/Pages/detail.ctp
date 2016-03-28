<section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Detail Gempa</h1>
                            <p id="appendTitle"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <?php 
        // debug($gempa);
    ?>
    <style>
    #map-canvas 
    { 
        height: 400px; 
        width: 500px;
    }
    </style>
    <section id="portfolio-information" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                
                <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
                <div id="map-canvas"></div>
                <?php 
                    // debug($nearby);
                    function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') {
                        if (trim ($timestamp) == '')
                        {
                            $timestamp = time ();
                        }
                        elseif (!ctype_digit ($timestamp))
                        {
                            $timestamp = strtotime ($timestamp);
                        }
                        # remove S (st,nd,rd,th) there are no such things in indonesia :p
                        $date_format = preg_replace ("/S/", "", $date_format);
                        $pattern = array (
                            '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
                            '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
                            '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
                            '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
                            '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
                            '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
                            '/April/','/June/','/July/','/August/','/September/','/October/',
                            '/November/','/December/',
                        );
                        $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
                            'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
                            'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
                            'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
                            'Oktober','November','Desember',
                        );
                        $date = date ($date_format, $timestamp);
                        $date = preg_replace ($pattern, $replace, $date);
                        $date = "{$date} {$suffix}";
                        return $date;
                    } 

                    // debug($gempa);
                    date_default_timezone_set('Asia/Jakarta');
                    foreach ($gempa as $val_gempa) {
                        $long = $val_gempa->coordinates1;
                        $lat = $val_gempa->coordinates2;
                        $time = substr($val_gempa->time, 0, 10);


                    $tsunami = $val_gempa->tsunami;
                    $mag = $val_gempa->mag;
                    if ($mag>2 && $mag<2) {
                        $mag_skl = 'kecil'; 
                    } else if ($mag>3 && $mag<4) {
                        $mag_skl = 'sedang'; 
                    } else if ($mag>4 && $mag<5) {
                        $mag_skl = 'cukup besar'; 
                    } else if ($mag>5 && $mag<6) {
                        $mag_skl = 'Besar'; 
                    } else if ($mag>6 && $mag<7) {
                        $mag_skl = 'Berkekuatan Cukup Besar'; 
                    } else if ($mag>7) {
                        $mag_skl = 'Dahsyat'; 
                    } else {
                        $mag_skl = '';
                    }

                    if ($tsunami==1) {
                        $is_tsunami = 'Gempa ini merupakan gempa <strong><span style="color:#c0392b;">berpotensi tsunami</span><strong>';
                    } else {
                        $is_tsunami = 'Namun gempa ini <strong>tidak berpotensi tsunami</strong> oleh karena itu warga '.$val_gempa->place.' tidak perlu khawatir akan terjadinya tsunami';
                    }


                ?>
                
                </div>
                <div class="col-sm-6">
                    <div class="project-name overflow">
                        <h2 class="bold"><strong><?= $val_gempa->title ?></strong></h2>
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="#"><i class="fa fa-clock-o"></i><?= indonesian_date($time) ?></a></li>
                            <li><a href="#"><i class="fa fa-tag"></i><?= $val_gempa->type ?></a></li>
                        </ul>
                    </div>
                    <div class="project-info overflow">
                        <h3>Informasi Gempa</h3>
                        <p>Sebuah Gempa <?= $mag_skl ?> terjadi pada wilayah <strong><?= $val_gempa->place ?></strong> 
                        pada hari <?= indonesian_date($time) ?>, gempa ini berkekuatan hingga <strong><?= $val_gempa->mag ?></strong> Skala Richter. 
                        <?= $is_tsunami ?>. dan dibawah ini adalah 5 kota terdekat dari pusat gempa yang terjadi.</p>
                        <ul class="elements">

                        <?php 
                            foreach ($nearby as $nearby_cities) {
                                // debug($nearby_cities->distance.'Km dari '.$nearby_cities->name.' dengan jumlah penduduk '.$nearby_cities->population.' Jiwa');
                        ?>
                            <li><i class="fa fa-angle-right"></i><strong><?= $nearby_cities->distance.'Km</strong> dari '.$nearby_cities->name.' dengan jumlah penduduk <strong>'.$nearby_cities->population.' Jiwa</strong>' ?></li>
                        <?php  
                            }
                        ?>

                        </ul>
                    </div>
                    <div class="skills overflow">
                        <h3>Other Info:</h3>
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="#"><i class="fa fa-check-square"></i><strong>nst</strong> : <?= $val_gempa->nst ?></a></li>
                            <li><a href="#"><i class="fa fa-check-square"></i><strong>dmin</strong> : <?= $val_gempa->dmin ?></a></li>
                            <li><a href="#"><i class="fa fa-check-square"></i><strong>rms</strong> : <?= $val_gempa->rms ?></a></li>
                            <li><a href="#"><i class="fa fa-check-square"></i><strong>gap</strong> : <?= $val_gempa->gap ?></a></li>
                            <li><a href="#"><i class="fa fa-check-square"></i><strong>Mag Type</strong> : <?= $val_gempa->magType ?></a></li>
                        </ul>
                    </div>
                    <div class="client overflow">
                        <h3>Titik Kordinat:</h3>
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="#"><i class="fa fa-bolt"></i><?= $val_gempa->coordinates2.', '.$val_gempa->coordinates1 ?></a></li>
                        </ul>
                    </div>
                    <div class="live-preview">
                        <a href="#" class="btn btn-common uppercase" onclick="initialize()" data-toggle="modal" data-target=".bs-example-modal-lg">Go to Place</a>
                    </div>
                    <!-- Large modal -->
                    <style type="text/css">
                        #pano {
                            width: 665px; height: 500px;
                        }
                    </style>
                    <div id="sv_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="padding: 10px;">
                            <div id="pano"></div>
                            <img src="/images/no_map.jpg" class="no_street_view hidden img-responsive" />
                        </div>
                      </div>
                    </div>

                    <br />
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
     <!--/#portfolio-information-->
     <script>

      function initialize() {
        
            var sv = new google.maps.StreetViewService();
            var geocoder = new google.maps.Geocoder();
            var directionsService = new google.maps.DirectionsService();
            var panorama;
            var address = "<?= $lat.', '.$long ?>";
            var myLatLng2;

            var myLatLng = new google.maps.LatLng( <?= $lat.', '.$long ?> ),
                myOptions = {
                    zoom: 7,
                    center: myLatLng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                    },
                map = new google.maps.Map( document.getElementById( 'map-canvas' ), myOptions ),
                marker = new google.maps.Marker( {position: myLatLng, map: map} );
            
            marker.setMap( map );
            moveMarker( map, marker );


            panorama = new google.maps.StreetViewPanorama(document.getElementById("pano"));


            geocoder.geocode({
                'address': address
                }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                  myLatLng2 = results[0].geometry.location;

                  // find a Streetview location on the road
                  var request = {
                    origin: address,
                    destination: address,
                    travelMode: google.maps.DirectionsTravelMode.DRIVING
                  };
                  directionsService.route(request, directionsCallback);
                } else {
                    $('#pano').remove();
                    $('.no_street_view').removeClass('hidden');
                    // alert("Geocode was not successful for the following reason: " + status);
                }
            });


            function processSVData(data, status) {
                if (status == google.maps.StreetViewStatus.OK) {

                    panorama.setPano(data.location.pano);

                var heading = google.maps.geometry.spherical.computeHeading(data.location.latLng, myLatLng2);
                panorama.setPov({
                  heading: heading,
                  pitch: 0,
                  zoom: 1
                });
                panorama.setVisible(true);

                } else {
                    $('#pano').remove();
                    $('.no_street_view').removeClass('hidden');
                    // alert("Street View data not found for this location.");
                }
            }

            function directionsCallback(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    var latlng = response.routes[0].legs[0].start_location;
                    sv.getPanoramaByLocation(latlng, 50, processSVData);
                } else {
                    $('#pano').remove();
                    $('.no_street_view').removeClass('hidden');
                    // alert("Directions service not successfull for the following reason:" + status);
                }
            }
            $(document).ready(function(){
                $('.btn-common').on('click', function(){
                    if ($('#sv_modal').modal('show')) {

                    google.maps.event.trigger(map, "resize");   
                    return false;
                    }
                });
                // });
            });
            $('#pano').width(755);
        }

        function moveMarker( map, marker ) {
            
            //delayed so you can see it move
            setTimeout( function(){ 
            
                marker.setPosition( new google.maps.LatLng( <?= $lat.', '.$long ?> ) );
                map.panTo( new google.maps.LatLng( <?= $lat.', '.$long ?> ) );
                
            }, 1500 );


        };

        // initialize();
            google.maps.event.addDomListener(window, 'load', initialize);



    </script>
