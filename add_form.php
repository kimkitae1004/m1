<!DOCTYPE html>
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
	#form_wrap label { display:block; width:100px; float:left; height:40px;
	 margin-top:30px; line-height:40px; color:#2b2b2b; font-weight:600; }
	#fuserid, #fname, #fpasswd, #fpasswd_re { display:block; width:200px; float:left;
	 height:40px; margin-top:30px; }
	#form_wrap #pw_label { line-height:20px; }
	#ck_btn1 { display:block; width:80px; float:left; margin-top:30px; height:40px; 
		line-height:40px; 	text-align:center; }
	#btn_frame { clear:both; padding-top:30px;	 }
	#btn_frame input { display:block; width:150px; margin-right:50px; 	height:40px; 
		line-height:40px; border:0; background:#1FA5FF; text-align:center; color:#fff; 
		float:left; margin-top:30px; border-radius:20px; } 
	.radio_frame { clear:both; padding-top:40px; }
	#form_wrap .radio_frame label { width:70px; margin-top:0px; line-height:20px; }
	#form_wrap .radio_frame input[type=radio] { display:block; width:30px; float:left;
	 margin-top:0;	line-height:20px; }
	#form_wrap #email_box label { display:block; width:100px; float:left; height:40px;
	 margin-top:0px; line-height:40px; color:#2b2b2b; font-weight:600; }
	#form_wrap #email_box input { display:block; width:200px; float:left;
	 height:40px; margin-top:0px; }
</style>
<script>
function chk_input() {
	if(user_form.fuserid.value=="") {
		alert("Input your ID");
		user_form.fuserid.focus();
		return false;
	} else if(user_form.fname.value=="") {
		alert("Input your Name");
		user_form.fname.focus();
		return false;
	} else if(user_form.fpasswd.value=="") {
		alert("Input Password");
		user_form.fpasswd.focus();
		return false;
	} else if(user_form.fpasswd_re.value=="") {
		alert("Input Password one more");
		user_form.fpasswd_re.focus();
		return false;
	} else if(user_form.fpasswd.value != user_form.fpasswd_re.value) {
		alert("[Password] not match, please rewrite your PW");
		user_form.fpasswd.value="";
		user_form.fpasswd_re.value="";
		user_form.fpasswd.focus();
		return false;
	} else {
		return true;
	}
}
</script>
</head>
<body>
	<div id="form_wrap">
	<form name="user_form" action="add_db.php" method="post" onsubmit="return chk_input()">
		<label for="fuserid">ID</label>
		<input type="text" name="fuserid" id="fuserid" size="12" maxlength="12" onblur="if(fuserid.value!='') chk_id();">
		<input type="button" name="button" value="ID check" id="ck_btn1" onclick="chk_id();">
		<script>
		function chk_id() {
			if(user_form.fuserid.value=='') {
				alert('Input ID');
				user_form.fuserid.focus();
			} else {
				window.open('id_chk.php?fuserid='+user_form.fuserid.value,'IDwin','width=400,height=200');
			}
		}
		</script>
		<br /><br />
		<label for="fname">Name</label>
		<input type="text" name="fname" id="fname" size="12" maxlength="10"> <br /><br />
		<label for="fpasswd">Password</label>
		<input type="password" name="fpasswd" id="fpasswd" size="12" maxlength="10"> <br /><br />
		<label for="fpassword_re" id="pw_label">Confirming Password</label>
		<input type="password" name="fpasswd_re" id="fpasswd_re" size="12" maxlength="10" onblur="chk_passwd()"> <br />
		<br /><br /><br />
		<div class="radio_frame">
			<label for="" style="clear:both; width:100px">Sex</label>
			<input type="radio" name="fsex" value="m" id="man" checked> <label for="man">Man</label> 
			<input type="radio" name="fsex" value="w" id="woman"> <label for="woman">Woman</label> <br />
			<br />
		</div>
		<div class="radio_frame" id="email_box">
			<label for="femail">E-mail</label>
			<input type="text" name="femail" size="30" maxlength="30"> <br /><br /><br />
		</div>
		<div id="btn_frame">
			<input type="submit" name="smt" value="가입하기"> 
			<input type="reset" name="rst" value="다시작성">
		</div>
	</form>
	</div>
</body>
</html>