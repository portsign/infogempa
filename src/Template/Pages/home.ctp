<style type="text/css">
    div.form-group input.form-control {
        height: 34px!important;
    }
    div.form-group select.form-control {
        height: 34px!important;
    }
    #map {
        height: 100%;
    }
    .select-country {
        width: 115px!important;
    }
    .select-tsunami {
        width: 115px!important;
    }
</style>
<script src='https://www.google.com/recaptcha/api.js'></script>
<section id="home-slider">
        <div class="container">
            <div class="main-slider">
                <a href="/radar" class="btn btn-primary"><i class="fa fa-bullseye"></i> Radar</a>
                <div class="slide-text">
                    <h1 class="title">Informasi Gempa Bumi Dunia</h1>
                    <p class="p-title">Kami menyediakan informasi mengenai gempa bumi yang terjadi di dunia. untuk mendapatkan informasi secara update silahkan subscribe.</p>
                    <form action="/subscribe" method="post">
                        <?= $this->Flash->render('subscribe_scs') ?>
                        <?= $this->Flash->render('subscribe_emrg') ?>
                        <?= $this->Flash->render('subscribe_capt') ?>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" required />
                        <div class="g-recaptcha hidden" style="margin-top: 5px;" data-sitekey="6LciLRwTAAAAAF1vVA1Fw1vZRDj7a3-1PZg2UMqR"></div>
                        <button type="submit" href="#" class="btn btn-common btn-subscribe">Subscribe</button>
                    </form>
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
    <script>
      var map;

        function initMap() {
          map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 20, lng: -160 },
            zoom: 2
          });

          // Get the earthquake data (JSONP format)
          // This feed is a copy from the USGS feed, you can find the originals here:
          //   http://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php
          var script = document.createElement('script');
          script.setAttribute('src',
            'https://storage.googleapis.com/maps-devrel/quakes.geo.json');
          document.getElementsByTagName('head')[0].appendChild(script);
        }

        // Defines the callback function referenced in the jsonp file.
        function eqfeed_callback(data) {
          map.data.addGeoJson(data);
        }
    </script>
    
    <!--/#home-slider-->
                <div class="container">
                <div class="main-slider">
                <div class="col-md-9">
                 <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                     
                      <a class="navbar-brand" href="#"><strong>Cari Gempa</strong></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                     
                      <?= $this->Form->create('search', ['url'=>'/search', 'type'=>'get', 'class' => 'navbar-form navbar-left']) ?>
                        <div class="form-group">
                          <input type="text" class="form-control" name="place" value="" placeholder="Cari berdasarkan lokasi">
                          <select class="select-country form-control" name="country">
                            <option value="">--country--</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Åland Islands">Åland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                            <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Bouvet Island">Bouvet Island</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Territory">British Indian O.T</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo, the Democratic Republic of the">Congo</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Curaçao">Curaçao</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands (Malvinas)">Falkland Islands</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard Island and McDonald Islands">Heard Island & McDonald Islands</option>
                            <option value="Holy See (Vatican City State)">Holy See</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Isle of Man">Isle of Man</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                            <option value="Korea, Republic of">Korea, Republic of</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libya">Libya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macao">Macao</option>
                            <option value="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav Republic of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Réunion">Réunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russian Federation">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Barthélemy">Saint Barthélemy</option>
                            <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Martin (French part)">Saint Martin</option>
                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                            <option value="South Sudan">South Sudan</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Timor-Leste">Timor-Leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
                            <option value="Viet Nam">Viet Nam</option>
                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                        <select class="form-control" name="skala_richter">
                            <option value="">-mag-</option>
                            <option value="1">1 > sr</option>
                            <option value="2">2 > sr</option>
                            <option value="3">3 > sr</option>
                            <option value="4">4 > sr</option>
                            <option value="5">5 > sr</option>
                            <option value="6">6 > sr</option>
                            <option value="7">7 > sr</option>
                            <option value="8">8 > sr</option>
                            <option value="9">9 > sr</option>
                            <option value="10">10 > sr</option>
                        </select>
                        <select class="select-tsunami form-control" name="tsunami">
                            <option value="">-tsunami-</option>
                            <option value="0">tidak berpotensi tsunami</option>
                            <option value="1">berpotensi tsunami</option>
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                      <?= $this->Form->end() ?>
                </nav>
                <table class="table table-striped table-gempa">
                    <thead>
                        <th>Lokasi Gempa</th>
                        <th>Country</th>
                        <th>Skala Richter</th>
                        <th>Waktu Gempa</th>
                        <th>Detail</th>
                    </thead>
                    <tbody>
                    <?php 

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
                        date_default_timezone_set('Asia/Jakarta');
                        foreach ($gempa as $value) {
                        $time = substr($value->time, 0, 10);
                        $lokasi = explode(",", $value->place);
                        $lokasi = $lokasi[0];
                        $country = explode(",", $value->place);
                        // echo count($country);
                        if (array_key_exists(1, $country)) {
                            $country = $country[1];
                        } else {
                            $country = '-';
                        }
                        $slug = strtolower(str_replace(' ', '-', $lokasi)).'.html';
                    ?>
                        <tr>
                            <td><strong><a href="/pages/<?= $value->id_gempa.DS.$slug ?>" title="<?= $value->title ?>"><?= $lokasi ?></a></strong></td>
                            <td><strong><a href="/pages/<?= $value->id_gempa.DS.$slug ?>" title="<?= $value->title ?>"><?= $country ?></a></strong></td>
                            <td><?= $value->mag ?></td>
                            <td><?= indonesian_date($time) ?></td>
                            <td><a href="/pages/<?= $value->id_gempa.DS.$slug ?>" class="btn btn-success" ><i class="fa fa-eye"></i></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <center>
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                        </ul>
                    </div>
                </center>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                  <div class="panel-heading">Main Menu</div>
                  <div class="panel-body">
                    <a href="/">Home</a>
                  </div>
                  <div class="panel-body">
                    <a href="/belajar">Belajar Geologi</a>
                  </div>
                  <div class="panel-body">
                    <a href="/artikel/">News</a>
                  </div>
                  <div class="panel-body">
                    <a href="#contact">Contact</a>
                  </div>
                </div>
                <!-- Ads by google -->

                <script type="text/javascript">
                    google_ad_client = "ca-pub-8007533189697599";
                    google_ad_slot = "9917658261";
                    google_ad_width = 285;
                    google_ad_height = 625;
                </script>
                <!-- infogempa_home_2 -->
                <script type="text/javascript"
                src="//pagead2.googlesyndication.com/pagead/show_ads.js">
                </script>

                <!-- Ads by google end -->
            </div>
        </div>
        </div>
