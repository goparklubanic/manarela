<?php
if(!session_id()) session_start();
// bootstraping technique
require_once("../app/init.php");

$app = new App;