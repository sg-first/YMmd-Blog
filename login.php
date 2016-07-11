<?php  
//这玩意是那个login.html对应的PHP文件，但那个还没画
//在执行这个文件时，用户传入了一个登陆密码和登陆之后要干的事的表单

require_once dirname(__FILE__).'/help.php';

if(!isset($_POST['submit'])) //判断是否有表单提交
{exit('非法访问!');}  

$password = $_POST['password'];
ValidaPassword($password);
//登录成功
session_start();  
$_SESSION['password'] = $password;  
//查看登陆行为
$action = $_POST['action'];
if($action==='upload')
{
	header("Location:upload.php");
}
if($action==='generate')
{
	header("Location:generate.php");
}