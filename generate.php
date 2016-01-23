<?
require_once dirname(__FILE__).'/lib.php'
require_once dirname(__FILE__).'/help.php'

CheckLogin();
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