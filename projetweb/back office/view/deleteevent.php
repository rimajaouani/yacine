<?php
require_once 'C:\xampp\htdocs\projet\projetweb\back office\controller\eventC.php';

$eventC = new eventC();
$eventC->deleteevent($_GET["idEvenement"]);
header('Location:listeevent.php');
