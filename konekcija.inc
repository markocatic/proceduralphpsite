<?php
  $konekcija = mysqli_connect('localhost', 'root', '', 'sajtBaza');

  if(!$konekcija)
  {
    echo "GRESKA!";
  }
