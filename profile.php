<?php 
include 'components/h_dashboard.php';


if($_SESSION['login'] == FALSE)
{
   header('location:login.php');

}

?>
<html>
        <?php 
        $cust_id= $_SESSION['customer_id'];
        include 'db_connect.php'; 
        $sql="SELECT * FROM customers where customer_id= '$cust_id' ";
    $result = $conn->query($sql);
        $row1 = $result->fetch_assoc();
        
?>

 <div id="main-wrapper">  
  <!-- Secondary Menu
  ============================================= -->
  <div class="bg-dark">
    <div class="container d-flex justify-content-center">
      <ul class="nav nav-tabs secondary-nav" role="tablist">
        <li class="nav-item" role="presentation"> <a class="nav-link active" href="#profile" aria-controls="profile" role="tab" data-bs-toggle="tab">Profile</a></li>
        <li class="nav-item" role="presentation"> <a class="nav-link" href="#notification" aria-controls="notification" role="tab" data-bs-toggle="tab">Notifications</a></li>
      </ul>
      </div>
  </div>
  <!-- Secondary Menu end --> 
<div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="profile">
<!-- Content
  ============================================= -->
  <div id="content" class="py-4">
    <div class="container">
      <div class="row"> 
        
        <!-- Left Panel
        ============================================= -->
        <aside class="col-lg-3"> 
          <?php if (!empty($msg)): ?>
            <?php echo $msg; ?>
            <?php endif; ?>
         
          <!-- Profile Details
          =============================== -->
          <div class="bg-light shadow-sm rounded text-center p-3 mb-4">
          <?php echo  "<div class='profile-thumb mt-3 mb-5'> <img class='rounded-circle' width='100' height='100'src='assets/images/".$row1['photo']."' alt='".$row1['username']."'>"; ?>
          <form action="profile.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
              <div class="profile-thumb-edit custom-file bg-primary text-white" data-bs-toggle="tooltip" title="Change Profile Picture"> <i class="fas fa-camera position-absolute"></i>
                  <input type="file" class="custom-file-input" id="customFile" name="photo" value="update"></div>
                <button id="ubtn" class="theme-btn3 mt-4 w-100" type="submit" name="upload">update</button>
              </form>
            </div>
          </div>
          <!-- Profile Details End -->
          
          <!-- Need Help?
          =============================== -->
          <div class="bg-light shadow-sm rounded text-center p-3 mb-4">
            <div class="text-17 text-wallet my-3"><i class="fas fa-comments"></i></div>
            <h3 class="text-3 font-weight-400 my-4">Need Help?</h3>
            <p class="text-muted opacity-8 mb-4">Have questions or concerns regrading your account?<br>
              Our experts are here to help!.</p>
            <a href="#" class="theme-btn3">Chat with Us</a> </div>
          <!-- Need Help? End --> 
          
        </aside>
        <!-- Left Panel End --> 
        
        <!-- Middle Panel
        ============================================= -->
        <div class="col-lg-9">
          
          <!-- Personal Details
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4 mb-4">
            <h3 class="text-5 font-weight-400 mb-3">Personal Details <a href="#edit-personal-details" data-bs-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i class="fas fa-edit me-1"></i>Edit</a></h3>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
              <p class="col-sm-9"><?php echo $row1['username']; ?>&nbsp;<?php echo $row1['lastname']; ?></p>
            </div>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
              <p class="col-sm-9"><?php echo $row1['dob']; ?></p>
            </div>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Address</p>
              <p class="col-sm-9"><?php echo $row1['home_addr']; ?><br>
                <?php echo $row1['city']; ?>,<br>
                <?php echo $row1['state']; ?>-<?php echo $row1['zip']; ?>,<br>
                <?php echo $row1['country']; ?>.</p>
            </div>
          </div>
          <!-- Edit Details Modal
          ================================== -->
          <div id="edit-personal-details" class="modal fade " role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Personal Details</h5>
                  <button type="button" class="close font-weight-400" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="personaldetails" method="post" action="profile.php" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group mb-4">
                          <label for="birthDate">Date of Birth</label>
                          <div class="position-relative">
                            <input id="birthDate" value="<?php echo $row1['dob']; ?>" name="dob" type="text" class="form-control" required placeholder="Date of Birth">
                            <span class="icon-inside"><i class="fas fa-calendar-alt"></i></span> </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <h3 class="text-5 font-weight-400 mt-3">Address</h3>
                        <hr>
                      </div>
                      <div class="col-12">
                        <div class="form-group mb-4">
                          <label for="address">Address</label>
                          <input type="text" value="<?php echo $row1['home_addr']; ?>" class="form-control" data-bv-field="address" id="street" name="home_addr" required placeholder="Address 1">
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group mb-4">
                          <label for="city">City</label>
                          <input id="city" value="<?php echo $row1['city']; ?>"name="city" type="text" class="form-control" required placeholder="City">
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label for="input-zone">State</label>
                          <select class="nice-select" id="input-zone" name="state">
                            <option disabled selected value="<?php echo $row1['state']; ?>"><?php echo $row1['state']; ?></option>
                            <option value="Alabama">Alabama</option>
                            <option value="Alaska">Alaska</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Arizona">Arizona</option>
                            <option value="Arkansas">Arkansas</option>
                            <option value="Armed Forces Africa">Armed Forces Africa</option>
                            <option value="Armed Forces Americas">Armed Forces Americas</option>
                            <option value="Armed Forces Canada">Armed Forces Canada</option>
                            <option value="Armed Forces Europe">Armed Forces Europe</option>
                            <option value="Armed Forces Middle East">Armed Forces Middle East</option>
                            <option value="Armed Forces Pacific">Armed Forces Pacific</option>
                            <option value="California">California</option>
                            <option value="Colorado">Colorado</option>
                            <option value="Connecticut">Connecticut</option>
                            <option value="Delaware">Delaware</option>
                            <option value="District of Columbia">District of Columbia</option>
                            <option value="Federated States Of Micronesia">Federated States Of Micronesia</option>
                            <option value="Florida">Florida</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Guam">Guam</option>
                            <option value="Hawaii">Hawaii</option>
                            <option value="Idaho">Idaho</option>
                            <option value="Illinois">Illinois</option>
                            <option value="Indiana">Indiana</option>
                            <option value="Iowa">Iowa</option>
                            <option value="Kansas">Kansas</option>
                            <option value="Kentucky">Kentucky</option>
                            <option value="Louisiana">Louisiana</option>
                            <option value="Maine">Maine</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Maryland">Maryland</option>
                            <option value="Massachusetts">Massachusetts</option>
                            <option value="Michigan">Michigan</option>
                            <option value="Minnesota">Minnesota</option>
                            <option value="Mississippi">Mississippi</option>
                            <option value="Missouri">Missouri</option>
                            <option value="Montana">Montana</option>
                            <option value="Nebraska">Nebraska</option>
                            <option value="Nevada">Nevada</option>
                            <option value="New Hampshire">New Hampshire</option>
                            <option value="New Jersey">New Jersey</option>
                            <option value="New Mexico">New Mexico</option>
                            <option value="New York">New York</option>
                            <option value="North Carolina">North Carolina</option>
                            <option value="North Dakota">North Dakota</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Ohio">Ohio</option>
                            <option value="Oklahoma">Oklahoma</option>
                            <option value="Oregon">Oregon</option>
                            <option value="Palau">Palau</option>
                            <option value="Pennsylvania">Pennsylvania</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Rhode Island">Rhode Island</option>
                            <option value="South Carolina">South Carolina</option>
                            <option value="South Dakota">South Dakota</option>
                            <option value="Tennessee">Tennessee</option>
                            <option value="Texas">Texas</option>
                            <option value="Utah">Utah</option>
                            <option value="Vermont">Vermont</option>
                            <option value="Virgin Islands">Virgin Islands</option>
                            <option value="Virginia">Virginia</option>
                            <option value="Washington">Washington</option>
                            <option value="West Virginia">West Virginia</option>
                            <option value="Wisconsin">Wisconsin</option>
                            <option value="Wyoming">Wyoming</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group mb-4">
                          <label for="zipCode">Zip Code</label>
                          <input id="zipCode" value="<?php echo $row1['zip']; ?>" name="zip" type="text" class="form-control" required placeholder="ZipCode">
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group mb-4">
                          <label for="inputCountry">Country</label>
                          <select class="nice-select" id="inputCountry" name="country">
                            <option disabled selected value="<?php echo $row1['country']; ?>"><?php echo $row1['country']; ?></option>
                            <option value="244">Aaland Islands</option>
                            <option value="1">Afghanistan</option>
                            <option value="2">Albania</option>
                            <option value="3">Algeria</option>
                            <option value="4">American Samoa</option>
                            <option value="5">Andorra</option>
                            <option value="6">Angola</option>
                            <option value="7">Anguilla</option>
                            <option value="8">Antarctica</option>
                            <option value="9">Antigua and Barbuda</option>
                            <option value="10">Argentina</option>
                            <option value="11">Armenia</option>
                            <option value="12">Aruba</option>
                            <option value="252">Ascension Island (British)</option>
                            <option value="13">Australia</option>
                            <option value="14">Austria</option>
                            <option value="15">Azerbaijan</option>
                            <option value="16">Bahamas</option>
                            <option value="17">Bahrain</option>
                            <option value="18">Bangladesh</option>
                            <option value="19">Barbados</option>
                            <option value="20">Belarus</option>
                            <option value="21">Belgium</option>
                            <option value="22">Belize</option>
                            <option value="23">Benin</option>
                            <option value="24">Bermuda</option>
                            <option value="25">Bhutan</option>
                            <option value="26">Bolivia</option>
                            <option value="245">Bonaire, Sint Eustatius and Saba</option>
                            <option value="27">Bosnia and Herzegovina</option>
                            <option value="28">Botswana</option>
                            <option value="29">Bouvet Island</option>
                            <option value="30">Brazil</option>
                            <option value="31">British Indian Ocean Territory</option>
                            <option value="32">Brunei Darussalam</option>
                            <option value="33">Bulgaria</option>
                            <option value="34">Burkina Faso</option>
                            <option value="35">Burundi</option>
                            <option value="36">Cambodia</option>
                            <option value="37">Cameroon</option>
                            <option value="38">Canada</option>
                            <option value="251">Canary Islands</option>
                            <option value="39">Cape Verde</option>
                            <option value="40">Cayman Islands</option>
                            <option value="41">Central African Republic</option>
                            <option value="42">Chad</option>
                            <option value="43">Chile</option>
                            <option value="44">China</option>
                            <option value="45">Christmas Island</option>
                            <option value="46">Cocos (Keeling) Islands</option>
                            <option value="47">Colombia</option>
                            <option value="48">Comoros</option>
                            <option value="49">Congo</option>
                            <option value="50">Cook Islands</option>
                            <option value="51">Costa Rica</option>
                            <option value="52">Cote D'Ivoire</option>
                            <option value="53">Croatia</option>
                            <option value="54">Cuba</option>
                            <option value="246">Curacao</option>
                            <option value="55">Cyprus</option>
                            <option value="56">Czech Republic</option>
                            <option value="237">Democratic Republic of Congo</option>
                            <option value="57">Denmark</option>
                            <option value="58">Djibouti</option>
                            <option value="59">Dominica</option>
                            <option value="60">Dominican Republic</option>
                            <option value="61">East Timor</option>
                            <option value="62">Ecuador</option>
                            <option value="63">Egypt</option>
                            <option value="64">El Salvador</option>
                            <option value="65">Equatorial Guinea</option>
                            <option value="66">Eritrea</option>
                            <option value="67">Estonia</option>
                            <option value="68">Ethiopia</option>
                            <option value="69">Falkland Islands (Malvinas)</option>
                            <option value="70">Faroe Islands</option>
                            <option value="71">Fiji</option>
                            <option value="72">Finland</option>
                            <option value="74">France, Metropolitan</option>
                            <option value="75">French Guiana</option>
                            <option value="76">French Polynesia</option>
                            <option value="77">French Southern Territories</option>
                            <option value="126">FYROM</option>
                            <option value="78">Gabon</option>
                            <option value="79">Gambia</option>
                            <option value="80">Georgia</option>
                            <option value="81">Germany</option>
                            <option value="82">Ghana</option>
                            <option value="83">Gibraltar</option>
                            <option value="84">Greece</option>
                            <option value="85">Greenland</option>
                            <option value="86">Grenada</option>
                            <option value="87">Guadeloupe</option>
                            <option value="88">Guam</option>
                            <option value="89">Guatemala</option>
                            <option value="256">Guernsey</option>
                            <option value="90">Guinea</option>
                            <option value="91">Guinea-Bissau</option>
                            <option value="92">Guyana</option>
                            <option value="93">Haiti</option>
                            <option value="94">Heard and Mc Donald Islands</option>
                            <option value="95">Honduras</option>
                            <option value="96">Hong Kong</option>
                            <option value="97">Hungary</option>
                            <option value="98">Iceland</option>
                            <option value="99">India</option>
                            <option value="100">Indonesia</option>
                            <option value="101">Iran (Islamic Republic of)</option>
                            <option value="102">Iraq</option>
                            <option value="103">Ireland</option>
                            <option value="254">Isle of Man</option>
                            <option value="104">Israel</option>
                            <option value="105">Italy</option>
                            <option value="106">Jamaica</option>
                            <option value="107">Japan</option>
                            <option value="257">Jersey</option>
                            <option value="108">Jordan</option>
                            <option value="109">Kazakhstan</option>
                            <option value="110">Kenya</option>
                            <option value="111">Kiribati</option>
                            <option value="113">Korea, Republic of</option>
                            <option value="253">Kosovo, Republic of</option>
                            <option value="114">Kuwait</option>
                            <option value="115">Kyrgyzstan</option>
                            <option value="116">Lao People's Democratic Republic</option>
                            <option value="117">Latvia</option>
                            <option value="118">Lebanon</option>
                            <option value="119">Lesotho</option>
                            <option value="120">Liberia</option>
                            <option value="121">Libyan Arab Jamahiriya</option>
                            <option value="122">Liechtenstein</option>
                            <option value="123">Lithuania</option>
                            <option value="124">Luxembourg</option>
                            <option value="125">Macau</option>
                            <option value="127">Madagascar</option>
                            <option value="128">Malawi</option>
                            <option value="129">Malaysia</option>
                            <option value="130">Maldives</option>
                            <option value="131">Mali</option>
                            <option value="132">Malta</option>
                            <option value="133">Marshall Islands</option>
                            <option value="134">Martinique</option>
                            <option value="135">Mauritania</option>
                            <option value="136">Mauritius</option>
                            <option value="137">Mayotte</option>
                            <option value="138">Mexico</option>
                            <option value="139">Micronesia, Federated States of</option>
                            <option value="140">Moldova, Republic of</option>
                            <option value="141">Monaco</option>
                            <option value="142">Mongolia</option>
                            <option value="242">Montenegro</option>
                            <option value="143">Montserrat</option>
                            <option value="144">Morocco</option>
                            <option value="145">Mozambique</option>
                            <option value="146">Myanmar</option>
                            <option value="147">Namibia</option>
                            <option value="148">Nauru</option>
                            <option value="149">Nepal</option>
                            <option value="150">Netherlands</option>
                            <option value="151">Netherlands Antilles</option>
                            <option value="152">New Caledonia</option>
                            <option value="153">New Zealand</option>
                            <option value="154">Nicaragua</option>
                            <option value="155">Niger</option>
                            <option value="156">Nigeria</option>
                            <option value="157">Niue</option>
                            <option value="158">Norfolk Island</option>
                            <option value="112">North Korea</option>
                            <option value="159">Northern Mariana Islands</option>
                            <option value="160">Norway</option>
                            <option value="161">Oman</option>
                            <option value="162">Pakistan</option>
                            <option value="163">Palau</option>
                            <option value="247">Palestinian Territory, Occupied</option>
                            <option value="164">Panama</option>
                            <option value="165">Papua New Guinea</option>
                            <option value="166">Paraguay</option>
                            <option value="167">Peru</option>
                            <option value="168">Philippines</option>
                            <option value="169">Pitcairn</option>
                            <option value="170">Poland</option>
                            <option value="171">Portugal</option>
                            <option value="172">Puerto Rico</option>
                            <option value="173">Qatar</option>
                            <option value="174">Reunion</option>
                            <option value="175">Romania</option>
                            <option value="176">Russian Federation</option>
                            <option value="177">Rwanda</option>
                            <option value="178">Saint Kitts and Nevis</option>
                            <option value="179">Saint Lucia</option>
                            <option value="180">Saint Vincent and the Grenadines</option>
                            <option value="181">Samoa</option>
                            <option value="182">San Marino</option>
                            <option value="183">Sao Tome and Principe</option>
                            <option value="184">Saudi Arabia</option>
                            <option value="185">Senegal</option>
                            <option value="243">Serbia</option>
                            <option value="186">Seychelles</option>
                            <option value="187">Sierra Leone</option>
                            <option value="188">Singapore</option>
                            <option value="189">Slovak Republic</option>
                            <option value="190">Slovenia</option>
                            <option value="191">Solomon Islands</option>
                            <option value="192">Somalia</option>
                            <option value="193">South Africa</option>
                            <option value="194">South Georgia &amp; South Sandwich Islands</option>
                            <option value="248">South Sudan</option>
                            <option value="195">Spain</option>
                            <option value="196">Sri Lanka</option>
                            <option value="249">St. Barthelemy</option>
                            <option value="197">St. Helena</option>
                            <option value="250">St. Martin (French part)</option>
                            <option value="198">St. Pierre and Miquelon</option>
                            <option value="199">Sudan</option>
                            <option value="200">Suriname</option>
                            <option value="201">Svalbard and Jan Mayen Islands</option>
                            <option value="202">Swaziland</option>
                            <option value="203">Sweden</option>
                            <option value="204">Switzerland</option>
                            <option value="205">Syrian Arab Republic</option>
                            <option value="206">Taiwan</option>
                            <option value="207">Tajikistan</option>
                            <option value="208">Tanzania, United Republic of</option>
                            <option value="209">Thailand</option>
                            <option value="210">Togo</option>
                            <option value="211">Tokelau</option>
                            <option value="212">Tonga</option>
                            <option value="213">Trinidad and Tobago</option>
                            <option value="255">Tristan da Cunha</option>
                            <option value="214">Tunisia</option>
                            <option value="215">Turkey</option>
                            <option value="216">Turkmenistan</option>
                            <option value="217">Turks and Caicos Islands</option>
                            <option value="218">Tuvalu</option>
                            <option value="219">Uganda</option>
                            <option value="220">Ukraine</option>
                            <option value="221">United Arab Emirates</option>
                            <option value="222">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                            <option value="225">Uruguay</option>
                            <option value="226">Uzbekistan</option>
                            <option value="227">Vanuatu</option>
                            <option value="228">Vatican City State (Holy See)</option>
                            <option value="229">Venezuela</option>
                            <option value="230">Viet Nam</option>
                            <option value="231">Virgin Islands (British)</option>
                            <option value="232">Virgin Islands (U.S.)</option>
                            <option value="233">Wallis and Futuna Islands</option>
                            <option value="234">Western Sahara</option>
                            <option value="235">Yemen</option>
                            <option value="238">Zambia</option>
                            <option value="239">Zimbabwe</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button class="theme-btn3 justify-content-center mt-4 w-100" type="submit" name="savepd">Save Changes</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Personal Details End -->
          
          <!-- Account Settings
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4 mb-4">
            <h3 class="text-5 font-weight-400 mb-3">Account Settings <a href="#edit-account-settings" data-bs-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i class="fas fa-edit mr-1"></i>Edit</a></h3>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Language</p>
              <p class="col-sm-9">English (United States)</p>
            </div>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Time Zone</p>
              <p class="col-sm-9">(GMT-06:00) Central America</p>
            </div>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Account Status</p>
              <p class="col-sm-9"><span class="bg-success text-white rounded-pill d-inline-block px-2 mb-0"><i class="fas fa-check-circle"></i> Active</span></p>
            </div>
          </div>
          <!-- Edit Details Modal
          ================================== -->
          <div id="edit-account-settings" class="modal fade " role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Account Settings</h5>
                  <button type="button" class="close font-weight-400" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="accountSettings" method="post">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group mb-4">
                          <label for="language">Language</label>
                          <select class="nice-select" id="language" name="language_id">
                            <option value="1">English (United States)</option>
                            <option value="2">Spanish </option>
                            <option value="3">Chinese</option>
                            <option value="4">Russian</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label for="input-timezone">Time Zone</label>
                          <select class="nice-select" id="input-timezone" name="timezone_id">
                            <option value="-12">(GMT-12:00) International Date Line West</option>
                            <option value="-11">(GMT-11:00) Midway Island, Samoa</option>
                            <option value="-10">(GMT-10:00) Hawaii</option>
                            <option value="-9">(GMT-09:00) Alaska</option>
                            <option value="-8">(GMT-08:00) Pacific Time (US & Canada)</option>
                            <option value="-8">(GMT-08:00) Tijuana, Baja California</option>
                            <option value="-7">(GMT-07:00) Arizona</option>
                            <option value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                            <option value="-7">(GMT-07:00) Mountain Time (US & Canada)</option>
                            <option selected="selected" value="-6">(GMT-06:00) Central America</option>
                            <option value="-6">(GMT-06:00) Central Time (US & Canada)</option>
                            <option value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                            <option value="-6">(GMT-06:00) Saskatchewan</option>
                            <option value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                            <option value="-5">(GMT-05:00) Eastern Time (US & Canada)</option>
                            <option value="-5">(GMT-05:00) Indiana (East)</option>
                            <option value="-4">(GMT-04:00) Atlantic Time (Canada)</option>
                            <option value="-4">(GMT-04:00) Caracas, La Paz</option>
                            <option value="-4">(GMT-04:00) Manaus</option>
                            <option value="-4">(GMT-04:00) Santiago</option>
                            <option value="-3.5">(GMT-03:30) Newfoundland</option>
                            <option value="-3">(GMT-03:00) Brasilia</option>
                            <option value="-3">(GMT-03:00) Buenos Aires, Georgetown</option>
                            <option value="-3">(GMT-03:00) Greenland</option>
                            <option value="-3">(GMT-03:00) Montevideo</option>
                            <option value="-2">(GMT-02:00) Mid-Atlantic</option>
                            <option value="-1">(GMT-01:00) Cape Verde Is.</option>
                            <option value="-1">(GMT-01:00) Azores</option>
                            <option value="0">(GMT+00:00) Casablanca, Monrovia, Reykjavik</option>
                            <option value="0">(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
                            <option value="1">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                            <option value="1">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                            <option value="1">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                            <option value="1">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                            <option value="1">(GMT+01:00) West Central Africa</option>
                            <option value="2">(GMT+02:00) Amman</option>
                            <option value="2">(GMT+02:00) Athens, Bucharest, Istanbul</option>
                            <option value="2">(GMT+02:00) Beirut</option>
                            <option value="2">(GMT+02:00) Cairo</option>
                            <option value="2">(GMT+02:00) Harare, Pretoria</option>
                            <option value="2">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
                            <option value="2">(GMT+02:00) Jerusalem</option>
                            <option value="2">(GMT+02:00) Minsk</option>
                            <option value="2">(GMT+02:00) Windhoek</option>
                            <option value="3">(GMT+03:00) Kuwait, Riyadh, Baghdad</option>
                            <option value="3">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                            <option value="3">(GMT+03:00) Nairobi</option>
                            <option value="3">(GMT+03:00) Tbilisi</option>
                            <option value="3.5">(GMT+03:30) Tehran</option>
                            <option value="4">(GMT+04:00) Abu Dhabi, Muscat</option>
                            <option value="4">(GMT+04:00) Baku</option>
                            <option value="4">(GMT+04:00) Yerevan</option>
                            <option value="4.5">(GMT+04:30) Kabul</option>
                            <option value="5">(GMT+05:00) Yekaterinburg</option>
                            <option value="5">(GMT+05:00) Islamabad, Karachi, Tashkent</option>
                            <option value="5.5">(GMT+05:30) Sri Jayawardenapura</option>
                            <option value="5.5">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                            <option value="5.75">(GMT+05:45) Kathmandu</option>
                            <option value="6">(GMT+06:00) Almaty, Novosibirsk</option>
                            <option value="6">(GMT+06:00) Astana, Dhaka</option>
                            <option value="6.5">(GMT+06:30) Yangon (Rangoon)</option>
                            <option value="7">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                            <option value="7">(GMT+07:00) Krasnoyarsk</option>
                            <option value="8">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                            <option value="8">(GMT+08:00) Kuala Lumpur, Singapore</option>
                            <option value="8">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                            <option value="8">(GMT+08:00) Perth</option>
                            <option value="8">(GMT+08:00) Taipei</option>
                            <option value="9">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                            <option value="9">(GMT+09:00) Seoul</option>
                            <option value="9">(GMT+09:00) Yakutsk</option>
                            <option value="9.5">(GMT+09:30) Adelaide</option>
                            <option value="9.5">(GMT+09:30) Darwin</option>
                            <option value="10">(GMT+10:00) Brisbane</option>
                            <option value="10">(GMT+10:00) Canberra, Melbourne, Sydney</option>
                            <option value="10">(GMT+10:00) Hobart</option>
                            <option value="10">(GMT+10:00) Guam, Port Moresby</option>
                            <option value="10">(GMT+10:00) Vladivostok</option>
                            <option value="11">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
                            <option value="12">(GMT+12:00) Auckland, Wellington</option>
                            <option value="12">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                            <option value="13">(GMT+13:00) Nuku'alofa</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button class="theme-btn3 justify-content-center mt-4 w-100" type="submit">Save Changes</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Account Settings End -->
          
          <!-- Email Addresses
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4 mb-4">
            <h3 class="text-5 font-weight-400 mb-3">Email Addresses <a href="#edit-email" data-bs-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i class="fas fa-edit mr-1"></i>Edit</a></h3>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID <span class="text-muted font-weight-500">(Primary)</span></p>
              <p class="col-sm-9"><?php echo $row1['email']; ?></p>
            </div>
          </div>
          <!-- Edit Details Modal
          ================================== -->
          <div id="edit-email" class="modal fade " role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Email Addresses</h5>
                  <button type="button" class="close font-weight-400" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="emailAddresses" method="post">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group mb-4">
                          <label for="email">Email ID <span class="text-muted font-weight-500">(Primary)</span></label>
                          <input type="email" value="<?php echo $row1['email']; ?>" class="form-control" data-bv-field="emailid" id="emailID" name="email" required placeholder="Email ID">
                        </div>
                      </div>
                    </div>
                    <a class="btn-link text-uppercase d-flex align-items-center text-1 float-right mb-3" href="#" data-bs-target="#add-email" data-bs-toggle="modal"><span class="text-3 mr-1"><i class="fas fa-plus-circle"></i></span>Add another email</a>
                    <button class="theme-btn3 justify-content-center mt-4 w-100" type="submit" name="save">Save Changes</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div id="add-email" class="modal fade " role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Email Addresses</h5>
                  <button type="button" class="close font-weight-400" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="emailAddresses" method="post">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="email">Email ID</label>
                          <input type="email" value="" class="form-control" data-bv-field="emailid" id="emailID" name="email" required placeholder="Email ID">
                        </div>
                      </div>
                    </div>
                    <button class="theme-btn3 justify-content-center mt-4 w-100" type="submit">Add Email</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Email Addresses End -->
          
          <!-- Phone
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4 mb-4">
            <h3 class="text-5 font-weight-400 mb-3">Phone <a href="#edit-phone" data-bs-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i class="fas fa-edit me-1"></i>Edit</a></h3>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile <span class="text-muted font-weight-500">(Primary)</span></p>
              <p class="col-sm-9"><?php echo $row1['mobile']; ?></p>
            </div>
          </div>
          <!-- Edit Details Modal
          ================================== -->
          <div id="edit-phone" class="modal fade " role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Phone</h5>
                  <button type="button" class="close font-weight-400" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="phone" method="post">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group mb-4">
                          <label for="mobileNumber">Mobile <span class="text-muted font-weight-500">(Primary)</span></label>
                          <input type="tel" value="<?php echo $row1['mobile']; ?>" class="form-control" data-bv-field="mobilenumber" id="mobileNumber" required placeholder="Mobile Number">
                        </div>
                      </div>
                    </div>
                    <a class="btn-link text-uppercase d-flex align-items-center text-1 float-right mb-3" href="#" data-bs-target="#add-phone" data-bs-toggle="modal" ><span class="text-3 mr-1"><i class="fas fa-plus-circle"></i></span>Add another Phone</a>
                    <button class="theme-btn3" type="submit" name="save">Save Changes</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div id="add-phone" class="modal fade " role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Phone</h5>
                  <button type="button" class="close font-weight-400" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="phone" method="post">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="mobileNumber">Mobile</label>
                          <input type="tel" value="" class="form-control" data-bv-field="mobilenumber" id="mobileNumber" required placeholder="Mobile Number">
                        </div>
                      </div>
                    </div>
                    <button class="theme-btn3 justify-content-center mt-4 w-100" type="submit">Add Number</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Phone End -->
          
          <!-- Security
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4">
            <h3 class="text-5 font-weight-400 mb-3">Security <a href="#change-password" data-bs-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i class="fas fa-edit me-1"></i>Edit</a></h3>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">
                <label class="col-form-label">Password</label>
              </p>
              <p class="col-sm-9">
                <input type="password" class="form-control-plaintext" data-bv-field="password" id="password" name="password" value="EnterPassword">
              </p>
            </div>
          </div>
          <!-- Edit Details Modal
          ================================== -->
          <div id="change-password" class="modal fade " role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Change Password</h5>
                  <button type="button" class="close font-weight-400" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="changePassword" method="post">
                    <div class="form-group mb-4">
                      <label for="existingPassword">Confirm Current Password</label>
                      <input type="text" class="form-control" data-bv-field="existingpassword" id="existingPassword" name="password" required placeholder="Enter Current Password">
                    </div>
                    <div class="col-sm-5 messages"></div>
                    <div class="form-group mb-4">
                      <label for="newPassword">New Password</label>
                      <input type="text" class="form-control" data-bv-field="newpassword" id="newPassword" name="new_password" required placeholder="Enter New Password">
                    </div>
                    <div class="col-sm-5 messages"></div>
                    <div class="form-group mb-4">
                      <label for="confirm-password">Confirm New Password</label>
                      <input type="text" class="form-control" data-bv-field="confirmpassword" id="confirmPassword" name="confirm_password" required placeholder="Enter Confirm New Password">
                    </div>
                    <div class="col-sm-5 messages"></div>
                    <button class="theme-btn3 justify-content-center mt-4 w-100" type="submit" name="update_pass">Update Password</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Security End -->
          
        </div>
        <!-- Middle Panel End --> 
      </div>
    </div>
  </div>
</div>

  <!-- Content end --> 
<div role="tabpanel" class="tab-pane fade" id="notification">
          <!-- Content
  ============================================= -->
  <div id="content" class="py-4">
    <div class="container">
      <div class="row"> 
        <!-- Left Panel
        ============================================= -->
        <aside class="col-lg-3"> 
          
          <!-- Profile Details
          =============================== -->
          <?php 
        $cust_id= $_SESSION['customer_id'];
        include 'db_connect.php'; 
        $sql="SELECT * FROM customers where customer_id= '$cust_id' ";
    $result = $conn->query($sql);
        $row1 = $result->fetch_assoc();
        
?><div class="bg-light shadow-sm rounded text-center p-3 mb-4">
           <?php echo  "<div class='profile-thumb mt-3 mb-4'> <img class='rounded-circle' width='100' height='100' src='assets/images/".$row1['photo']."' alt='".$row1['username']."'>"; ?>  
            </div>
          </div>
          <!-- Profile Details End --> 
          
          <!-- Need Help?
          =============================== -->
          <div class="bg-light shadow-sm rounded text-center p-3 mb-4">
            <div class="text-17 text-wallet my-3"><i class="fas fa-comments"></i></div>
            <h3 class="text-3 font-weight-400 my-4">Need Help?</h3>
            <p class="text-muted opacity-8 mb-4">Have questions or concerns regrading your account?<br>
              Our experts are here to help!.</p>
            <a href="#" class="theme-btn3">Chat with Us</a> </div>
          <!-- Need Help? End --> 
          
        </aside>
        <!-- Left Panel End --> 
        
        <!-- Middle Panel
        ============================================= -->
        <div class="col-lg-9">
          
          <!-- Notifications
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4 mb-4">
            <h3 class="text-5 font-weight-400">Notifications</h3>
            <p class="text-muted">Select subscriptions to be delivered to <span class="text-body"><?php echo $_SESSION['email']; ?></span></p>
            <hr class="mx-n4">
            <form id="notifications" method="post">
              <div class="form-check custom-control custom-checkbox">
                <input id="announcements" name="notifications" class="custom-control-input" type="checkbox">
                <label class="custom-control-label text-3" for="announcements">Announcements</label>
                <p class="text-muted line-height-3 mt-2">Be the first to know about new features and other news.</p>
              </div>
              <hr class="mx-n4">
              <div class="form-check custom-control custom-checkbox">
                <input id="sendPayment" name="notifications" class="custom-control-input" type="checkbox">
                <label class="custom-control-label text-3" for="sendPayment">Send payment</label>
                <p class="text-muted line-height-3 mt-2">Send an email when I send a payment.</p>
              </div>
              <hr class="mx-n4">
              <div class="form-check custom-control custom-checkbox">
                <input id="receiveApayment" name="notifications" class="custom-control-input" type="checkbox">
                <label class="custom-control-label text-3" for="receiveApayment">Receive a payment</label>
                <p class="text-muted line-height-3 mt-2">Send me an email when I receive a payment.</p>
              </div>
              <hr class="mx-n4">
              <div class="form-check custom-control custom-checkbox">
                <input id="requestPayment" name="notifications" class="custom-control-input" type="checkbox">
                <label class="custom-control-label text-3" for="requestPayment">Request payment</label>
                <p class="text-muted line-height-3 mt-2">Send me an email when i request payment.</p>
              </div>
              <hr class="mx-n4">
              <div class="form-check custom-control custom-checkbox">
                <input id="problemWithPayment" name="notifications" class="custom-control-input" type="checkbox">
                <label class="custom-control-label text-3" for="problemWithPayment">Have a problem with a payment</label>
                <p class="text-muted line-height-3 mt-2">Send me an email when have a problem with a payment.</p>
              </div>
              <hr class="mx-n4">
              <div class="form-check custom-control custom-checkbox">
                <input id="specialOffers" name="notifications" class="custom-control-input" type="checkbox">
                <label class="custom-control-label text-3" for="specialOffers">Special Offers</label>
                <p class="text-muted line-height-3 mt-2">Receive last-minute offers from us.</p>
              </div>
              <hr class="mx-n4">
              <div class="form-check custom-control custom-checkbox">
                <input id="reviewSurveys" name="notifications" class="custom-control-input" type="checkbox">
                <label class="custom-control-label text-3" for="reviewSurveys">Review Surveys</label>
                <p class="text-muted line-height-3 mt-2">Share your payment experience to better inform users.</p>
              </div>
              
            </form>
          </div>
          <!-- Notifications End --> 
          
        </div>
        <!-- Middle Panel End --> 
      </div>
    </div>
  </div>
  <!-- Content end --> 
</div>
</div>
</div>

<?php include'components/footer.php'; ?>

</html>

<?php include 'upload.php'; 
      include 'update.php'; 
?>