<?php
require 'class/Sylvan.php';

$sylvan = new Sylvan();
$sylvan->makeOutputDir();
$sylvan->downloadXml();
