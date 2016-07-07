<?php
require_once dirname(__FILE__) . '/help/system.php';

//CheckLogin();

//echo一个上传界面让用户传，之前那个好像有毛病
echo "<html>
    <head>
        <link rel='stylesheet' type='text/css' href='upload.css'>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
        <style type='text/css' media='screen'>
    body {
        background-color: #666666;
        background-image:url(./upload_index_img/bg.jpg);
        margin-top: 400px;
        }   
        </style>
        <style type='text/css'>
a{display:inline-block; width:450px; height:80px; background-image:url(./upload_index_img/update_img_1.png); position:relative;}
        a:hover{background-image:url(./upload_index_img/update_img_0.png);}
        input{position:absolute; right:0; top:0; font-size:100px; opacity:0; }
        </style>
        <title></title>
    </head>
    <body>
        <center>
            <div>
                <form action='uploadA.php' method='post' enctype='multipart/form-data'>
                    <ol>
                        <li>
                            <a><input type='file' value='file'></a>
                        </li>
                        <li>
                            <a><input type='submit' value='Submit'> <img src='./upload_index_img/file_up_1.png'></a>
                        </li>
                    </ol>
                </form>
            </div>
        </center>
    </body>
</html>";

