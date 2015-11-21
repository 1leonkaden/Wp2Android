<?php
/*
Uploadify v2.1.4
Release Date: November 8, 2010

Copyright (c) 2010 Ronnie Garcia, Travis Nickels

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
require_once('../../function.php');

if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';

	$first = explode(".",$_FILES['Filedata']['name']);
	$ext = end($first);
	$idc = $_POST['idc'];	
	$filename = $idc.'_a.'.$ext;			
	$targetFile = str_replace('//','/',$targetPath) . $filename;
	
	$lacz = lacz_bd();
	$wynik = $lacz->query("update nta_article set photo = '$filename' where id = '$idc'");
		
	move_uploaded_file($tempFile,$targetFile);
	echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$targetFile);	
		
				
		$imgsize = getimagesize($targetFile);
switch(strtolower(substr($targetFile, -3))){
    case "jpg":
        $image = imagecreatefromjpeg($targetFile);    
    break;
    case "png":
        $image = imagecreatefrompng($targetFile);
    break;
    case "gif":
        $image = imagecreatefromgif($targetFile);
    break;
    default:
        exit;
    break;
}

$width = 1020; 
$height = 597;  

$src_w = $imgsize[0];
$src_h = $imgsize[1];
    

$picture = imagecreatetruecolor($width, $height);
imagealphablending($picture, false);
imagesavealpha($picture, true);
$bool = imagecopyresampled($picture, $image, 0, 0, 0, 0, $width, $height, $src_w, $src_h); 

if($bool){
    switch(strtolower(substr($targetFile, -3))){
        case "jpg":
            header("Content-Type: image/jpeg");
            $bool2 = imagejpeg($picture,$targetPath.$filename,$height);
        break;
        case "png":
            header("Content-Type: image/png");
            imagepng($picture,$targetPath.$filename);
        break;
        case "gif":
            header("Content-Type: image/gif");
            imagegif($picture,$targetPath.$filename);
        break;
    }
}

imagedestroy($picture);
imagedestroy($image);

echo '1';	
		
}
?>