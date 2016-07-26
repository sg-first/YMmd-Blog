<?php
require_once dirname(__FILE__) . '/mdlib/Markdown.php';
require_once dirname(__FILE__) . '/mdlib/MarkdownExtra.php';
header("Content-Type: text/html; charset=utf-8");

$explain='ExplainMarkdown';//超链接接口默认调用的解释器是Markdown
$instruction = explode(",",$_POST["instruction"]);
if($instruction[0]=="WriteFile")
{
    if($instruction[3]==null)
    {WriteFile($instruction[1],$instruction[2]);}
    else
    {WriteFile($instruction[1],$instruction[2],$instruction[3]);}
}
if($instruction[0]=="ExplainAndEcho")
{
    if($instruction[2]==null)
    {ExplainAndEcho($instruction[1]);}
    else
    {ExplainAndEcho($instruction[1],$instruction[2]);}
}

//后台接口函数
function ExplainMarkdown($path,$font=null)
{
	$text = file_get_contents($path);
	return Michelf\Markdown::defaultTransform($text,$font);
}

function ExplainMarkdownExtra($path)
{
	$text = file_get_contents($path);
	return Michelf\MarkdownExtra::defaultTransform($text);
}

//超链接接口函数
function ExplainAndEcho($path,$font=null)
{
    global $explain;
    echo $explain($path,$font);
}

function WriteFile($mdPath,$htmPath,$font=null)
{
    global $explain;
	$code=$explain($mdPath,$font);
	$file = fopen($htmPath, "a") or die("Unable to open file!");
	fwrite($file, $code);
	fclose($file);
}