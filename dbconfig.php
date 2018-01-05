<?php
	$db = new mysqli('localhost', 'root', 'apmsetup', 'cmb1004');
//root를 닷홈에 올릴때는 본인 닷홈 db id로 수정
 //apmsetup은 닷홈에 올릴때는 본인 닷홈 db pw로 수정
//cmb1004는 닷홈에 올릴때는 본인 db명으로 수정하여 ftp로 업로드
	if ($db->connect_error) {
		die('데이터베이스 연결에 문제가 있습니다.\n관리자에게 문의 바랍니다.');
	}

	$db->set_charset('utf8');
?>