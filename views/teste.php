<?php
$image_file = 'images\Visão.JPG';
$exif = exif_read_data($image_file, 0, true);
$brand = $exif["IFD0"]["Make"];
$camera = $exif["IFD0"]["Model"];
$software = $exif["IFD0"]["Software"];
$size = $exif["FILE"]["FileSize"];
$date_time = $exif["IFD0"]["DateTime"];
$width = $exif["COMPUTED"]["Width"];
$height = $exif["COMPUTED"]["Height"];
$aperture = $exif["COMPUTED"]["ApertureFNumber"];
$shutter_speed = $exif["EXIF"]["ExposureTime"];
$iso = $exif["EXIF"]["ISOSpeedRatings"];
$focal_length = $exif["EXIF"]["FocalLength"];
$lens = $exif["EXIF"]["UndefinedTag:0xA434"];
$fl_calc = eval('return ' . $focal_length . ';');
$focal_length_mm = "$fl_calc mm";
?>