<?php
include 'konekcija.inc';
@session_start();
?>
<?php

if($_SESSION['id_uloga']!=1) {
    header('Location:index.php');
}

if(isset($_REQUEST['addLink'])) {
    $link = $_REQUEST['link'];
    $link_label = $_REQUEST['link_label'];
    $errors = [];

    $reLink = '/^[A-z0-9\_]{3,30}$/';
    if(!preg_match($reLink,$link))
    {
        array_push($errors,'Link nije dobar.');
    }
    if(!preg_match($reLink,$link_label))
    {
        array_push($errors,'Link label nije dobar.');
    }

    if(count($errors)>0)
    {
        foreach($errors as $error)echo $error . '</br>';
    }
    else {
        $upit = "INSERT INTO meni(ime_linka,link) VALUES('$link_label','$link')";
        $rez = mysqli_query($konekcija,$upit);
    }
}

if(isset($_REQUEST['action'])) {
    echo "DOBROE";
    switch ($_REQUEST['action']) {
        case 'edit':
            $link_label = $_REQUEST['name'];
            $link = $_REQUEST['link'];

            $upit = "SELECT id_meni FROM meni WHERE ime_linka='$link_label'";
            $rez = mysqli_query($konekcija,$upit);

            $input_id = mysqli_fetch_row($rez)[0];
            $form_action = $_SERVER['PHP_SELF'].'?ime_linka=navigacija&&action=edited';
            $submit_value = 'Edit link';
            $submit_name = "editLink";
            break;
        case 'delete' :
            $id = $_REQUEST['id'];
            $upit = "DELETE FROM meni WHERE id_meni='$id'";
            $rez = mysqli_query($konekcija,$upit);
            $link_label = "";
            $link = "";
            $form_action = $_SERVER['PHP_SELF'].'?ime_linka=navigacija';
            $submit_value = 'Add link';
            $submit_name = 'addLink';
            break;
        case 'edited':
            if(isset($_REQUEST['editLink'])) {
                echo "tu je";
                $id = $_REQUEST['id'];
                $link = $_REQUEST['link'];
                $link_label = $_REQUEST['link_label'];
                $errors = [];
                $reLink = '/^[A-z0-9\_]{3,30}$/';

                if(!preg_match($reLink,$link_label))
                {
                    array_push($errors,'Link label nije dobar.');
                }
                if(count($errors)>0)
                {
                    foreach($errors as $error)echo $error . '</br>';
                }
                else {
                   $upit = "UPDATE meni SET ime_linka='$link_label',link='$link' WHERE id_meni=$id";
                   $rez = mysqli_query($konekcija,$upit);
                   $link_label = "";
                   $link = "";
                   $form_action = $_SERVER['PHP_SELF'].'?ime_linka=navigacija';
                   $submit_value = 'Add link';
                   $submit_name = 'addLink';
                }
            }
            break;
        default:
            $link_label = "";
            $link = "";
            $form_action = $_SERVER['PHP_SELF'].'?ime_linka=navigacija';
            $submit_value = 'Add link';
            $submit_name = 'addLink';
            break;
    }

}
else {
    $link_label = "";
    $link="";
    $form_action = $_SERVER['PHP_SELF'].'?ime_linka=navigacija';
    $submit_value = 'Add link';
    $submit_name = 'addLink';
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
                        <th>Link</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    $upit = "SELECT * FROM meni";
                    $rez = mysqli_query($konekcija,$upit);
                    if(mysqli_num_rows($rez)):
                        $i=1;
                        ?>
                        <?php while($r = mysqli_fetch_array($rez)): ?>
                        <tr>
                            <td><?php echo $r['id_meni']; ?></td>
                            <td><?php echo $r['ime_linka']; ?></td>
                            <td><?php echo $r['link']; ?></td>
                            <td><a href="<?php echo
                                $_SERVER['PHP_SELF'];?>?ime_linka=navigacija&&action=edit&&link=<?php echo
                                $r['link'];?>&&name=<?php echo $r['ime_linka']; ?>" class="btn btn-primary">Izmeni</a></td>
                            <td><a href="<?php echo
                                $_SERVER['PHP_SELF'];?>?ime_linka=navigacija&&action=delete&&id=<?php echo
                                $r['id_meni'];?>" class="btn btn-danger">Obrisi</a></td>
                        </tr>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </table>
            </div>
            <?php
            ?>
            <div id="forma" class="col-md-3 col-md-offset-4 text-center">
                <form class="" action="<?php echo $form_action; ?>" method="post">
                    <input type="hidden" name="id" value="<?php if(isset($input_id))echo $input_id; ?>">
                    <p class="lead">New link</p>
                    <div class="form-group">
                        <input type="text" name="link_label" class="form-control" value="<?php echo $link_label;?>"
                               placeholder="Link label">
                    </div>
                    <div class="form-group">
                        <input type="text" name="link" class="form-control" value="<?php echo $link;?>" placeholder="Link">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="<?php echo $submit_name;?>" class="btn btn-primary" value="<?php echo
                        $submit_value; ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>