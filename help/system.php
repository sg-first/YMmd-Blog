<?
function ValidaPassword($password)
{
	$filename = dirname(__FILE__).'/'.$password.'.pw';
	$handle = fopen($filename, "r");
	$contents = fread($handle, filesize ($filename)); //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
	fclose($handle);

	if($contents!==$password)
	{
        alert("密码输入错误");
        tourl("../login.htm");
    }
}

//如果没登录直接跳到登录界面
function CheckLogin()
{
	if(!isset($_SESSION['password']))
	{tourl("../login.htm");}
}

//在上传和主页生成界面里都有登出按钮
function LoginOut()
{
	unset($_SESSION['password']);
    echo '注销登录成功';
    tourl("../login.htm");
}