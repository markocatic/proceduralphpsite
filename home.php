<?php
session_start();
include 'konekcija.inc';
?>
<?php
$upit = "SELECT * FROM slike";
$rez = mysqli_query($konekcija,$upit);

?>



<div class="banner-bot">
    <div class="container">
        <h2>Hello!</h2>
        <p>We made this website for you to keep up with all gaming news. From phone games like smartphone games like Angry birds, to Playstation games like The Last of Us!</p>
        <p>You can also buy a vast variety of games, for all platforms and ages. Just pick your favourite game, and you're almost there!</p>
        <nav class="cl-effect-3"><a href="games.php">More</a></nav>
    </div>
</div>
<!-- Gallery Starts Here -->
<div class="gallery">
    <div class="container">
        <h3>Gallery</h3>


        <div class="gallery-top">
            <ul id="filters" class="clearfix">
                <li><span class="filter active" data-filter="app card icon logo web">1</span></li>
                <li><span class="filter" data-filter="app">2</span></li>
                <li><span class="filter" data-filter="card">3</span></li>
                <li><span class="filter" data-filter="icon">4</span></li>
            </ul>

            <div id="portfoliolist">
                <?php
                while($r = mysqli_fetch_array($rez)):
                    ?>
                    <div class="portfolio <?php echo $r['klasa'] ?> mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
                        <div class="portfolio-wrapper">

                            <a href="index.php" class="b-link-stripe b-animate-go  thickbox">

                                <img src="<?php echo $r['putanja']?>" /><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 "> </h2>
                                </div></a>
                        </div>
                    </div>
                <?php
                endwhile;

                ?>
            </div>

        </div>

    </div>
</div>
<!-- Gallery Ends Here -->
