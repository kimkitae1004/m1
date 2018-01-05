<?
$host = "localhost";
$user = "root";  //닷홈에 올릴때는 본인 닷홈 db id로 수정
$passwd = "apmsetup"; //닷홈에 올릴때는 본인 닷홈 db pw로 수정

$connect = mysql_connect($host, $user, $passwd) or die ("mysql Server Connection Error");
mysql_select_db('cmb1004',$connect) or die ("DB Connection Error");
//cmb1004는 닷홈에 올릴때는 본인 db명으로 수정하여 ftp로 업로드
?>