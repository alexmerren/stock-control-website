<?php
session_start();
$session = $_SESSION['appUser'] ;
if ( isset($session) && $session != '')
{
  $loggedIn = "<a href='logout.php'>Logout ". $session ."</a>" ;
}

else
{
header('Location: ajcm203');
}

 ?>
