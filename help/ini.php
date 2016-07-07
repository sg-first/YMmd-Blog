<?php
function ini_file($inifilename,$mode=null,$key,$value=null)
{
    //传入参数为null时的默认值
    $inifilename = $inifilename==null ? 'Application.ini':$inifilename;
    $key = $key==null ? 'user' : $key;
    if(!file_exists($inifilename))
        return null;
    //读取
    $confarr = parse_ini_file($inifilename,true);
    $newini="";
    if($mode!=null)
    {
        //节名不为空
        if($value==null)
        {return @$confarr[$mode][$key]==null ? null : $confarr[$mode][$key];}
        else
        {$YNedit = @$confarr[$mode][$key]==$value ? false : true;//若传入的值和原来的一样，则不更改
            @$confarr[$mode][$key]=$value;
        }
    }
    else
    {
        //节名为空
        if($value==null)
        {return @$confarr[$key]==null ? null : $confarr[$key];}
        else
        {
            $YNedit = @$confarr[$key]==$value ? false : true;//若传入的值和原来的一样，则不更改
            $confarr[$key]=$value;
            $newini=$newini.$key."=".$value."\r\n";
        }

    }
    if(!$YNedit)
        return true;

    //更改
    $Mname=array_keys($confarr);
    $jshu=0;

    foreach ($confarr as $k => $v)
    {
        if(!is_array($v))
        {$newini=$newini.$Mname[$jshu]."=".$v."\r\n";$jshu += 1;}
        else
        {$newini=$newini.'['.$Mname[$jshu]."]\r\n";//节名
            $jshu += 1;
            $jieM=array_keys($v);
            $jieS=0;
            foreach ($v as $k2 => $v2)
            {$newini=$newini.$jieM[$jieS]."=".$v2."\r\n";$jieS += 1;}
        }
    }
    if ( ($fi = fopen($inifilename,"w")) )
    {
        flock($fi, LOCK_EX);//排它锁
        fwrite($fi, $newini);
        flock($fi, LOCK_UN);
        fclose($fi);
        return true;
    }
    return false;//写文件失败
}

function read_ini_file($inifilename,$mode=null,$key)
{
    return ini_file($inifilename,$mode,$key);
}

function write_ini_file($inifilename,$mode=null,$key,$value)
{
    ini_file($inifilename,$mode,$key,$value);
}