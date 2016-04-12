<style>
#map-canvas 
{ 
    height: 400px; 
    width: 500px;
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
    padding-top: -2px!important;
    font: bold 24px/45px Helvetica, Sans-Serif;
    background: rgb(0, 0, 0);
    background: rgba(0, 0, 0, 0.7);
    padding: 6px;
    padding-right: 10px;
    font-size: 2.2vw;
    font-weight: normal;
    font-family: 'Roboto', serif;
    width: auto;
    max-width: 420px;
}
.bold {
    font-size: 26px;
}
.jalur-evakuasi {
    margin-left: -10px;
}
</style>
<section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <span class="title bg-text"><strong>Detail Gempa</strong></span><br />
                            <span id="appendTitle" class="bg-text-lokasi"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    
    <section id="portfolio-information" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                <script src="https://www.google.com/jsapi"></script>
                <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
                <div id="map-canvas"></div>
                <br />
                <!-- Ads By Google -->

                <script type="text/javascript">
                    google_ad_client = "ca-pub-8007533189697599";
                    google_ad_slot = "1696387466";
                    google_ad_width = 500;
                    google_ad_height = 80;
                </script>
                <!-- infogempa_detail_1 -->
                <script type="text/javascript"
                src="//pagead2.googlesyndication.com/pagead/show_ads.js">
                </script>

                <!-- Ads By Google end -->
                <?php 
                    // debug($nearby);
                    function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') {
                        if (trim ($timestamp) == '') {
                            $timestamp = time ();
                        } elseif (!ctype_digit ($timestamp)) {
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
                        $is_tsunami = 'Gempa ini merupakan gempa <strong><span style="color:#c0392b;">berpotensi tsunami</span></strong>';
                    } else {
                        $is_tsunami = 'Namun gempa ini <strong>tidak berpotensi tsunami</strong> oleh karena itu warga '.$val_gempa->place.' tidak perlu khawatir akan terjadinya tsunami';
                    }


                ?>
                
                </div>
                <div class="col-sm-6">
                    <div class="project-name overflow">
                        <h1 class="bold"><strong><?= $val_gempa->title ?></strong></h1>
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
                        ?>
                            <li><i class="fa fa-angle-right"></i><strong><?= $nearby_cities->distance.'Km</strong> dari '.$nearby_cities->name.' dengan jumlah penduduk <strong>'.$nearby_cities->population.' Jiwa</strong>' ?></li>
                        <?php  
                            }
                        ?>

                        </ul>
                    </div>

                    <a href="#" class="btn uppercase jalur-evakuasi" data-toggle="modal" data-target=".bs-example-modal-lg-evakuasi"><i class="fa fa-map-o"></i>  Jalur Evakuasi Tsunami</a>

                     <!-- Jalur evakuasi tsunami -->
                    <div id="evakuasi">
                    <div id="map" style="height:250px;"></div>
                    <div id="elevation_chart"></div>
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
                            <img src="/images/no_street_view.jpg" style="width:80%;" class="no_street_view hidden img-responsive" />
                        </div>
                      </div>
                    </div>

                   

                    <br />
                    <small><i>Sumber : <a href="http://earthquake.usgs.gov/">earthquake.usgs.gov</i></small>
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
                marker = new google.maps.Marker( {position: myLatLng, map: map, animation: google.maps.Animation.DROP} );
                marker.addListener('click', toggleBounce);
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

        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }

        // initialize();
        google.maps.event.addDomListener(window, 'load', initialize);

    </script>

    <script>
        // Load the Visualization API and the columnchart package.
      google.load('visualization', '1', {packages: ['columnchart']});

      function initMap() {
        // The following path marks a path from Mt. Whitney, the highest point in the
        // continental United States to Badwater, Death Valley, the lowest point.
        var path = [
            <?php 
                foreach ($nearby as $nb) {
                    echo "{lat: ".$nb->latitude.", lng: ".$nb->longitude."},";
                }
            ?>
        ]

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: path[1],
          mapTypeId: 'terrain'
        });

        // Create an ElevationService.
        var elevator = new google.maps.ElevationService;

        // Draw the path, using the Visualization API and the Elevation service.
        displayPathElevation(path, elevator, map);
      }

      function displayPathElevation(path, elevator, map) {
        // Display a polyline of the elevation path.
        new google.maps.Polyline({
          path: path,
          strokeColor: '#0000CC',
          opacity: 0.4,
          map: map
        });

        // Create a PathElevationRequest object using this array.
        // Ask for 256 samples along that path.
        // Initiate the path request.
        elevator.getElevationAlongPath({
          'path': path,
          'samples': 256
        }, plotElevation);
      }

      // Takes an array of ElevationResult objects, draws the path on the map
      // and plots the elevation profile on a Visualization API ColumnChart.
      function plotElevation(elevations, status) {
        var chartDiv = document.getElementById('elevation_chart');
        if (status !== google.maps.ElevationStatus.OK) {
          // Show the error code inside the chartDiv.
          chartDiv.innerHTML = 'Cannot show elevation: request failed because ' +
              status;
          return;
        }
        // Create a new chart in the elevation_chart DIV.
        var chart = new google.visualization.ColumnChart(chartDiv);

        // Extract the data from which to populate the chart.
        // Because the samples are equidistant, the 'Sample'
        // column here does double duty as distance along the
        // X axis.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Sample');
        data.addColumn('number', 'Elevation');
        for (var i = 0; i < elevations.length; i++) {
          data.addRow(['', elevations[i].elevation]);
        }

        // Draw the chart using the data within its DIV.
        chart.draw(data, {
          height: 150,
          legend: 'none',
          titleY: 'Elevation (m)'
        });
      }
      </script>
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7_XHH7t8UpCUhtN_L399FW7gDR1NIaWo&callback=initMap">
      </script>