<?
function ValidaPassword($password)
{
	$filename = dirname(__FILE__).'/'.$password.'.pw';
	$handle = fopen($filename, "r");
	$contents = fread($handle, filesize ($filename)); //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
	fclose($handle);

	if($contents!==$password)
	{exit('Password error');}
}