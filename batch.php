<?php
date_default_timezone_set('Asia/Tokyo');
$countries = array('jp', 'us', 'cn', 'kr');
$source_filename_prefix = array('topfree', 'toppaid', 'topgrossing');
$source_dir = "./src";
$output_dir = "./data";

// データ格納用ディレクトリが存在しなければ作る
if (!is_dir($output_dir)) mkdir($output_dir, 0777);
foreach ($countries as $country) {
	$chk_dir = $output_dir . '/' . $country;
	if (!is_dir($chk_dir)) {
		mkdir($chk_dir, 0777);
	}
}

foreach ($countries as $country) {
	foreach ($source_filename_prefix as $filename_prefix) {
		$filename = $source_dir . '/' . $country . '_' . $filename_prefix . '.list';
		$contents = @file($filename);
		foreach ($contents as $line) {
			$rss_data = explode("," ,$line);
			$category = trim($rss_data[0]);
			$xml_url = trim($rss_data[1]);
			$output_filename = $output_dir . '/' . $country . '/' . $filename_prefix . '_' . $category . '_' . date('Ymd') . '.xml';
			$cmd = "wget " . $xml_url . " -O " . $output_filename;
			system($cmd);
		}
	}
}
