<?php
@session_start();
include ('konekcija.inc');
?>
<?php

if(isset($_REQUEST['dodaj'])) {

    $name = $_REQUEST['name'];
    $reName = '/^[A-z0-9\s]{3,30}$/';
    $errors = [];
    if(!preg_match($reName,$name))
    {
        array_push($errors,'Enter the name correctly.');
    }
    if(count($errors)>0)
    {
        foreach($errors as $error)echo $error . '</br>';
    }
    else {
        $upit = "INSERT INTO anketa(opcija,glasova) VALUES('$name',0)";
        $rez = mysqli_query($konekcija,$upit);
    }



}
if($_SESSION['id_uloga']!='1') {
    header('Location: index.php');
}
if(isset($_REQUEST['action'])) {

    switch ($_REQUEST['action']) {
        case 'edit':
            $name = $_REQUEST['name'];
            $id = $_REQUEST['id'];
            $for_edit = true;
            break;
        case 'delete':
            $id = $_REQUEST['id'];
            $upit = "DELETE FROM anketa WHERE id=$id";
            $rez = mysqli_query($konekcija,$upit);
        case 'edited':
            if(isset($_REQUEST['submit'])) {
                $name = $_REQUEST['name'];
                $id = $_REQUEST['id'];
                $reName = '/^[A-z0-9\s]{3,30}$/';
                $errors = [];
                if(!preg_match($reName,$name))
                {
                    array_push($errors,'Enter the option name correctly.');
                }
                if(count($errors)>0)
                {
                    foreach($errors as $error)echo $error . '</br>';
                }
                else {
                   $upit = "UPDATE anketa SET opcija='$name' WHERE id=$id";
                   $rez = mysqli_query($konekcija,$upit);
                }
        }

    }
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-12" style="margin-top:60px;">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Votes</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    $upit = "SELECT * FROM anketa";
                    $rez = mysqli_query($konekcija,$upit);
                    if(mysqli_num_rows($rez)):
                        $i=1;
                        ?>
                        <?php while($r = mysqli_fetch_array($rez)): ?>
                        <tr>
                            <td><?php echo $r['id'] ?></td>
                            <td><?php echo $r['opcija']; ?></td>
                            <td><?php echo $r['glasova']; ?></td>
                            <td><a href="<?php echo
                                $_SERVER['PHP_SELF'];?>?ime_linka=surveyadmin&&action=edit&&name=<?php echo
                                $r['opcija'];?>&&id=<?php echo $r['id'];?>" class="btn btn-primary">Izmeni</a></td>
                            <td><a href="<?php echo
                                $_SERVER['PHP_SELF'];?>?ime_linka=surveyadmin&&action=delete&&id=<?php echo $r['id'];?>"
                                   class="btn btn-danger">Obrisi</a></td>
                        </tr>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </table>
            </div>
            <div class="col-md-4 col-md-offset-4 text-center">
                <?php if(isset($for_edit)): ?>
                    <form action="<?php echo
                    $_SERVER['PHP_SELF'];?>?ime_linka=surveyadmin&&action=edited" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>"
                                   placeholder="Survey option name">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" name="submit" value="Edit option">
                        </div>
                    </form>
                <?php else: ?>
                    <form action="<?php echo
                    $_SERVER['PHP_SELF'];?>?ime_linka=surveyadmin&&action=insert" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="" placeholder="Survey option name">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="dodaj" value="Add option">
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
