<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!-- Header Ends Here -->
<!-- Games Page Starts here -->
<?php
include 'konekcija.inc';
session_start();
?>
		<div class="contact">
			<h3 class="page-header">Contact Us</h3>
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2837.9384693349416!2d20.20214170197352!3d44.65960877824769!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2srs!4v1516189177482" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="contact-box">
                <form action="#" method="post">
				<div class="text">
					<input type="text" id="contactName" value="" placeholder="Name" required="" />
					<input type="text" id="contactSubject" name="subject" placeholder="Subject" required=""/>
					<input type="text" id="contactEmail" name="email" placeholder="Email" required=""/>
				</div>
				<div class="text">
					<textarea placeholder="Message" name="message" id="contactMessage" required=""></textarea>
				</div>
				<div class="text-but">
					<input type="button" onclick="contact()" value="submit" />
				</div>
                </form>
                <div id="feedback">


                </div>
			</div>
			<div class="address-box">
				<h3 class="page-header">Address</h3>
				<h4>Milosa Obilica 1</h4>
				<p>You can find us at the address above this text, but why would you when you can just order from our website</p>
				<p>We have free shipping on every game above 30$, plus the shipping is so fast, you won't even notice it! </p>
				<a href="mailto:catasrbija@live.com">catasrbija@live.com</a>
				<p>011/8623-232</p>
			</div>
			<div class="clearfix"></div>
		</div>
