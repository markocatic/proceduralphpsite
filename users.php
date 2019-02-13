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
        $role = $_REQUEST['role'];
        $errors = [];

        $reUsername = '/^[A-z0-9\_]{3,30}$/';
        if(!preg_match($reUsername,$user))
        {
            array_push($errors,'Username nije dobar.');
        }
        if(!preg_match($reUsername,$pass))
        {
            array_push($errors,'Password nije dobar.');
        }
        if(count($errors)>0)
        {
            foreach($errors as $error)echo $error . '</br>';
        }
        else {
            $pass = md5($pass);
            $upit = "insert into korisnici(username,password,id_uloga,name,surname,email) values ('$user','$pass',$role,'$name','$surname','$email')";
            $rez = mysqli_query($konekcija, $upit);
        }


    }
    if($_SESSION['id_uloga']=='1' ) {
        if (isset($_REQUEST['action'])) {
            switch ($_REQUEST['action']) {
                case 'edit':

                    $username = $_REQUEST['username'];
                    $upit = "SELECT id_korisnik FROM korisnici WHERE username='$username'";
                    $rez = mysqli_query($konekcija, $upit);
                    $input_id = mysqli_fetch_row($rez)[0];
                    $form_action = $_SERVER['PHP_SELF'] . '?ime_linka=users&&action=edited';
                    $submit_value = 'Edit user';
                    $submit_name = 'editUser';
                    break;
                case 'delete':
                    $id = $_REQUEST['id'];
                    $upit = "DELETE FROM korisnici WHERE id_korisnik=$id";
                    $rez = mysqli_query($konekcija, $upit);
                    $username = "";
                    $form_action = $_SERVER['PHP_SELF'] . '?ime_linka=users';
                    $submit_value = 'Add user';
                    $submit_name = 'btnReg';
                    break;
                case 'edited':


                    $id = $_REQUEST['id'];
                    $username = $_REQUEST['username'];
                    $password = $_REQUEST['pass'];
                    $role = $_REQUEST['role'];
                    $name = $_REQUEST['name'];
                    $surname = $_REQUEST['surname'];
                    $email = $_REQUEST['email'];
                    $errors = [];

                    $reUsername = '/^[A-z0-9\_]{3,30}$/';
                    if (!preg_match($reUsername, $username)) {
                        array_push($errors, 'Username nije dobar.');
                    }
                    if (!preg_match($reUsername, $password)) {
                        array_push($errors, 'Password nije dobar.');
                    }
                    if (count($errors) > 0) {
                        foreach ($errors as $error) echo $error . '</br>';
                    } else {

                        $upit1 = "UPDATE korisnici SET korisnici.username='$username',korisnici.password='$password',korisnici.id_uloga=$role,korisnici.name='$name',korisnici.surname='$surname',korisnici.email='$email' WHERE korisnici.id_korisnik='$id'";
                        $rez1 = mysqli_query($konekcija, $upit1);
                    }

                default:
                    $username = "";
                    $form_action = $_SERVER['PHP_SELF'] . '?ime_linka=users';
                    $submit_value = 'Add User';
                    $submit_name = 'btnReg';
                    break;


            }
        } else {
            $username = "";
            $form_action = $_SERVER['PHP_SELF'] . '?ime_linka=users';
            $submit_name = 'btnReg';
            $submit_value = 'Add user';

        }
    }
    else {
        header('Location:index.php');
    }


?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-12" style="margin-top:60px;">
                <table class="table table=bordered table-striped">
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                        $upit = "SELECT * FROM korisnici k INNER JOIN uloga u ON k.id_uloga=u.id_uloga";
                        $rez = mysqli_query($konekcija,$upit);

                        while($r = mysqli_fetch_array($rez)):
                        ?>
                        <tr>
                            <td><?php echo $r['id_korisnik']?></td>
                            <td><?php echo $r['username'] ?></td>
                            <td><?php echo $r['name'] ?></td>
                            <td><?php echo $r['surname'] ?></td>
                            <td><?php echo $r['email'] ?></td>
                            <td><?php echo $r['naziv'] ?></td>
                            <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?ime_linka=users&&action=edit&&username=<?php echo $r['username']; ?>" class="btn btn-primary">Edit</a></td>
                            <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?ime_linka=users&&action=delete&&id=<?php echo $r['id_korisnik'];?>" class="btn btn-primary">Delete</a></td>
                        </tr>
                    <?php endwhile; ?>

                </table>
            </div>
            <div id="forma" class="col-md-3 col-md-offset-4 text-center">
                <form class="" action="<?php echo $form_action;?>" method="POST">

                    <input type="hidden" name="id" value="<?php if(isset($input_id)) echo $input_id?>">

                    <p class="lead">New User</p>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" value="<?php echo $username ?>" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" value="" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="surname" class="form-control" placeholder="Surname"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                    <select class="form-control" name="role">
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="<?php echo $submit_name;?>" class="btn btn-primary" value="<?php echo $submit_value ?>">
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>