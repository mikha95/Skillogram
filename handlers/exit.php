<?php 
session_start();

$path = __FILE__;
$pathParts = pathinfo($path);
$filePath = $pathParts['filename'];

include realpath(dirname(__FILE__).'/../controller/controller.php');
?>
