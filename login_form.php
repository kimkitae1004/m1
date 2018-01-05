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
<link rel="stylesheet" href="sub_common.css" />
<style>
	#form_wrap { width:80%; margin:40px auto; }
	#form_wrap label { display:block; width:100%; float:left; height:32px; margin-top:10px; 
		line-height:40px; color:#2b2b2b; font-weight:600; }
	#fuserid, #fpasswd { display:block; width:100%; float:left; height:40px; margin:10px auto; text-indent:10px; }
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
</style>
<link rel="stylesheet" href="sidebar.css" />
<style>
    #ft { clear:both; width:100%; height:100px;
     background:#3d3e43; color:#fff; line-height:100px; 
    position:fixed; bottom:0px; left:0; text-align:center; }
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
	<div id="form_wrap">
	<form name="login_form" action="login.php" method="post" onsubmit="return chk_logform();">
		<label for="fuserid">ID</label>
		<input type="text" name="fuserid" id="fuserid" size="19" title="아이디 입력" placeholder="아이디 입력"><br /><br />
		<label for="fpasswd">PW</label>
		<input type="password" name="fpasswd" id="fpasswd" size="20" title="패스워드 입력" placeholder="패스워드 입력 "><br /><br />
		<div id="btn_frame">
			<input type="submit" name="submit" value="login" class="first">
			<input type="reset" name="reset" value="Reset" class="last"><br /><br />
		</div>
	</form>
	</div>
	<footer id="ft">
        <h3 class="copyrights">All Copyrights by kim @2018</h3>
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