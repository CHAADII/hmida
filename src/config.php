<?php  
$mongo = new MongoDB\Client('mongodb://localhost:27017');
$c1=$mongo->projet->user;
$c=$mongo->projet->Publication;
?>