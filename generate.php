<?
require_once dirname(__FILE__).'/lib.php';
require_once dirname(__FILE__).'/help/system.php';

CheckLogin();
//开始把所有markdown生成HTML
$mydir = dir(dirname(__FILE__).'/journal/');
while($file = $mydir->read())
{
	//提取后缀名
	$filearr = split(".",$file);
	$filetype = end($filearr);
	//检查后缀名是否是md
	if($filetype==='md')
	{WriteFile($file,$filearr[0].'.htm');} //把md文件对应的htm生成出来
}
$mydir->close();

//下面开始主页生成部分，首先我们得有一个主页模板