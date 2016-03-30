<style type="text/css">
    div.form-group input.form-control {
        height: 34px!important;
    }
    div.form-group select.form-control {
        height: 34px!important;
    }
</style>
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
    <?php  

		$place = $this->request->query['place'];
		$country = $this->request->query['country'];
		$skala_richter = $this->request->query['skala_richter'];
		$tsunami = $this->request->query['tsunami'];


    ?>
                <div class="container">
                <div class="main-slider">

                 <nav class="navbar navbar-default">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#"><strong>Cari Gempa</strong></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                     
                      <?= $this->Form->create('search', ['url'=>'/search', 'type'=>'get', 'class' => 'navbar-form navbar-left']) ?>
                        <div class="form-group">
                          <input type="text" class="form-control" name="place" value="<?= $place ?>" placeholder="Cari berdasarkan lokasi">
                          <select class="form-control" name="country">
                            <option <?php if ($country == "") { echo 'selected'; } ?> value="">--country--</option>
							<option <?php if ($country == "Afghanistan") { echo 'selected'; } ?> value="Afghanistan">Afghanistan</option>
							<option <?php if ($country == "Åland Islands") { echo 'selected'; } ?> value="Åland Islands">Åland Islands</option>
							<option <?php if ($country == "Albania") { echo 'selected'; } ?> value="Albania">Albania</option>
							<option <?php if ($country == "Algeria") { echo 'selected'; } ?> value="Algeria">Algeria</option>
							<option <?php if ($country == "American Samoa") { echo 'selected'; } ?> value="American Samoa">American Samoa</option>
							<option <?php if ($country == "Andorra") { echo 'selected'; } ?> value="Andorra">Andorra</option>
							<option <?php if ($country == "Angola") { echo 'selected'; } ?> value="Angola">Angola</option>
							<option <?php if ($country == "Anguilla") { echo 'selected'; } ?> value="Anguilla">Anguilla</option>
							<option <?php if ($country == "Antarctica") { echo 'selected'; } ?> value="Antarctica">Antarctica</option>
							<option <?php if ($country == "Antigua and Barbuda") { echo 'selected'; } ?> value="Antigua and Barbuda">Antigua and Barbuda</option>
							<option <?php if ($country == "Argentina") { echo 'selected'; } ?> value="Argentina">Argentina</option>
							<option <?php if ($country == "Armenia") { echo 'selected'; } ?> value="Armenia">Armenia</option>
							<option <?php if ($country == "Aruba") { echo 'selected'; } ?> value="Aruba">Aruba</option>
							<option <?php if ($country == "Australia") { echo 'selected'; } ?> value="Australia">Australia</option>
							<option <?php if ($country == "Austria") { echo 'selected'; } ?> value="Austria">Austria</option>
							<option <?php if ($country == "Azerbaijan") { echo 'selected'; } ?> value="Azerbaijan">Azerbaijan</option>
							<option <?php if ($country == "Bahamas") { echo 'selected'; } ?> value="Bahamas">Bahamas</option>
							<option <?php if ($country == "Bahrain") { echo 'selected'; } ?> value="Bahrain">Bahrain</option>
							<option <?php if ($country == "Bangladesh") { echo 'selected'; } ?> value="Bangladesh">Bangladesh</option>
							<option <?php if ($country == "Barbados") { echo 'selected'; } ?> value="Barbados">Barbados</option>
							<option <?php if ($country == "Belarus") { echo 'selected'; } ?> value="Belarus">Belarus</option>
							<option <?php if ($country == "Belgium") { echo 'selected'; } ?> value="Belgium">Belgium</option>
							<option <?php if ($country == "Belize") { echo 'selected'; } ?> value="Belize">Belize</option>
							<option <?php if ($country == "Benin") { echo 'selected'; } ?> value="Benin">Benin</option>
							<option <?php if ($country == "Bermuda") { echo 'selected'; } ?> value="Bermuda">Bermuda</option>
							<option <?php if ($country == "Bhutan") { echo 'selected'; } ?> value="Bhutan">Bhutan</option>
							<option <?php if ($country == "Bolivia, Plurinational State of") { echo 'selected'; } ?> value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
							<option <?php if ($country == "Bonaire, Sint Eustatius and Saba") { echo 'selected'; } ?> value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
							<option <?php if ($country == "Bosnia and Herzegovina") { echo 'selected'; } ?> value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
							<option <?php if ($country == "Botswana") { echo 'selected'; } ?> value="Botswana">Botswana</option>
							<option <?php if ($country == "Bouvet Island") { echo 'selected'; } ?> value="Bouvet Island">Bouvet Island</option>
							<option <?php if ($country == "Brazil") { echo 'selected'; } ?> value="Brazil">Brazil</option>
							<option <?php if ($country == "British Indian Ocean Territory") { echo 'selected'; } ?> value="British Indian Ocean Territory">British Indian Ocean Territory</option>
							<option <?php if ($country == "Brunei Darussalam") { echo 'selected'; } ?> value="Brunei Darussalam">Brunei Darussalam</option>
							<option <?php if ($country == "Bulgaria") { echo 'selected'; } ?> value="Bulgaria">Bulgaria</option>
							<option <?php if ($country == "Burkina Faso") { echo 'selected'; } ?> value="Burkina Faso">Burkina Faso</option>
							<option <?php if ($country == "Burundi") { echo 'selected'; } ?> value="Burundi">Burundi</option>
							<option <?php if ($country == "Cambodia") { echo 'selected'; } ?> value="Cambodia">Cambodia</option>
							<option <?php if ($country == "Cameroon") { echo 'selected'; } ?> value="Cameroon">Cameroon</option>
							<option <?php if ($country == "Canada") { echo 'selected'; } ?> value="Canada">Canada</option>
							<option <?php if ($country == "Cape Verde") { echo 'selected'; } ?> value="Cape Verde">Cape Verde</option>
							<option <?php if ($country == "Cayman Islands") { echo 'selected'; } ?> value="Cayman Islands">Cayman Islands</option>
							<option <?php if ($country == "Central African Republic") { echo 'selected'; } ?> value="Central African Republic">Central African Republic</option>
							<option <?php if ($country == "Chad") { echo 'selected'; } ?> value="Chad">Chad</option>
							<option <?php if ($country == "Chile") { echo 'selected'; } ?> value="Chile">Chile</option>
							<option <?php if ($country == "China") { echo 'selected'; } ?> value="China">China</option>
							<option <?php if ($country == "Christmas Island") { echo 'selected'; } ?> value="Christmas Island">Christmas Island</option>
							<option <?php if ($country == "Cocos (Keeling) Islands") { echo 'selected'; } ?> value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
							<option <?php if ($country == "Colombia") { echo 'selected'; } ?> value="Colombia">Colombia</option>
							<option <?php if ($country == "Comoros") { echo 'selected'; } ?> value="Comoros">Comoros</option>
							<option <?php if ($country == "Congo") { echo 'selected'; } ?> value="Congo">Congo</option>
							<option <?php if ($country == "Congo, the Democratic Republic of the") { echo 'selected'; } ?> value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
							<option <?php if ($country == "Cook Islands") { echo 'selected'; } ?> value="Cook Islands">Cook Islands</option>
							<option <?php if ($country == "Costa Rica") { echo 'selected'; } ?> value="Costa Rica">Costa Rica</option>
							<option <?php if ($country == "Côte d'Ivoire") { echo 'selected'; } ?> value="Côte d'Ivoire">Côte d'Ivoire</option>
							<option <?php if ($country == "Croatia") { echo 'selected'; } ?> value="Croatia">Croatia</option>
							<option <?php if ($country == "Cuba") { echo 'selected'; } ?> value="Cuba">Cuba</option>
							<option <?php if ($country == "Curaçao") { echo 'selected'; } ?> value="Curaçao">Curaçao</option>
							<option <?php if ($country == "Cyprus") { echo 'selected'; } ?> value="Cyprus">Cyprus</option>
							<option <?php if ($country == "Czech Republic") { echo 'selected'; } ?> value="Czech Republic">Czech Republic</option>
							<option <?php if ($country == "Denmark") { echo 'selected'; } ?> value="Denmark">Denmark</option>
							<option <?php if ($country == "Djibouti") { echo 'selected'; } ?> value="Djibouti">Djibouti</option>
							<option <?php if ($country == "Dominica") { echo 'selected'; } ?> value="Dominica">Dominica</option>
							<option <?php if ($country == "Dominican Republic") { echo 'selected'; } ?> value="Dominican Republic">Dominican Republic</option>
							<option <?php if ($country == "Ecuador") { echo 'selected'; } ?> value="Ecuador">Ecuador</option>
							<option <?php if ($country == "Egypt") { echo 'selected'; } ?> value="Egypt">Egypt</option>
							<option <?php if ($country == "El Salvador") { echo 'selected'; } ?> value="El Salvador">El Salvador</option>
							<option <?php if ($country == "Equatorial Guinea") { echo 'selected'; } ?> value="Equatorial Guinea">Equatorial Guinea</option>
							<option <?php if ($country == "Eritrea") { echo 'selected'; } ?> value="Eritrea">Eritrea</option>
							<option <?php if ($country == "Estonia") { echo 'selected'; } ?> value="Estonia">Estonia</option>
							<option <?php if ($country == "Ethiopia") { echo 'selected'; } ?> value="Ethiopia">Ethiopia</option>
							<option <?php if ($country == "Falkland Islands (Malvinas)") { echo 'selected'; } ?> value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
							<option <?php if ($country == "Faroe Islands") { echo 'selected'; } ?> value="Faroe Islands">Faroe Islands</option>
							<option <?php if ($country == "Fiji") { echo 'selected'; } ?> value="Fiji">Fiji</option>
							<option <?php if ($country == "Finland") { echo 'selected'; } ?> value="Finland">Finland</option>
							<option <?php if ($country == "France") { echo 'selected'; } ?> value="France">France</option>
							<option <?php if ($country == "French Guiana") { echo 'selected'; } ?> value="French Guiana">French Guiana</option>
							<option <?php if ($country == "French Polynesia") { echo 'selected'; } ?> value="French Polynesia">French Polynesia</option>
							<option <?php if ($country == "French Southern Territories") { echo 'selected'; } ?> value="French Southern Territories">French Southern Territories</option>
							<option <?php if ($country == "Gabon") { echo 'selected'; } ?> value="Gabon">Gabon</option>
							<option <?php if ($country == "Gambia") { echo 'selected'; } ?> value="Gambia">Gambia</option>
							<option <?php if ($country == "Georgia") { echo 'selected'; } ?> value="Georgia">Georgia</option>
							<option <?php if ($country == "Germany") { echo 'selected'; } ?> value="Germany">Germany</option>
							<option <?php if ($country == "Ghana") { echo 'selected'; } ?> value="Ghana">Ghana</option>
							<option <?php if ($country == "Gibraltar") { echo 'selected'; } ?> value="Gibraltar">Gibraltar</option>
							<option <?php if ($country == "Greece") { echo 'selected'; } ?> value="Greece">Greece</option>
							<option <?php if ($country == "Greenland") { echo 'selected'; } ?> value="Greenland">Greenland</option>
							<option <?php if ($country == "Grenada") { echo 'selected'; } ?> value="Grenada">Grenada</option>
							<option <?php if ($country == "Guadeloupe") { echo 'selected'; } ?> value="Guadeloupe">Guadeloupe</option>
							<option <?php if ($country == "Guam") { echo 'selected'; } ?> value="Guam">Guam</option>
							<option <?php if ($country == "Guatemala") { echo 'selected'; } ?> value="Guatemala">Guatemala</option>
							<option <?php if ($country == "Guernsey") { echo 'selected'; } ?> value="Guernsey">Guernsey</option>
							<option <?php if ($country == "Guinea") { echo 'selected'; } ?> value="Guinea">Guinea</option>
							<option <?php if ($country == "Guinea-Bissau") { echo 'selected'; } ?> value="Guinea-Bissau">Guinea-Bissau</option>
							<option <?php if ($country == "Guyana") { echo 'selected'; } ?> value="Guyana">Guyana</option>
							<option <?php if ($country == "Haiti") { echo 'selected'; } ?> value="Haiti">Haiti</option>
							<option <?php if ($country == "Heard Island and McDonald Islands") { echo 'selected'; } ?> value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
							<option <?php if ($country == "Holy See (Vatican City State)") { echo 'selected'; } ?> value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
							<option <?php if ($country == "Honduras") { echo 'selected'; } ?> value="Honduras">Honduras</option>
							<option <?php if ($country == "Hong Kong") { echo 'selected'; } ?> value="Hong Kong">Hong Kong</option>
							<option <?php if ($country == "Hungary") { echo 'selected'; } ?> value="Hungary">Hungary</option>
							<option <?php if ($country == "Iceland") { echo 'selected'; } ?> value="Iceland">Iceland</option>
							<option <?php if ($country == "India") { echo 'selected'; } ?> value="India">India</option>
							<option <?php if ($country == "Indonesia") { echo 'selected'; } ?> value="Indonesia">Indonesia</option>
							<option <?php if ($country == "Iran, Islamic Republic of") { echo 'selected'; } ?> value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
							<option <?php if ($country == "Iraq") { echo 'selected'; } ?> value="Iraq">Iraq</option>
							<option <?php if ($country == "Ireland") { echo 'selected'; } ?> value="Ireland">Ireland</option>
							<option <?php if ($country == "Isle of Man") { echo 'selected'; } ?> value="Isle of Man">Isle of Man</option>
							<option <?php if ($country == "Israel") { echo 'selected'; } ?> value="Israel">Israel</option>
							<option <?php if ($country == "Italy") { echo 'selected'; } ?> value="Italy">Italy</option>
							<option <?php if ($country == "Jamaica") { echo 'selected'; } ?> value="Jamaica">Jamaica</option>
							<option <?php if ($country == "Japan") { echo 'selected'; } ?> value="Japan">Japan</option>
							<option <?php if ($country == "Jersey") { echo 'selected'; } ?> value="Jersey">Jersey</option>
							<option <?php if ($country == "Jordan") { echo 'selected'; } ?> value="Jordan">Jordan</option>
							<option <?php if ($country == "Kazakhstan") { echo 'selected'; } ?> value="Kazakhstan">Kazakhstan</option>
							<option <?php if ($country == "Kenya") { echo 'selected'; } ?> value="Kenya">Kenya</option>
							<option <?php if ($country == "Kiribati") { echo 'selected'; } ?> value="Kiribati">Kiribati</option>
							<option <?php if ($country == "Korea, Democratic People's Republic of") { echo 'selected'; } ?> value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
							<option <?php if ($country == "Korea, Republic of") { echo 'selected'; } ?> value="Korea, Republic of">Korea, Republic of</option>
							<option <?php if ($country == "Kuwait") { echo 'selected'; } ?> value="Kuwait">Kuwait</option>
							<option <?php if ($country == "Kyrgyzstan") { echo 'selected'; } ?> value="Kyrgyzstan">Kyrgyzstan</option>
							<option <?php if ($country == "Lao People's Democratic Republic") { echo 'selected'; } ?> value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
							<option <?php if ($country == "Latvia") { echo 'selected'; } ?> value="Latvia">Latvia</option>
							<option <?php if ($country == "Lebanon") { echo 'selected'; } ?> value="Lebanon">Lebanon</option>
							<option <?php if ($country == "Lesotho") { echo 'selected'; } ?> value="Lesotho">Lesotho</option>
							<option <?php if ($country == "Liberia") { echo 'selected'; } ?> value="Liberia">Liberia</option>
							<option <?php if ($country == "Libya") { echo 'selected'; } ?> value="Libya">Libya</option>
							<option <?php if ($country == "Liechtenstein") { echo 'selected'; } ?> value="Liechtenstein">Liechtenstein</option>
							<option <?php if ($country == "Lithuania") { echo 'selected'; } ?> value="Lithuania">Lithuania</option>
							<option <?php if ($country == "Luxembourg") { echo 'selected'; } ?> value="Luxembourg">Luxembourg</option>
							<option <?php if ($country == "Macao") { echo 'selected'; } ?> value="Macao">Macao</option>
							<option <?php if ($country == "Macedonia, the former Yugoslav Republic of") { echo 'selected'; } ?> value="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav Republic of</option>
							<option <?php if ($country == "Madagascar") { echo 'selected'; } ?> value="Madagascar">Madagascar</option>
							<option <?php if ($country == "Malawi") { echo 'selected'; } ?> value="Malawi">Malawi</option>
							<option <?php if ($country == "Malaysia") { echo 'selected'; } ?> value="Malaysia">Malaysia</option>
							<option <?php if ($country == "Maldives") { echo 'selected'; } ?> value="Maldives">Maldives</option>
							<option <?php if ($country == "Mali") { echo 'selected'; } ?> value="Mali">Mali</option>
							<option <?php if ($country == "Malta") { echo 'selected'; } ?> value="Malta">Malta</option>
							<option <?php if ($country == "Marshall Islands") { echo 'selected'; } ?> value="Marshall Islands">Marshall Islands</option>
							<option <?php if ($country == "Martinique") { echo 'selected'; } ?> value="Martinique">Martinique</option>
							<option <?php if ($country == "Mauritania") { echo 'selected'; } ?> value="Mauritania">Mauritania</option>
							<option <?php if ($country == "Mauritius") { echo 'selected'; } ?> value="Mauritius">Mauritius</option>
							<option <?php if ($country == "Mayotte") { echo 'selected'; } ?> value="Mayotte">Mayotte</option>
							<option <?php if ($country == "Mexico") { echo 'selected'; } ?> value="Mexico">Mexico</option>
							<option <?php if ($country == "Micronesia, Federated States of") { echo 'selected'; } ?> value="Micronesia, Federated States of">Micronesia, Federated States of</option>
							<option <?php if ($country == "Moldova, Republic of") { echo 'selected'; } ?> value="Moldova, Republic of">Moldova, Republic of</option>
							<option <?php if ($country == "Monaco") { echo 'selected'; } ?> value="Monaco">Monaco</option>
							<option <?php if ($country == "Mongolia") { echo 'selected'; } ?> value="Mongolia">Mongolia</option>
							<option <?php if ($country == "Montenegro") { echo 'selected'; } ?> value="Montenegro">Montenegro</option>
							<option <?php if ($country == "Montserrat") { echo 'selected'; } ?> value="Montserrat">Montserrat</option>
							<option <?php if ($country == "Morocco") { echo 'selected'; } ?> value="Morocco">Morocco</option>
							<option <?php if ($country == "Mozambique") { echo 'selected'; } ?> value="Mozambique">Mozambique</option>
							<option <?php if ($country == "Myanmar") { echo 'selected'; } ?> value="Myanmar">Myanmar</option>
							<option <?php if ($country == "Namibia") { echo 'selected'; } ?> value="Namibia">Namibia</option>
							<option <?php if ($country == "Nauru") { echo 'selected'; } ?> value="Nauru">Nauru</option>
							<option <?php if ($country == "Nepal") { echo 'selected'; } ?> value="Nepal">Nepal</option>
							<option <?php if ($country == "Netherlands") { echo 'selected'; } ?> value="Netherlands">Netherlands</option>
							<option <?php if ($country == "New Caledonia") { echo 'selected'; } ?> value="New Caledonia">New Caledonia</option>
							<option <?php if ($country == "New Zealand") { echo 'selected'; } ?> value="New Zealand">New Zealand</option>
							<option <?php if ($country == "Nicaragua") { echo 'selected'; } ?> value="Nicaragua">Nicaragua</option>
							<option <?php if ($country == "Niger") { echo 'selected'; } ?> value="Niger">Niger</option>
							<option <?php if ($country == "Nigeria") { echo 'selected'; } ?> value="Nigeria">Nigeria</option>
							<option <?php if ($country == "Niue") { echo 'selected'; } ?> value="Niue">Niue</option>
							<option <?php if ($country == "Norfolk Island") { echo 'selected'; } ?> value="Norfolk Island">Norfolk Island</option>
							<option <?php if ($country == "Northern Mariana Islands") { echo 'selected'; } ?> value="Northern Mariana Islands">Northern Mariana Islands</option>
							<option <?php if ($country == "Norway") { echo 'selected'; } ?> value="Norway">Norway</option>
							<option <?php if ($country == "Oman") { echo 'selected'; } ?> value="Oman">Oman</option>
							<option <?php if ($country == "Pakistan") { echo 'selected'; } ?> value="Pakistan">Pakistan</option>
							<option <?php if ($country == "Palau") { echo 'selected'; } ?> value="Palau">Palau</option>
							<option <?php if ($country == "Palestinian Territory, Occupied") { echo 'selected'; } ?> value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
							<option <?php if ($country == "Panama") { echo 'selected'; } ?> value="Panama">Panama</option>
							<option <?php if ($country == "Papua New Guinea") { echo 'selected'; } ?> value="Papua New Guinea">Papua New Guinea</option>
							<option <?php if ($country == "Paraguay") { echo 'selected'; } ?> value="Paraguay">Paraguay</option>
							<option <?php if ($country == "Peru") { echo 'selected'; } ?> value="Peru">Peru</option>
							<option <?php if ($country == "Philippines") { echo 'selected'; } ?> value="Philippines">Philippines</option>
							<option <?php if ($country == "Pitcairn") { echo 'selected'; } ?> value="Pitcairn">Pitcairn</option>
							<option <?php if ($country == "Poland") { echo 'selected'; } ?> value="Poland">Poland</option>
							<option <?php if ($country == "Portugal") { echo 'selected'; } ?> value="Portugal">Portugal</option>
							<option <?php if ($country == "Puerto Rico") { echo 'selected'; } ?> value="Puerto Rico">Puerto Rico</option>
							<option <?php if ($country == "Qatar") { echo 'selected'; } ?> value="Qatar">Qatar</option>
							<option <?php if ($country == "Réunion") { echo 'selected'; } ?> value="Réunion">Réunion</option>
							<option <?php if ($country == "Romania") { echo 'selected'; } ?> value="Romania">Romania</option>
							<option <?php if ($country == "Russian Federation") { echo 'selected'; } ?> value="Russian Federation">Russian Federation</option>
							<option <?php if ($country == "Rwanda") { echo 'selected'; } ?> value="Rwanda">Rwanda</option>
							<option <?php if ($country == "Saint Barthélemy") { echo 'selected'; } ?> value="Saint Barthélemy">Saint Barthélemy</option>
							<option <?php if ($country == "Saint Helena, Ascension and Tristan da Cunha") { echo 'selected'; } ?> value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
							<option <?php if ($country == "Saint Kitts and Nevis") { echo 'selected'; } ?> value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
							<option <?php if ($country == "Saint Lucia") { echo 'selected'; } ?> value="Saint Lucia">Saint Lucia</option>
							<option <?php if ($country == "Saint Martin (French part)") { echo 'selected'; } ?> value="Saint Martin (French part)">Saint Martin (French part)</option>
							<option <?php if ($country == "Saint Pierre and Miquelon") { echo 'selected'; } ?> value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
							<option <?php if ($country == "Saint Vincent and the Grenadines") { echo 'selected'; } ?> value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
							<option <?php if ($country == "Samoa") { echo 'selected'; } ?> value="Samoa">Samoa</option>
							<option <?php if ($country == "San Marino") { echo 'selected'; } ?> value="San Marino">San Marino</option>
							<option <?php if ($country == "Sao Tome and Principe") { echo 'selected'; } ?> value="Sao Tome and Principe">Sao Tome and Principe</option>
							<option <?php if ($country == "Saudi Arabia") { echo 'selected'; } ?> value="Saudi Arabia">Saudi Arabia</option>
							<option <?php if ($country == "Senegal") { echo 'selected'; } ?> value="Senegal">Senegal</option>
							<option <?php if ($country == "Serbia") { echo 'selected'; } ?> value="Serbia">Serbia</option>
							<option <?php if ($country == "Seychelles") { echo 'selected'; } ?> value="Seychelles">Seychelles</option>
							<option <?php if ($country == "Sierra Leone") { echo 'selected'; } ?> value="Sierra Leone">Sierra Leone</option>
							<option <?php if ($country == "Singapore") { echo 'selected'; } ?> value="Singapore">Singapore</option>
							<option <?php if ($country == "Sint Maarten (Dutch part)") { echo 'selected'; } ?> value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
							<option <?php if ($country == "Slovakia") { echo 'selected'; } ?> value="Slovakia">Slovakia</option>
							<option <?php if ($country == "Slovenia") { echo 'selected'; } ?> value="Slovenia">Slovenia</option>
							<option <?php if ($country == "Solomon Islands") { echo 'selected'; } ?> value="Solomon Islands">Solomon Islands</option>
							<option <?php if ($country == "Somalia") { echo 'selected'; } ?> value="Somalia">Somalia</option>
							<option <?php if ($country == "South Africa") { echo 'selected'; } ?> value="South Africa">South Africa</option>
							<option <?php if ($country == "South Georgia and the South Sandwich Islands") { echo 'selected'; } ?> value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
							<option <?php if ($country == "South Sudan") { echo 'selected'; } ?> value="South Sudan">South Sudan</option>
							<option <?php if ($country == "Spain") { echo 'selected'; } ?> value="Spain">Spain</option>
							<option <?php if ($country == "Sri Lanka") { echo 'selected'; } ?> value="Sri Lanka">Sri Lanka</option>
							<option <?php if ($country == "Sudan") { echo 'selected'; } ?> value="Sudan">Sudan</option>
							<option <?php if ($country == "Suriname") { echo 'selected'; } ?> value="Suriname">Suriname</option>
							<option <?php if ($country == "Svalbard and Jan Mayen") { echo 'selected'; } ?> value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
							<option <?php if ($country == "Swaziland") { echo 'selected'; } ?> value="Swaziland">Swaziland</option>
							<option <?php if ($country == "Sweden") { echo 'selected'; } ?> value="Sweden">Sweden</option>
							<option <?php if ($country == "Switzerland") { echo 'selected'; } ?> value="Switzerland">Switzerland</option>
							<option <?php if ($country == "Syrian Arab Republic") { echo 'selected'; } ?> value="Syrian Arab Republic">Syrian Arab Republic</option>
							<option <?php if ($country == "Taiwan, Province of China") { echo 'selected'; } ?> value="Taiwan, Province of China">Taiwan, Province of China</option>
							<option <?php if ($country == "Tajikistan") { echo 'selected'; } ?> value="Tajikistan">Tajikistan</option>
							<option <?php if ($country == "Tanzania, United Republic of") { echo 'selected'; } ?> value="Tanzania, United Republic of">Tanzania, United Republic of</option>
							<option <?php if ($country == "Thailand") { echo 'selected'; } ?> value="Thailand">Thailand</option>
							<option <?php if ($country == "Timor-Leste") { echo 'selected'; } ?> value="Timor-Leste">Timor-Leste</option>
							<option <?php if ($country == "Togo") { echo 'selected'; } ?> value="Togo">Togo</option>
							<option <?php if ($country == "Tokelau") { echo 'selected'; } ?> value="Tokelau">Tokelau</option>
							<option <?php if ($country == "Tonga") { echo 'selected'; } ?> value="Tonga">Tonga</option>
							<option <?php if ($country == "Trinidad and Tobago") { echo 'selected'; } ?> value="Trinidad and Tobago">Trinidad and Tobago</option>
							<option <?php if ($country == "Tunisia") { echo 'selected'; } ?> value="Tunisia">Tunisia</option>
							<option <?php if ($country == "Turkey") { echo 'selected'; } ?> value="Turkey">Turkey</option>
							<option <?php if ($country == "Turkmenistan") { echo 'selected'; } ?> value="Turkmenistan">Turkmenistan</option>
							<option <?php if ($country == "Turks and Caicos Islands") { echo 'selected'; } ?> value="Turks and Caicos Islands">Turks and Caicos Islands</option>
							<option <?php if ($country == "Tuvalu") { echo 'selected'; } ?> value="Tuvalu">Tuvalu</option>
							<option <?php if ($country == "Uganda") { echo 'selected'; } ?> value="Uganda">Uganda</option>
							<option <?php if ($country == "Ukraine") { echo 'selected'; } ?> value="Ukraine">Ukraine</option>
							<option <?php if ($country == "United Arab Emirates") { echo 'selected'; } ?> value="United Arab Emirates">United Arab Emirates</option>
							<option <?php if ($country == "United Kingdom") { echo 'selected'; } ?> value="United Kingdom">United Kingdom</option>
							<option <?php if ($country == "United States") { echo 'selected'; } ?> value="United States">United States</option>
							<option <?php if ($country == "United States Minor Outlying Islands") { echo 'selected'; } ?> value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
							<option <?php if ($country == "Uruguay") { echo 'selected'; } ?> value="Uruguay">Uruguay</option>
							<option <?php if ($country == "Uzbekistan") { echo 'selected'; } ?> value="Uzbekistan">Uzbekistan</option>
							<option <?php if ($country == "Vanuatu") { echo 'selected'; } ?> value="Vanuatu">Vanuatu</option>
							<option <?php if ($country == "Venezuela, Bolivarian Republic of") { echo 'selected'; } ?> value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
							<option <?php if ($country == "Viet Nam") { echo 'selected'; } ?> value="Viet Nam">Viet Nam</option>
							<option <?php if ($country == "Virgin Islands, British") { echo 'selected'; } ?> value="Virgin Islands, British">Virgin Islands, British</option>
							<option <?php if ($country == "Virgin Islands, U.S.") { echo 'selected'; } ?> value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
							<option <?php if ($country == "Wallis and Futuna") { echo 'selected'; } ?> value="Wallis and Futuna">Wallis and Futuna</option>
							<option <?php if ($country == "Western Sahara") { echo 'selected'; } ?> value="Western Sahara">Western Sahara</option>
							<option <?php if ($country == "Yemen") { echo 'selected'; } ?> value="Yemen">Yemen</option>
							<option <?php if ($country == "Zambia") { echo 'selected'; } ?> value="Zambia">Zambia</option>
							<option <?php if ($country == "Zimbabwe") { echo 'selected'; } ?> value="Zimbabwe">Zimbabwe</option>
                        </select>
                        <select class="form-control" name="skala_richter">
                            <option value="">--skala-richter--</option>
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
                        <select class="form-control" name="tsunami">
                            <option value="" selected="selected">--potensi tsunami--</option>
                            <option <?php if ($tsunami == 0) { echo 'selected'; } ?> value="0">tidak berpotensi tsunami</option>
                            <option <?php if ($tsunami == 1) { echo 'selected'; } ?> value="1">berpotensi tsunami</option>
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                      <?= $this->Form->end() ?>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
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
                            <td><strong><?= $lokasi ?></strong></td>
                            <td><strong><?= $country ?></strong></td>
                            <td><?= $value->mag ?></td>
                            <td><?= date('d/m/Y H:i A', $time) ?></td>
                            <td><a href="/pages/<?= $value->id_gempa.DS.$slug ?>" class="btn btn-success" >Detail</a></td>
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
        </div>