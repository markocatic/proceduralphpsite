<?php
include 'konekcija.inc';
@session_start();
?>
<?php

if($_SESSION['id_uloga']!='1') {
    header('Location:index.php');
}

if(isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'delete':
            $id = $_REQUEST['id'];
            $upit = "DELETE FROM message WHERE id=$id";
            $rez = mysqli_query($konekcija,$upit);
            break;
        default:
            break;
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-12" style="margin-top:60px;">
                <table class="table table-bordered table-striped" style="margin-bottom:100px;">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    $upit = "SELECT * FROM message";
                    $rez = mysqli_query($konekcija,$upit);
                    if(mysqli_num_rows($rez)):
                        $i=1;
                        ?>
                        <?php while($r = mysqli_fetch_array($rez)): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $r['name']; ?></td>
                            <td><?php echo $r['email']; ?></td>
                            <td><?php echo $r['subject']; ?></td>
                            <td><?php echo $r['message']; ?></td>
                            <td><a href="<?php echo
                                $_SERVER['PHP_SELF'];?>?ime_linka=poruke&&action=delete&&id=<?php echo
                                $r['id'];?>" class="btn btn-danger">Obrisi</a></td>
                        </tr>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>
