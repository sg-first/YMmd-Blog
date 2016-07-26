<?
require_once dirname(__FILE__).'/lib.php';
require_once dirname(__FILE__).'/help/system.php';
require_once dirname(__FILE__).'/mdlib/indexGener.php';

//CheckLogin();
$mydir = dir(dirname(__FILE__).'/journal/');

//开始把所有markdown生成HTML
while($file = $mydir->read())
{
	//提取后缀名
	$filearr = explode(".",$file); //注意，file是路径
	$filetype = end($filearr);
	//操作后缀名是md的
	if($filetype==='md')
	{WriteFile($file,$filearr[0].'.htm');} //把md文件对应的htm生成出来
}
$mydir->close();
$mydir = dir(dirname(__FILE__).'/journal/');
//下面开始主页生成部分
$index="";
while($file = $mydir->read())
{
    global $index;
    //提取后缀名
    $filearr = explode(".",$file); //注意，file是路径
    $filetype = end($filearr);
    //操作后缀名是htm的
    if($filetype==='htm')
    {
        $text=file_get_contents(dirname(__FILE__).'/journal/'.$file);
        $title=getTitle($text);
        $code=herf($title,dirname(__FILE__).'/journal/'.$file);
        $index=$index.$code."<br>";
    }
}
$mydir->close();
$file = fopen(dirname(__FILE__).'/index.htm', "a") or die("Unable to open file!");
fwrite($file, $index);
fclose($file);