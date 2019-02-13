<?php include 'konekcija.inc';
@session_start();
  $upit = "SELECT * FROM meni WHERE roditelj=0";
  $rezultat = mysqli_query($konekcija, $upit);
  mysqli_fetch_array($rezultat);
  ?>
   <div class='header'>
	   <div class='container'>
		<div class='logo'>
			<a href='index.php'><img src='images/logo.png' alt=''></a>
		</div>
		<span class='menu'></span>
		<div class='navigation'>
			<ul class='navig cl-effect-3 linkovi'>
                <?php foreach($rezultat as $r): ?>
                <li><a href="<?php echo $r['link'] ?>"><?php echo $r['ime_linka'] ?></a></li>
                <?php endforeach; ?>
                <?php
                    if($_SESSION['id_uloga']=='1' )
                    {
                        echo '<li><a href="index.php?ime_linka=logout">Logout</a></li>';
                    }
                    elseif($_SESSION['id_uloga']=='2')
                    {
                        echo '<li><a href="index.php?ime_linka=logout">Logout</a></li>';
                    }
                ?>
			</ul>
			<div class='search-bar'>
					<input type='text' placeholder='search' required=''  value='search'/>
					<input type='submit' value='' />
			</div>
			<div class='clearfix'></div>
			<script>
				$( 'span.menu' ).click(function() {
				  $( '.navigation' ).slideToggle( 'slow', function() {
				    // Animation complete.
				  });
				});
			</script>

		</div>
		<div class='clearfix'></div>
	</div>
</div>
<div class='banner'></div>
