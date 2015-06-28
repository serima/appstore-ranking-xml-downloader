<?php
require 'AppStoreRanking.php';

$downloader = new AppStoreRanking();
$downloader->makeOutputDir();
$downloader->downloadXml();