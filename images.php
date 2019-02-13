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
            $upit = "DELETE FROM slike WHERE id_slike=$id";
            $rez = mysqli_query($konekcija,$upit);
            break;
        case 'insert':
            if(isset($_REQUEST['addPicture'])) {
                $name = $_REQUEST['name'];
                $picture = $_FILES['picture']['name'];
                $alt = $_REQUEST['alt'];
                $errors = [];

                if (!$name) {
                    array_push($errors, 'You must enter name!');
                }
                if (!$picture) {
                    array_push($errors, 'You must pick a picture!');
                }

                if (count($errors) > 0) {
                    foreach ($errors as $error) {
                        echo $error . '</br>';
                    }
                } else {
                    $target_dir = "images/";
                    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                    if (isset($_POST['submit'])) {
                        $check = getimagesize($_FILES["picture"]["tmp_name"]);
                        if ($check !== false) {
                            echo "File is an image- " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            echo "File is not an image.";
                            $uploadOk = 0;
                        }
                    }
                    if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                        $uploadOk = 0;
                    }
                    if ($_FILES["picture"]["size"] > 5000000) {
                        echo "Sorry, your file is too large";
                        $uploadOk = 0;
                    }
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }
                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                    }
                    else {
                        if(move_uploaded_file($_FILES["picture"]["tmp_name"],$target_file)){
                            $upit = "INSERT INTO slike(naziv_slike,putanja,alt) VALUES('$name','$picture','$alt')";
                            $result = mysqli_query($konekcija,$upit);
                        }
                        else {
                            echo "Sorry, there was an error uploading your file!";
                        }
                    }
                }

            }


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
                <table class="table table-bordered table-striped" style="">
                    <tr>
                        <th>#</th>
                        <th>Image name</th>
                        <th>Image path</th>
                        <th>Alt</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    $upit = "SELECT * FROM slike";
                    $rez = mysqli_query($konekcija,$upit);
                    if(mysqli_num_rows($rez)):
                        $i=1;
                        ?>
                        <?php while($r = mysqli_fetch_array($rez)): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $r['naziv_slike']; ?></td>
                            <td><?php echo $r['putanja']; ?></td>
                            <td><?php echo $r['alt']; ?></td>
                            <td><a href="<?php echo
                                $_SERVER['PHP_SELF'];?>?ime_linka=images&&action=delete&&id=<?php echo $r['id_slike'];?>"
                                   class="btn btn-danger">Obrisi</a></td>
                        </tr>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </table>
            </div>
            <div class="col-md-4 col-md-offset-4 text-center">
                <form action="<?php echo
                $_SERVER['PHP_SELF'];?>?ime_linka=images&&action=insert" method="post"
                      enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="" placeholder="Image name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="alt" value="" placeholder="Alt">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="picture" value="">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="addPicture" value="Add picture">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
