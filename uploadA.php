<?php
require_once dirname(__FILE__) . '/help/ini.php';
require_once dirname(__FILE__) . '/help/webpage.php';
header("Content-Type: text/html; charset=utf-8");

function upload()
{
    if (($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "text/plain")
        && ($_FILES["file"]["size"] < 10485760))
    {
        if ($_FILES["file"]["error"] > 0)
        {
            alert("文件错误");
            tourl("upload.php");
        }
        else
        {
            if (file_exists("upload/" . $_FILES["file"]["name"]))
            {
                alert("文件已经存在");
                tourl("upload.php");
            }
            else
            {
                move_uploaded_file($_FILES["file"]["tmp_name"], "jpurnal/".$_FILES["file"]["name"]);
                //文件存储在journal文件夹中
                alert("上传成功");
            }
        }
    }
    else
    {
        alert("文件类型不支持");
        tourl("upload.php");
    }
}

upload();
//获取目前时间，与上传文件（日志）名一同写入time.ini（time.ini在主页生成时用）
$time=date_default_timezone_set('Asia/Shanghai');
$name=$_FILES["file"]["name"];
write_ini_file(dirname(__FILE__).'/time.ini',"time",$name,$time);
//询问用户是否立即更新博客，如果是跳转到generate.php
?>

<html>
<head>
    <meta charset="utf-8">
    <title>YMmd Blog - 更新博客</title>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script>
        $(function() { //主选择器
            $("button#yes").click(
                    function(event)
                    {
                        window.location.href="generate.php";
                    });
            $("button#no").click(
                    function(event)
                    {
                        window.location.href="index.htm";
                    });
        });
    </script>
</head>
<body>

是否要立即更新博客？<br>
<button id="yes">是</button><br>
<button id="no">否</button><br>

</body>
</html>


