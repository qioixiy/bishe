<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
 <head>
  <title>Index of /lfs/downloads/systemd</title>
 </head>
 <body>
<h1>Index of /lfs/downloads/systemd</h1>
  <table>
   <tr><th valign="top"><img src="/icons/blank.gif" alt="[ICO]"></th><th><a href="?C=N;O=D">Name</a></th><th><a href="?C=M;O=A">Last modified</a></th><th><a href="?C=S;O=A">Size</a></th><th><a href="?C=D;O=A">Description</a></th></tr>
   <tr><th colspan="5"><hr></th></tr>
<tr><td valign="top"><img src="/icons/back.gif" alt="[PARENTDIR]"></td><td><a href="/lfs/downloads/">Parent Directory</a></td><td>&nbsp;</td><td align="right">  - </td><td>&nbsp;</td></tr>
<tr><td valign="top"><img src="/icons/text.gif" alt="[TXT]"></td><td><a href="LFS-BOOK-20150928-systemd-NOCHUNKS.html">LFS-BOOK-20150928-systemd-NOCHUNKS.html</a></td><td align="right">2015-12-09 03:08  </td><td align="right">1.9M</td><td>&nbsp;</td></tr>
<tr><td valign="top"><img src="/icons/unknown.gif" alt="[   ]"></td><td><a href="LFS-BOOK-20150928-systemd-NOCHUNKS.html.bz2">LFS-BOOK-20150928-systemd-NOCHUNKS.html.bz2</a></td><td align="right">2015-12-09 03:08  </td><td align="right">152K</td><td>&nbsp;</td></tr>
<tr><td valign="top"><img src="/icons/layout.gif" alt="[   ]"></td><td><a href="LFS-BOOK-20150928-systemd.pdf">LFS-BOOK-20150928-systemd.pdf</a></td><td align="right">2015-12-09 03:08  </td><td align="right">1.5M</td><td>&nbsp;</td></tr>
<tr><td valign="top"><img src="/icons/unknown.gif" alt="[   ]"></td><td><a href="LFS-BOOK-20150928-systemd.tar.bz2">LFS-BOOK-20150928-systemd.tar.bz2</a></td><td align="right">2015-12-09 03:08  </td><td align="right">171K</td><td>&nbsp;</td></tr>
   <tr><th colspan="5"><hr></th></tr>
</table>
</body></html>

<?php
/**********************
一个简单的目录递归函数
第一种实现办法：用dir返回对象
***********************/
function tree($directory) 
{ 
	$mydir = dir($directory); 
	echo "<ul>\n"; 
	while($file = $mydir->read())
	{ 
		if((is_dir("$directory/$file")) AND ($file!=".") AND ($file!="..")) 
		{
			echo "<li><font color=\"#ff00cc\"><b>$file</b></font></li>\n"; 
			tree("$directory/$file"); 
		} 
		else 
		echo "<li>$file</li>\n"; 
	} 
	echo "</ul>\n"; 
	$mydir->close(); 
} 
//开始运行

echo "<h2>目录为粉红色</h2><br>\n"; 
tree("./nowamagic"); 

/***********************
第二种实现办法：用readdir()函数
************************/
function listDir($dir)
{
	if(is_dir($dir))
   	{
     	if ($dh = opendir($dir)) 
		{
        	while (($file = readdir($dh)) !== false)
			{
     			if((is_dir($dir."/".$file)) && $file!="." && $file!="..")
				{
     				echo "<b><font color='red'>文件名：</font></b>",$file,"<br><hr>";
     				listDir($dir."/".$file."/");
     			}
				else
				{
         			if($file!="." && $file!="..")
					{
         				echo $file."<br>";
      				}
     			}
        	}
        	closedir($dh);
     	}
   	}
}
//开始运行
listDir("./");
?>
