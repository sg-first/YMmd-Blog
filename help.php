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

function CheckLogin()
{
	if(!isset($_SESSION['userid']))
	{
		header("Location:login.html");  
		exit();
	}
}

//���ϴ�����ҳ���ɽ����ﶼ�еǳ���ť
function LoginOut()
{
	unset($_SESSION['userid']);
    unset($_SESSION['password']); 
    echo 'ע����¼�ɹ�';  
    exit;
}