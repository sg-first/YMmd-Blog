<?
function ValidaPassword($password)
{
	$filename = dirname(__FILE__).'/'.$password.'.pw';
	$handle = fopen($filename, "r");
	$contents = fread($handle, filesize ($filename)); //ͨ��filesize����ļ���С���������ļ�һ���Ӷ���һ���ַ�����
	fclose($handle);

	if($contents!==$password)
	{exit('Password error');}
}