<?
require_once dirname(__FILE__).'/help.php'

CheckLogin();
//echo一个上传界面让用户传，上传完毕执行下面的
//获取目前时间，与上传文件名一同写入time.ini
//询问用户是否立即更新博客，如果是跳转到generate.php