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
<link rel="stylesheet" href="sub_common.css" />
<style>
	#form_wrap { width:80%; margin:40px auto; }
	#form_wrap label { display:block; width:100%; float:left; height:32px; margin-top:10px; 
		line-height:40px; color:#2b2b2b; font-weight:600; }
	#fuserid, #fname, #fpasswd, #fpasswd_re, #femail { display:block; width:100%; float:left; height:40px; margin:10px auto; text-indent:10px; }
    #fuserid { width:60%; }
	#form_wrap #pw_label { line-height:20px; }
	#ck_btn1 { display:block; width:80px; float:left; margin-top:30px; height:40px; 
		line-height:40px; 	text-align:center; }
	#btn_frame { clear:both; padding-top:30px;	 }
	#btn_frame input { display:block; width:30%; margin-right:40%; 	height:40px; 
		line-height:40px; border:0; background:#1FA5FF; text-align:center; color:#fff; 
		float:left; margin-top:30px; border-radius:20px;
    background: #545d7b; /* Old browsers */
background: -moz-linear-gradient(top, #545d7b 0%, #363b49 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, #545d7b 0%,#363b49 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, #545d7b 0%,#363b49 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#545d7b', endColorstr='#363b49',GradientType=0 ); /* IE6-9 */ 
    border-left:1px solid #68686a;  border-right:1px solid #121315; 
    border-top:1px solid #68686a;  border-bottom:1px solid #121315; outline:0; border:0; } 
    #btn_frame input.last { margin-right: 0; }
    #form_wrap #ck_btn1 { display:block; width:30%;  	height:40px; margin-left: 15px;
		line-height:40px; border:0; background:#1FA5FF; text-align:center; color:#fff; 
		float:left; margin-top:10px; border-radius:20px;
    background: #545d7b; /* Old browsers */
background: -moz-linear-gradient(top, #545d7b 0%, #363b49 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, #545d7b 0%,#363b49 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, #545d7b 0%,#363b49 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#545d7b', endColorstr='#363b49',GradientType=0 ); /* IE6-9 */ 
    border-left:1px solid #68686a;  border-right:1px solid #121315; 
    border-top:1px solid #68686a;  border-bottom:1px solid #121315; outline:0; border:0; }
	.radio_frame { clear:both; padding-top:40px; }
    #form_wrap .radio_frame ul { clear:both; }
    #form_wrap .radio_frame li { float:left; width: 50%; }
	#form_wrap .radio_frame label { width:30%; margin-top:0px; line-height:20px; display:block; }
	#form_wrap .radio_frame input[type=radio] { display:block; width:30px; float:left;	 margin-top:0;	line-height:20px; }
	#form_wrap #email_box label { display:block; width:100px; float:left; height:40px;
	 margin-top:0px; line-height:40px; color:#2b2b2b; font-weight:600; }
	#form_wrap #email_box input { display:block; width:100%; float:left;
	 height:40px; margin-top:0px; }
    .blankFrame { width:100%;    height: 200px; }
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
<link rel="stylesheet" href="sidebar.css" />
<style>
    #ft { clear:both; width:100%; height:100px;
     background:#3d3e43; color:#fff; line-height:100px; 
    position:fixed; bottom:0px; left:0; text-align:center; }
</style>
</head>
<body>
    <header id="hd">
        <div class="hdbar">
            <a href="index.html" class="home">home</a>
            <h2 class="title">BLACKPINK</h2>
            <label for="collap_ck" class="collap">collap</label>
        </div>
        <input type="checkbox" id="collap_ck">
        <nav id="collapMenu" class="colItem">
            <ul>
                <li><a href="login_form.php">로그인</a></li>
                <li><a href="add_form.php">회원가입</a></li>
                <li><a href="mailto:kkt09072@naver.com">이메일</a></li>
                <li><a href="tel:010-3403-4190">전화</a></li>
            </ul>
        </nav>
        <nav id="gnb" class="colItem">
            <ul>
                <li><a href="sub1.html">회사소개</a></li>
                <li><a href="sub2.html">소속 연예인</a></li>
                <li><a href="sub3.html">오시는길</a></li>
                <li><a href="./board/list.php">공지사항</a></li>
            </ul>
        </nav>
     </header>
     <br/>
     <h2 class="pageTitle">회원가입</h2>
	<div id="form_wrap">
	<form name="user_form" action="add_db.php" method="post" onsubmit="return chk_input()">
	    <p class="coment" style="font-size:0.8em">* ID는 12자 이내 영문자로 시작, 영문 소문자와 숫자 사용</p>
		<label for="fuserid">ID</label>
		<input type="text" name="fuserid" id="fuserid" size="12" maxlength="12" onblur="if(fuserid.value!='') chk_id();" placholder="아이디 입력">
		<input type="button" name="button" value="ID check" id="ck_btn1" onclick="chk_id();" class="frmBtn">
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
		<input type="text" name="fname" id="fname" size="12" maxlength="10" placeholder="이름을 입력"> <br /><br />
		<label for="fpasswd">Password</label>
		<input type="password" name="fpasswd" id="fpasswd" size="12" maxlength="10" placeholder="암호 입력"> <br /><br />
		<label for="fpassword_re" id="pw_label">Confirming Password</label>
		<input type="password" name="fpasswd_re" id="fpasswd_re" size="12" maxlength="10" onblur="chk_passwd()" placeholder="암호 확인 입력"> <br />
		<br /><br /><br />
		<div class="radio_frame">
			<label for="" style="clear:both; width:100px">Sex</label>
			<br/>
			<ul>
               <li>
                    <input type="radio" name="fsex" value="m" id="man" checked> 
                    <label for="man">Man</label> 
                    </li>
                <li>
                    <input type="radio" name="fsex" value="w" id="woman"> 
                    <label for="woman">Woman</label> <br />
                </li>
			</ul>
		</div>
		<div class="radio_frame" id="email_box">
			<label for="femail">E-mail</label>
			<input type="text" name="femail" size="30" maxlength="30" id="femail"> <br /><br /><br />
		</div>
		<div id="btn_frame">
			<input type="submit" name="smt" class="first frmBtn" value="가입하기"> 
			<input type="reset" name="rst" class="last frmBtn" value="다시작성">
		</div>
	</form>
     <div class="blankFrame"></div>
	</div>
	
	<footer id="ft">
        <h3>All Copyrights by kim @2018</h3>
     </footer>
  <input type="checkbox" id="side_ck">
  <label for="side_ck" id="sideOpener"></label>
  <aside id="sidebar">
      <h2 class="sideTitle">사이트 바로가기</h2>
      <nav id="lnb">
          <ul>
              <li class="itemTitle">회사소개</li>
              <li><a href="sub1.html#page1">YG연혁</a></li>
              <li><a href="sub1.html#page2">음악적 성격</a></li>
              <li><a href="sub1.html#page3">소속 프로듀서</a></li>
              <li class="itemTitle">
                  <a href="sub2.html">소속사 연예인</a>
              </li>
              <li class="itemTitle">오시는 길</li>
              <li><a href="sub3.html#page1">본사</a></li>
              <li><a href="sub3.html#page2">강남지사</a></li>
              <li class="itemTitle">
                  <a href="./board/list.php">공지사항</a>
              </li>
          </ul>
      </nav>
      <div class="sidebarBanner">
          
      </div>
  </aside>
</body>
</html>