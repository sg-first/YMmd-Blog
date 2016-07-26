<?php
function herf($text,$herf)
{
    return "<a href='".$herf."'>".$text."</a>";
}

function getTitle($code)
{
    $title=explode("<h1>",$code)[1]; //取第一个大标题开始以后的
    $title=explode("</h1>",$title)[0]; //取第一个大标题结束以前的
    return $title;
}