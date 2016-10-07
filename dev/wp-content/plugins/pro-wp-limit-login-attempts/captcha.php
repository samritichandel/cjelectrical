<?php
 
// Start the session
session_start();
 

// Set the content-type
header('Content-Type: image/png');
$fifty = rand(10,85);
    $im = imagecreatefrompng('./images/white-wave.png');
    $newim = imagecreatetruecolor(imagesx($im),imagesy($im));
    for ($x = 0; $x < imagesx($im); $x++) {
        for ($y = 0; $y < imagesy($im); $y++) {

        $rgba = imagecolorsforindex($im, imagecolorat($im, $x, $y));
        $col = imagecolorallocate($newim, $rgba["red"], $rgba["green"], $rgba["blue"]);
         

        $distorted_y = ($y + round(100*sin($x/$fifty)) + imagesy($im)) % imagesy($im);
        imagesetpixel($newim, $x, $distorted_y, $col);
        }
    }


// Create the image
$im =   $newim ;//@imagecreatefrompng("./images/white-wave.png");

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
//imagefilledrectangle($im, 0, 0, 399, 29, $white);

// The text to draw
$text = substr(md5(microtime()),rand(0,26),5);
$_SESSION["wp_limit_captcha"] = $text;

// Replace path by your own font path
$font = './images/coolvetica.ttf';

// Add some shadow to the text
//imagettftext($im, 20, 0, 36, 36, $grey, $font, $text);

// Add the text
imagettftext($im, 20, 0, 35, 35, $black, $font, $text);


// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);
?>