<?
require_once dirname(__FILE__).'/lib.php'
require_once dirname(__FILE__).'/help.php'

//读取密码的写这里，下面用$password代表用户输入的密码
ValidaPassword($password);
//开始把所有markdown生成HTML
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

//下面开始主页生成部分，首先我们得有一个主页模板