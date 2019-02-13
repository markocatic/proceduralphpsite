<?php
@session_start();
include 'konekcija.inc';
?>
<?php
if(isset($_REQUEST['btnLogin'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $upit = "SELECT * FROM korisnici WHERE username='$username' AND password='$password'";
    $rez = mysqli_query($konekcija,$upit);
    if(mysqli_num_rows($rez)){
            $r=mysqli_fetch_array($rez);
            $_SESSION['id_uloga'] = $r['id_uloga'];
            $_SESSION['username'] = $r['username'];

            switch ($_SESSION['id_uloga']) {
                case '1':
                    header('Location: index.php');
                    break;


                case '2':
                    header('Location: index.php');
                    break;
            }
        }
}
?>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form" action="index.php?ime_linka=login" method="POST">
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100  m-b-23">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 ">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
<!--
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<input type="submit" class="login100-form-btn" name="btnLogin">

						</div>
					</div>
					-->
			<div class="container-login100-form-btn">
				<div class="wrap-login100-form-btn">
					<div class="login100-form-bgbtn"></div>
					<input type="submit" class="login100-form-btn" name="btnLogin" value="Login"/>
				</div>
			</div>

					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Or Sign Up Using
						</span>

						<a href="index.php?ime_linka=register" class="txt2">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>

	</div>


	<!--<div id="dropDownSelect1"></div>-->

<!--===============================================================================================-->
