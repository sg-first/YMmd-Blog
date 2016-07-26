<?php
require_once dirname(__FILE__) . '/mdlib/Markdown.php';
require_once dirname(__FILE__) . '/mdlib/MarkdownExtra.php';
header("Content-Type: text/html; charset=utf-8");

//一层包装
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

//真正使用的
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