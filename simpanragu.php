<?php 
include "config/server.php";
$user = $_COOKIE['PESERTA'];
if(isset($_REQUEST['chk'],$_REQUEST['who'])){
 $sql = mysql_query("update cbt_jawaban set XRagu = '$_REQUEST[chk]' where Urut='$_REQUEST[who]' AND XUserJawab = '$user'");
 }
 
if($_REQUEST['anu']==0){
$sql = mysql_query("update cbt_audio set XMulai = '$_REQUEST[anu]', XPutar = '2'");
} else {
$sql = mysql_query("update cbt_audio set XMulai = '$_REQUEST[anu]'");
}