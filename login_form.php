<?
	include "session.php";

	if($ses_userid != "") {
		echo "<script>
		location.replace(login.php);
		</script>";
		die;
	}
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>OO에 오신 것을 환영합니다.</title>
    <meta name="Subject" content="홈페이지주제 입력">
    <meta name="Title" content="홈페이지이름 입력">
    <meta name="Description" content="설명문 입력">
    <meta name="Keywords" content="키워드 입력">
    <meta name="Author" content="만든사람 이름"> 
    <link href="shortcut_apple1.png" rel="apple-touch-icon-precomposed" /> 
    <link href="shortcut_apple2.png" rel="apple-touch-icon" />
    <link href="apple-114x114.png" sizes="114x114" rel="apple-touch-icon" />
    <link href="apple-144x144.png" sizes="144x144" rel="apple-touch-icon" /> 
    <link href="favicon.ico" rel="shortcut icon" />
    <script type="text/javascript"> 
     <!-- 
     // 주소창 자동 닫힘 
     window.addEventListener("load", function(){ 
        setTimeout(loaded, 100); 
     }, false); 

     function loaded(){ 
        window.scrollTo(0, 1); 
     } 
     //--> 
    </script> 
<meta charset="utf-8" />
<style>
	#form_wrap { width:400px; margin:0 auto; }
	#form_wrap label { display:block; width:100px; float:left; height:40px; margin-top:30px; 
		line-height:40px; color:#2b2b2b; font-weight:600; }
	#fuserid, #fpasswd { display:block; width:250px; float:left; height:40px; margin-top:30px; }
	#btn_frame { clear:both; padding-top:30px;	 }
	#btn_frame input { display:block; width:150px; margin-right:50px; 	height:40px; 
		line-height:40px; border:0; background:#1FA5FF; text-align:center; color:#fff; 
		float:left; margin-top:30px; border-radius:20px; } 
</style>
<script>
function chk_logform(){
	if(login_form.fuserid.value=="") {
		alert('Input ID');
		login_form.fuserid.focus();
		return false;
	} else if(login_form.fpasswd.value=="") {
		alert('Input Password');
		login_form.fpasswd.focus();
		return false;
	} else {
		return true;
	}
}

</script>
</head>
<body>
	<div id="form_wrap">
	<form name="login_form" action="login.php" method="post" onsubmit="return chk_logform();">
		<label for="fuserid">ID</label>
		<input type="text" name="fuserid" id="fuserid" size="19" title="아이디 입력"><br /><br />
		<label for="fpasswd">PW</label>
		<input type="password" name="fpasswd" id="fpasswd" size="20" title="패스워드 입력"><br /><br />
		<div id="btn_frame">
			<input type="submit" name="submit" value="login">
			<input type="reset" name="reset" value="Reset"><br /><br />
		</div>
	</form>
	</div>
</body>
</html>