<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ECU升级管理系统</title>
    <link href="/css/main_layout.css" rel="stylesheet" type="text/css" />
    <meta name="Keywords" content="ECU升级管理系统" />
    <meta name="Description" content="" />
  </head>

  <body onload="setval(1); update_mainframe();">
    <div class="header">
      <h1 align="center">ECU升级管理系统</h1>
    </div>
    <div class="maincontent">
      <div class="sidebar">
	      <h4 style="background-color: gray;">&nbsp;<strong>导航栏</strong>&nbsp;</h4>
        <?php
          require_once("../session/session.php");
          echo "<p align=\"right\" style=\"color: red;\"> Welcome " . get_username() . "</p>";
        ?>
        <div id="navi">
	        <ul>
	          <li style="border-style: solid; border-width: 0px 0px 1px 0px;" onmouseout="this.style.backgroundColor=''" onmouseover="this.style.backgroundColor='#778899'"><a href="/">&nbsp;重新登录&nbsp;</a></li>
            <?php
            $lis = array(
              1=>"查看所有版本",
              2=>"发布上传版本");
            foreach($lis as $index=>$tips) {
              //echo "<li onmouseout=\"this.style.backgroundColor=''\" onmouseover=\"this.style.backgroundColor='#778899'\"><a href=$href onclick=\"update_mainframe(this)\" >&nbsp;$li&nbsp;</a></li>\n";
              echo "<li onmouseout=\"this.style.backgroundColor=''\" onmouseover=\"this.style.backgroundColor='#778899'\"><a href=\"javascript:setval($index), update_mainframe();\">&nbsp;$tips&nbsp; </a></li>\n";
            }
            ?>
        	</ul>
      </div>
    </div>
    <div id="mainframe" class="content">
    </div>
  </div>

<script type="text/javascript">
function s() {
  alert('aa')
}
var index = 0;
function setval(v){
  index = v
}
//window.setTimeout(setval,10);

var xmlHttp=null;
function GetXmlHttpObject() {
	try	{
		// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	} catch (e) {
		// Internet Explorer
		try	{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}

function stateChanged() {
	if (xmlHttp.readyState==4 && xmlHttp.status==200) {
	  //alert(xmlHttp.responseText)
		document.getElementById("mainframe").innerHTML=xmlHttp.responseText 
	}
}
function writeObj(obj){ 
 var description = ""; 
 for(var i in obj){ 
  var property=obj[i]; 
  description+=i+" = "+property+"\n"; 
 } 
 alert(description); 
} 
function update_mainframe() {

  xmlHttp = GetXmlHttpObject()
  if (xmlHttp == null) {
    alert ("Browser does not support HTTP Request")
		return
  }
  var url="test.txt"
  switch(index) {
  case 1: url = "./list.php"; break;
  case 2: url="../upload/index.html"; break;
  default: 
  }
  
	xmlHttp.onreadystatechange=stateChanged
	xmlHttp.open("GET", url, true)
	xmlHttp.send()
}
</script>
