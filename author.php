<?php include 'konekcija.inc';
$upit = "SELECT * from anketa";
$result = mysqli_query($konekcija,$upit);

?>
<section class="testimonial">


<div class="container">
<h3 class="text-center">Author</h3>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
      <div class="col-lg-8 col-md-8 col-sm-8 test-agile1">
        <p>My name is Marko Catic. I was born on August 17th 1996. I am a student of Internet technologies on ICT academy. My goal is to be a successful programmer and a web developer one day. </p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 test-agile2">
        <img src="images/ja.jpg" class="img-circle img-responsive" alt="">
      </div>
      <div class="clearfix"></div>
  </div>

</div>
    <?php if(mysqli_num_rows($result)): ?>
        <div class="row">
            <div class="container">
                <div class="col-md-3 col-md-offset-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Rate my site!
                        </div>
                        <div class="panel-body">
                            <table class="table table table-condensed">
                                <?php while($r = mysqli_fetch_array($result)): ?>
                                    <tr>
                                        <td><?php echo $r['opcija']; ?></td><td><input type="radio" name="vote" value="<?php echo $r['id']; ?>"></td>
                                    </tr>
                                <?php endwhile; ?>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <button onClick="vote()" type="button" id="vote" class="btn btn-primary">Vote!</button>
                            <div id="anketaFeedback" class="text-center">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>

</section>
