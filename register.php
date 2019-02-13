<?php
@session_start();
include 'konekcija.inc';
?>
<?php
    if(isset($_REQUEST['btnReg'])) {
        $user = $_REQUEST['username'];
        $name = $_REQUEST['name'];
        $surname = $_REQUEST['surname'];
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['pass'];

        $errors = [];

        $reUsername = '/^[A-z0-9\_]{3,30}$/';
        if(!preg_match($reUsername,$user))
        {
            array_push($errors,'Username is not correct.');
        }
        if(!preg_match($reUsername,$pass))
        {
            array_push($errors,'Password is not correct.');
        }
        if(count($errors)>0)
        {
            foreach($errors as $error)echo $error . '</br>';
        }
        else {
            $pass = (md5($pass));
            $upit = "insert into korisnici(username,password,id_uloga,name,surname,email) values ('$user','$pass',2,'$name','$surname','$email')";
            $rez = mysqli_query($konekcija, $upit);
        }
    }



?>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form method="POST" action="index.php?ime_linka=register" class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						Register
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Name is required">
						<span class="label-input100">Name</span>
						<input class="input100" type="text" name="name" placeholder="Type your name">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Surname is required">
						<span class="label-input100">Surname</span>
						<input class="input100" type="text" name="surname" placeholder="Type your surname">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Type your email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
                    <!--
					<div class="wrap-input100 validate-input" data-validate="Confirm your passowrd">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Confirm your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

                    -->
					<div class="container-login100-form-btn "  id="marg">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
                            <input type="submit" class="login100-form-btn" name="btnReg" value="Register"/>
						</div>
					</div>

					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Or Log in Using
						</span>

						<a href="index.php?ime_linka=login" class="txt2">
							Log in
						</a>
					</div>



				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
