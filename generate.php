<?
require_once dirname(__FILE__).'/lib.php'

//读取密码的写这里，下面开始用$password代表用户输入的密码

$filename = dirname(__FILE__).'/'.$password.'.pw';
$handle = fopen($filename, "r");
$contents = fread($handle, filesize ($filename)); //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
fclose($handle);

if($contents!==$password)
{exit('Password error');}

$mydir = dir(dirname(__FILE__));
while($file = $mydir->read())
{
	//提取后缀名
	$filearr = split(".",$file);
	$filetype = end($filearr);
	//检查后缀名是否是md
	if(filetype==='md')
	{WriteFile($file,$filearr[0].'.htm');}
}
$mydir->close();