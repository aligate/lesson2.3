<?php  


function renderPicture($m){
	$file = "<?php\n";
	$file .= "require_once 'functions.php';\n";
	$file .= "header('Content-Type: image/png');\n";
	$file .= "getPrize('$m');\n";
	$file .="?>";
	file_put_contents(__DIR__.'/prize.php', $file);
}


function getPrize($message)
{
	
    $im = imagecreatetruecolor(360, 350);
	$backColor = imagecolorallocate($im, 255, 224, 221);
    $textColor = imagecolorallocate($im, 129, 15, 90);
    $fontFile = __DIR__ . '/arial.ttf';
    $imBox = imagecreatefrompng(__DIR__ . '/prize.png');
    imagefill($im, 0, 0, $backColor);
    imagecopy($im, $imBox, 10, 80, 20, 0, 256, 256);
    imagettftext($im, 20, 0, 30, 30, $textColor, $fontFile, $message);
    imagepng($im);
    imagedestroy($im);
}



?>