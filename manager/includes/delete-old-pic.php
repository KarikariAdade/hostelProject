<?php
$old_pic = $_POST['old_pic'];
$seg = explode('/', $old_pic);
$img_link = $seg[0].'/'.$seg[1].'/'.$seg[2].'/'.$seg[3].'/'.$seg[4].'/'.$seg[5].'/';
if (unlink($img_link.$seg[6])) {
	echo " ";
}else{
	echo ' ';
}
?>