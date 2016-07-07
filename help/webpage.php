<?php
function alert($context)
{echo "<script>alert('$context')</script>";}

function exitPage()
{echo '<script>window.close();</script>';}

function tourl($url)
{echo "<script>url='$url';window.location.href=url;</script>";}