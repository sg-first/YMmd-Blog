<?php
/*spl_autoload_register(//注册autoload，自动包含类
	function($class)
	{require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';}
	);
use \Michelf\Markdown;*/
require_once dirname(__FILE__).'/lib/Markdown.inc.php';
require_once dirname(__FILE__).'/lib/MarkdownExtra.inc';

$explain='ExplainMarkdown';//超链接接口默认调用的解释器是Markdown
$instruction = explode(",",$_POST["instruction"]);
if(instruction[0]=="WriteFile")
{WriteFile(instruction[1],instruction[2]);}
if(instruction[0]=="ExplainAndEcho")
{ExplainAndEcho(instruction[1]);}

//后台接口函数（注意，路径最好不要使用中文，否则一些空间会因为编码问题引发错误）
function ExplainMarkdown($path)
{
	$text = file_get_contents($path);
	return Markdown::defaultTransform($text);
}

function ExplainMarkdownExtra($path)
{
	$text = file_get_contents($path);
	return MarkdownExtra::defaultTransform($text);
}

//超链接接口函数
function ExplainAndEcho($path)
{echo $explain($path);}

function WriteFile($mdPath,$htmPath)
{
	$code=$explain($mdPath);
	$file = fopen(dirname(__FILE__)."/".$htmPath.".htm", "a") or die("Unable to open file!");
	fwrite($file, $code);
	fclose($file);
}
?>
