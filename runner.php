<?php
require 'class/AppStoreRanking.php';

$downloader = new AppStoreRanking();
$downloader->makeOutputDir();
$downloader->downloadXml();