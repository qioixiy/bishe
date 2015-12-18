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
?>