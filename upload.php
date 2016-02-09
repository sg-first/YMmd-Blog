<?php
require_once dirname(__FILE__).'/help.php'
function alert($context)
{echo "<script>alert('$context')</script>";}

function write_ini_file($assoc_arr, $path, $has_sections=false) 
{
    $content = ""; 
    if ($has_sections) { 
        foreach ($assoc_arr as $key=>$elem) { 
            $content .= "[".$key."]n"; 
            foreach ($elem as $key2=>$elem2) { 
                if(is_array($elem2)) 
                { 
                    for($i=0;$i<count($elem2);$i++) 
                    { 
                        $content .= $key2."[] = "".$elem2[$i].""n"; 
                    } 
                } 
                else if($elem2=="") $content .= $key2." = n"; 
                else $content .= $key2." = "".$elem2.""n"; 
            } 
        } 
    } 
    else { 
        foreach ($assoc_arr as $key=>$elem) { 
            if(is_array($elem)) 
            { 
                for($i=0;$i<count($elem);$i++) 
                { 
                    $content .= $key2."[] = "".$elem[$i].""n"; 
                } 
            } 
            else if($elem=="") $content .= $key2." = n"; 
            else $content .= $key2." = "".$elem.""n"; 
        } 
    } 
    if (!$handle = fopen($path, 'w')) { 
        return false; 
    } 
    if (!fwrite($handle, $content)) { 
        return false; 
    } 
    fclose($handle); 
    return true; 
}

function upload()
{
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/pjpeg"))
	|| ($_FILES["file"]["type"] == "text/plain"))
	&& ($_FILES["file"]["size"] < 10485760))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			alert("文件错误");
		} 
		else 
		{
			if (file_exists("upload/" . $_FILES["file"]["name"])) 
			{
				alert("文件已经存在");
			} 
			else 
			{
				move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
				//文件存储在"upload/".$_FILES["file"]["name"]
				alert("上传成功");
			}
		}
	}
	else
	{
		alert("文件类型不支持");
	}
}

CheckLogin();
//echo一个上传界面让用户传，之前那个好像有毛病
echo "<html>
    <head>
        <link rel="stylesheet" type="text/css" href="upload.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <style type="text/css" media="screen">
body {
        background-color: #666666;
        background-image:url(./upload_index_img/bg.jpeg);
        margin-top: 400px;

        /*-webkit-text-size-adjust:none;*/
        }   
        </style>
        <style type="text/css">
a{display:inline-block; width:450px; height:80px; background-image:url(./upload_index_img/update_img_1.png); position:relative;}
        a:hover{background-image:url(./upload_index_img/update_img_0.png);}
        input{position:absolute; right:0; top:0; font-size:100px; opacity:0; }
        </style>
        <title></title>
    </head>
    <body>
        <center>
            <div>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <ol>
                        <li>
                            <a><input type="file" value="file"></a>
                        </li>
                        <li>
                            <a><input type="submit" value="Submit"> <img src="./upload_index_img/file_up_1.png"></a>
                        </li>
                    </ol>
                </form>
            </div>
        </center>
    </body>
</html>";
upload();
//获取目前时间，与上传文件名一同写入time.ini
$time=date(‘y-m-d h:i:s’,time());
$iniarr=parse_ini_file(dirname(__FILE__).'/time.ini',false);
$iniarr[$_FILES["file"]["name"]]=$time;
write_ini_file($iniarr,dirname(__FILE__).'/time.ini',false);
//询问用户是否立即更新博客，如果是跳转到generate.php

