<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        <?php include "regist.css" ?>
    </style>
</head>
<body>
    <?php
        session_start();
        $namaDepanError = $namaTengahError = $namaBelakangError = "";
        $tempatLahirError = $tglLahirError = $NIKError = "";
        $NegaraError = $EmailError = $nohpError = "";
        $alamatError = $kodeposError = $fotoError = "";
        $usernameError = $passError1 = $passError2 = "";
        $validasi = 0;

        if(isset($_POST['submit'])){
            $namaDepan = $_POST['namaDepan'];
            $namaTengah = $_POST['namaTengah'];
            $namaBelakang = $_POST['namaBelakang'];
            $tempatLahir = $_POST['tempatLahir'];
            $tglLahir = $_POST['tglLahir'];
            $NIK = $_POST['NIK'];
            $email = $_POST['email'];
            $noHP = $_POST['noHP'];
            $alamat = $_POST['alamat'];
            $kodepos = $_POST['kodepos'];
            $username = $_POST['username'];
            $password = $_POST['password1'];
            $password2 = $_POST['password2'];

            if(empty($namaDepan)){
                $namaDepanError = "*Nama Depan tidak boleh kosong";
            }else {
                if(!preg_match("/^[a-zA-Z]*$/",$namaDepan)){
                    $namaDepanError = "*Hanya huruf yang diperbolehkan";
                }else {
                    $validasi += 1;
                }
            }

            if(empty($namaTengah)){
                $namaTengahError = "*Nama Tengah tidak boleh kosong";
            }else {
                if(!preg_match("/^[a-zA-Z]*$/",$namaTengah)){
                    $namaTengahError = "*Hanya huruf yang diperbolehkan";
                }else {
                    $validasi += 1;
                }
            }

            if(empty($namaBelakang)){
                $namaBelakangError = "*Nama Belakang tidak boleh kosong";
            }else {
                if(!preg_match("/^[a-zA-Z]*$/",$namaBelakang)){
                    $namaBelakangError = "*Hanya huruf yang diperbolehkan";
                }else {
                    $validasi += 1;
                }
            }

            if(empty($tempatLahir)){
                $tempatLahirError = "*Tempat Lahir tidak boleh kosong";
            }else {
                if(!preg_match("/^[a-zA-Z ]*$/",$tempatLahir)){
                    $tempatLahirError = "*Hanya huruf dan spasi yang diperbolehkan";
                }else {
                    $validasi += 1;
                }
            }

            if (empty($tglLahir)){
                $tglLahirError = "*Tanggal Lahir tidak boleh kosong";
            } else {
                $validasi += 1;
            }

            if(empty($NIK)){
                $NIKError = "*NIK tidak boleh kosong";
            }else{
                if(strlen($NIK) == 16){
                    $validasi += 1;
                }else{
                    $NIKError = "*NIK harus 16 digit";
                }
            }

            if(empty($_POST['Negara'])) {
                $NegaraError = "*Pilihan tidak boleh kosong ";
            } else {
                $validasi += 1;
                $negara = $_POST['Negara'];
            }

            if(empty($email)){
                $EmailError = "*Email tidak boleh kosong";
            }else{
                if(!preg_match("/^[a-zA-Z@gmail.com]*$/",$email)){
                    $EmailError = "*Email tidak valid";
                }else{
                    $validasi += 1;
                }
            }
            
            if(empty($noHP)){
                $nohpError = "*No HP tidak boleh kosong";
            }else{
                if(strlen($noHP) == 12){
                    $validasi += 1;
                }else{
                    $nohpError = "*No HP harus 12 digit";
                }
            }

            if(empty($alamat)){
                $alamatError = "*Alamat tidak boleh kosong";
            }else{
                $validasi += 1;
            }

            if(empty($kodepos)){
                $kodeposError = "*Kode Pos tidak boleh kosong";
            }else{
                if(strlen($kodepos) != 5){
                    $kodeposError = "*Kode Pos harus 5 karakter";
                }else{
                    $validasi += 1;
                }
            }

            if(!file_exists($_FILES['file']['tmp_name'])){
                $fotoError = "*File tidak boleh kosong";
            }else{
                $validasi += 1;
            }

            if(empty($username)){
                $usernameError = "*Username tidak boleh kosong";
            }else{
                if(strlen($username)>5){
                    $validasi += 1;
                }else{
                    $usernameError = "*Username harus lebih dari 5 karakter";
                }
            }

            if(empty($password)){
                $passError1 = "*Password tidak boleh kosong";
            }else{
                if(strlen($password)>6 && preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$%^&]).*$/',$password)){
                    $validasi += 1;
                }else{
                    $passError1 = "*Password harus terdiri dari huruf besar, huruf kecil, angka, dan spesial karakter";
                }
            }

            if(empty($password2)){
                $passError2 = "*Password tidak boleh kosong";
            }else{
                if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',$password2)){
                    if($password != $password2){
                        $validasi += 1;
                    }else{
                        $passError2 = "*Password tidak boleh sama dengan Password 1";
                    }
                }else{
                    $passError2 = "*Password harus terdiri dari huruf besar, huruf kecil, angka, dan spesial karakter";
                }
            }

            if($validasi == 15){
                $_SESSION["NamaDepan"] = $namaDepan;
                $_SESSION["NamaTengah"] = $namaTengah;
                $_SESSION["NamaBelakang"] = $namaBelakang;
                $_SESSION["TempatLahir"] = $tempatLahir;
                $_SESSION["TglLahir"] = $tglLahir;
                $_SESSION["Nik"] = $NIK;
                $_SESSION["Email"] = $email;
                $_SESSION["nohp"] = $noHP;
                $_SESSION["Alamat"] = $alamat;
                $_SESSION["KodePos"] = $kodepos;
                $_SESSION["Username"] = $username;
                $_SESSION["Password1"] = $password;
                $_SESSION["Password2"] = $password2;
                $_SESSION["WargaNegara"] = $_POST['Negara'];
                $_SESSION['file'] = $_FILES["file"]["name"];
                $Image = $_FILES['file']['name'];
                $tmp_name = $_FILES['file']['tmp_name'];
                $diUpload = "images/";
                $terupload = move_uploaded_file($tmp_name, $diUpload.$Image);
                header("Location:welcome.php");
            }
        }
    ?>
    <div class="container">
    <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
        <table>
            <caption>Register</caption>
            <tr>
                <td>Nama Depan</td>
                <td><input type="text" name="namaDepan" required value="<?php echo isset($namaDepan)? $namaDepan:'';?>"> </td>
                <td>Nama Tengah</td>
                <td><input type="text" name="namaTengah" required value="<?php echo isset($namaTengah)? $namaTengah:'';?>"> </td>
                <td>Nama Belakang</td>
                <td><input type="text" name="namaBelakang" required value="<?php echo isset($namaBelakang)? $namaBelakang:'';?>"> </td>
            </tr>
            <tr>
                <td></td>
                <td><div class="error"><?php echo $namaDepanError?></div></td>
                <td></td>
                <td><div class="error"><?php echo $namaTengahError?></div></td>
                <td></td>
                <td><div class="error"><?php echo $namaBelakangError?></div></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><input type="text" name="tempatLahir" required value="<?php echo isset($tempatLahir)? $tempatLahir:'';?>"> </td>
                <td>Tgl Lahir</td>
                <td><input type="date" name="tglLahir" placeholder="dd-mm-yyyy" min="1970-01-01" max="2022-12-31" required value="<?php echo isset($tglLahir)? $tglLahir:'';?>"> </td>
                <td>NIK</td>
                <td><input type="number" name="NIK" id="" required value="<?php echo isset($NIK)? $NIK:'';?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><div class="error"><?php echo $tempatLahirError?></div></td>
                <td></td>
                <td><div class="error"><?php echo $tglLahirError?></div></td>
                <td></td>
                <td><div class="error"><?php echo $NIKError?></div></td>
            </tr>
            <tr>
                <td>Warga Negara</td>
                <td>
                    <select id="Negara" name="Negara" required>
                        <option value="">--Pilih Negara--</option>
                        <option value="Afganistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
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
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bonaire">Bonaire</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Canary Islands">Canary Islands</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Chad">Chad</option>
                        <option value="Channel Islands">Channel Islands</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos Island">Cocos Island</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote DIvoire">Cote DIvoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Curaco">Curacao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="East Timor">East Timor</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands">Falkland Islands</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Ter">French Southern Ter</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Great Britain">Great Britain</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="India">India</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea North">Korea North</option>
                        <option value="Korea Sout">Korea South</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Laos">Laos</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macau">Macau</option>
                        <option value="Macedonia">Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Midway Islands">Midway Islands</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Nambia">Nambia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherland Antilles">Netherland Antilles</option>
                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                        <option value="Nevis">Nevis</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau Island">Palau Island</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Phillipines">Philippines</option>
                        <option value="Pitcairn Island">Pitcairn Island</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                        <option value="Republic of Serbia">Republic of Serbia</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="St Barthelemy">St Barthelemy</option>
                        <option value="St Eustatius">St Eustatius</option>
                        <option value="St Helena">St Helena</option>
                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                        <option value="St Lucia">St Lucia</option>
                        <option value="St Maarten">St Maarten</option>
                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                        <option value="Saipan">Saipan</option>
                        <option value="Samoa">Samoa</option>
                        <option value="Samoa American">Samoa American</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syria</option>
                        <option value="Tahiti">Tahiti</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Erimates">United Arab Emirates</option>
                        <option value="United States of America">United States of America</option>
                        <option value="Uraguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican City State">Vatican City State</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                        <option value="Wake Island">Wake Island</option>
                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zaire">Zaire</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>    
                    <script>
                        document.getElementById('Negara').value = "<?php echo $_POST['Negara'];?>";
                    </script>
                </td>
                <td>Email</td>
                <td><input type="email" name="email" id="" placeholder = "abcd@gmail.com" required value="<?php echo isset($email)? $email:'';?>"></td>
                <td>No HP</td>
                <td><input type="number" name="noHP" id="" placeholder="087-245-678-182" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{3}" required value="<?php echo isset($noHP)? $noHP:'';?>"></td>
            </tr>
            <tr> 
                <td></td>
                <td><div class="error"><?php echo $NegaraError?></div></td>
                <td></td>
                <td><div class="error"><?php echo $EmailError?></div></td>
                <td></td>
                <td><div class="error"><?php echo $nohpError?></div></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" id="" cols="20" rows="3"><?php echo isset($alamat) ? $alamat:'';?></textarea></td>
                <td>Kode Pos</td>
                <td><input type="text" name="kodepos" id="" required value="<?php echo isset($kodepos)? $kodepos:'';?>"></td>
                <td>Foto Profil</td>
                <td><input type="file" name="file" id="" accept="image/*"></td>
            </tr>
            <tr> 
                <td></td>
                <td><div class="error"><?php echo $alamatError?></div></td>
                <td></td>
                <td><div class="error"><?php echo $kodeposError?></div></td>
                <td></td>
                <td><div class="error"><?php echo $fotoError?></div></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id="" required value="<?php echo isset($username)? $username:'';?>"></td>
                <td>Password 1</td>
                <td><input type="password" name="password1" id="" required value="<?php echo isset($password)? $password:'';?>"</td>
                <td>Password 2</td>
                <td><input type="password" name="password2" id="" required value="<?php echo isset($password2)? $password2:'';?>"></td>
            </tr>
            <tr> 
                <td></td>
                <td><div class="error"><?php echo $usernameError?></div></td>
                <td></td>
                <td><div class="error"><?php echo $passError1?></div></td>
                <td></td>
                <td><div class="error"><?php echo $passError2?></div></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="welcome.php">Kembali</a></td>
                <td><input type="submit" name= "submit" value="Register"></td>
            </tr>     
        </table>
    </form>
    </div>
</body>
</html>