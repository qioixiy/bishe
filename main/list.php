

<?php
function listDir($dir, $level, $array)
{
	if ($level <= 0) {
		return;
	}
	if(is_dir($dir))
   	{
     	if ($dh = opendir($dir)) 
		{
        	while (($file = readdir($dh)) !== false)
			{
				$_array = array();
				
         		if($file!="." && $file!="..") {
	     			if(is_dir($dir."/".$file))
					{
	     				$_array = array_fill(0, 1, $file);
	     				$_array = listDir($dir."/".$file."/", $level-1, $_array);
	     			} else {
	     				array_push($_array, $file);
	     			}
	         		array_push($array, $_array);
         		}
        	}
        	closedir($dh);
     	}
   	}
   	return $array;
}
//echo json_encode(listDir("../", 2, array()));
function listDirTohtml($array)
{
	//echo json_encode($array);
	for ($i= 0; $i< count($array); $i++){
		if (is_null($array[$i])) {
			continue;
		}
      	$str= $array[$i][0];
      	$size = filesize("../data/upload/" . $str);
      	if ($size > 1024 && $size < 1024*1024) {
      		$size = round($size/1024, 3) . "K";
      	} else if ($size >= 1024*1024) {
      		$size = round($size/1024/1024, 3) . "M";
      	}
      	//echo "$str<br />"; 
      	$_fileatime = date('Y-m-d H:i:s', fileatime("../data/upload/" . $str));
		echo "
			<tr>
				<td valign=\"top\">
					<img src=\"/icons/text.gif\" alt=\"[   ]\">
				</td>
				<td>
					<a href=/main/download.php?filename=$str>$str</a>
				</td>
				<td align=\"right\">$_fileatime</td>
				<td align=\"right\">$size</td>
				<td>&nbsp;</td>
			</tr>";
    }
}

?>
<h1>...</h1>
<table>
	<tr>
		<th valign="top"><img src="/icons/text.gif" alt="[ICO]"></th>
		<th><a href="?C=N;O=D">文件名</a></th>
		<th><a href="?C=S;O=A">上传时间</a></th>
		<th><a href="?C=M;O=A">大小</a></th>
		<th></th>
	</tr>
	<tr>
		<th colspan="4">
			<hr>
		</th>
	</tr>
<?php
listDirTohtml(listDir("../data/upload", 1, array()));
?> 

<tr>
	<th colspan="4">
		<hr>
	</th>
</tr>
</table>