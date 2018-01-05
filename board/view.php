<?php
	require_once("../dbconfig.php");
	$bNo = $_GET['bno'];

	session_start();
	$fuserid = $_SESSION['ses_userid'];
	$fpasswd = $_SESSION['ses_pass'];

	if(!empty($bNo) && empty($_COOKIE['board_free_' . $bNo])) {
		$sql = 'update board_free set b_hit = b_hit + 1 where b_no = ' . $bNo;
		$result = $db->query($sql); 
		if(empty($result)) {
			?>
			<script>
				alert('오류가 발생했습니다.');
				history.back();
			</script>
			<?php 
		} else {
			setcookie('board_free_' . $bNo, TRUE, time() + (60 * 60 * 24), '/');
		}
	}
	
	$sql = 'select b_title, b_content, b_date, b_hit, b_id from board_free where b_no = ' . $bNo;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
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
	<link rel="stylesheet" href="./css/normalize.css" />
	<link rel="stylesheet" href="./css/board.css" />
	<style>
            /* sub2.html의 sub_common.css에서 가져옴 */
@charset "utf-8";
* { margin: 0; padding:0; }
body, html { width: 100%; height:100%; background:#f4eddd; overflow-x: hidden; }
a { text-decoration:none; }
img { border:0; }
ul { list-style:none; }
p { line-height:1.3; padding:10px; }
h2 { text-align:center; line-height:1.6; }
.wrap { clear:both; width:100%; }
#hd { clear:both; width:100%; }
.hdbar { width:100%; height:100px; background:#3d3e43; position:relative; }
.home, .collap { position:absolute; width:62px; height: 36px; z-index:10; display:block; background-image:url("../src/split2.png"); top:32px; 
text-indent:-9999px; }
.home { left:10px; background-position:0px 0px; }
.collap { right:10px; background-position:-62px 0px;  }
.title { color:#fff; text-shadow:2px 2px 2px #333; 
text-align:center; line-height: 100px; }
.colItem { width: 100%; height:42px;  
background: #545d7b; /* Old browsers */
background: -moz-linear-gradient(top, #545d7b 0%, #363b49 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, #545d7b 0%,#363b49 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, #545d7b 0%,#363b49 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#545d7b', endColorstr='#363b49',GradientType=0 ); /* IE6-9 */
}
.colItem li { width:25%;  height:40px; line-height: 40px; float:left; }
.colItem li a { display:block; text-align:center; line-height: 40px; font-size:0.7em; color:#fff;
font-weight:bold; 
background: #545d7b; /* Old browsers */
background: -moz-linear-gradient(top, #545d7b 0%, #363b49 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, #545d7b 0%,#363b49 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, #545d7b 0%,#363b49 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#545d7b', endColorstr='#363b49',GradientType=0 ); /* IE6-9 */ 
    border-left:1px solid #68686a;  border-right:1px solid #121315; 
    border-top:1px solid #68686a;  border-bottom:1px solid #121315; 
}
#collapMenu { height:40px; border-bottom:1px solid #333; 
display:none;         }
#collapMenu a { color:#3d3e43; background:#f4eddd; }

#collap_ck { display:none; }
#collap_ck:checked ~ #collapMenu { display:block; }
    </style>
    <style>
        /* sub2.html의 sidebar.css 파일을 내용을 가져옴 */
@charset "utf-8";
#sideOpener { display:block; width:32px; height:32px;
    background-image:url("../src/aside_btn1.png");
border-radius:19px; border:3px solid #ee7950; 
position:fixed; bottom:100px; right:50px; 
background-color:#fff; }
#side_ck { display:none; }
#side_ck:checked ~ #sideOpener { background-position:0px -32px; }
#side_ck:checked ~ #sidebar { left:0px; }
#sidebar { position:fixed; z-index:99; left:-100%;
top:0; width:65%; height:100%; background-color:#f5b69f; /* #f9be38;  */
box-shadow:5px 0px 10px #000; transition:1s; }
.sideTitle { font-size:1.1em; color:#d44310; line-height: 58px; border-bottom:1px solid #f28e0c; 
text-shadow:-1px -1px 1px #666; }
#lnb li a { display:block; line-height:48px; font-size:0.8em; text-indent:30px; color:#333; 
color:#ee7950; font-weight:bold; /* border-bottom:1px solid #e8bb08; */ }

#lnb .itemTitle, #lnb .itemTitle a { font-weight:bold; font-size:0.85em; text-indent:15px; color:#e74c16; line-height:60px; } 
#lnb .itemTitle { border-top:1px solid #f4d1c4; 
border-bottom:1px solid #ca8871; text-shadow:0px 0px 0.5px #fff; }
#lnb .itemTitle a { border-bottom:0px; }
    </style>
<style>
    #ft { clear:both; width:100%; height:100px;
     background:#3d3e43; color:#fff; line-height:100px; 
    position:fixed; bottom:0px; left:0; text-align:center; }
</style>
<style>
    .pageTitle { text-indent:2%; line-height:60px; }
    #boardView { border-top:2px solid #333;}
    #bbsTable th, #bbsTable th, #bbsTable tr, #bbsTable thead, #bbsTable tfoot, #bbsTable tbody { margin:0; padding:0; }
    #bbsTable { width:95%; margin:10px auto; }
    #boardTitle { font-size:1em; text-indent:10px; line-height: 32px;}
    #boardInfo { clear:both; margin-top:20px; padding: 10px; }
    .bbsLabel { clear:both; display:block; width:30%; line-height:40px; 
    font-weight:bold; font-size:0.85em; float:left; }
    .bbsCon { display:block; line-height:40px; width:65%;
    font-size:0.8em; line-height:32px; float:left; }
    #boardContent { clear:both; padding: 10px; font-size:0.8em;
    line-height: 24px; border-bottom:2px solid #333; }
    #boardArticle .btnSet { clear:both; margin-top:15px;}
    #boardArticle .btnSet a { display:block; border-radius:20px; border:0px; outline:0; 
     height:32px; font-size:0.8em; width:20%; text-align:center; 
    line-height:32px;  background:#3d3e43; color:#fff; margin-left:2%; }
    .blankBox { width:100%; height:180px;}
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
                <li><a href="../login_form.php">로그인</a></li>
                <li><a href="../add_form.php">회원가입</a></li>
                <li><a href="mailto:kkt09072@naver.com">이메일</a></li>
                <li><a href="tel:010-3403-4190">전화</a></li>
            </ul>
        </nav>
        <nav id="gnb" class="colItem">
            <ul>
                <li><a href="../sub1.html">회사소개</a></li>
                <li><a href="../sub2.html">소속 연예인</a></li>
                <li><a href="../sub3.html">오시는길</a></li>
                <li><a href="list.php">공지사항</a></li>
            </ul>
        </nav>
     </header>
	<article id="boardArticle">
		<h3 class="pageTitle">공지사항 보기</h3>
		<div id="boardView">
			<h3 id="boardTitle"><?php echo $row['b_title']?></h3>
			<div id="boardInfo">
                <span id="boardID" class="bbsLabel">작성자 </span><span class="bbsCon"> <?php echo $row['b_id']?></span>
				<span id="boardDate" class="bbsLabel">작성일 </span><span class="bbsCon"> <?php echo $row['b_date']?></span>
				<span id="boardHit" class="bbsLabel">조회</span><span class="bbsCon">  <?php echo $row['b_hit']?></span>
			</div>
			<h4 style="clear:both;padding-top:15px; text-indent:10px;">글 내용</h4>
			<div id="boardContent"><?php echo $row['b_content']?></div>
			<div class="btnSet">
				<? if($fuserid == 'admin') {	?>
					<a href="./write.php?bno=<?php echo $bNo?>">수정</a>
					<a href="./delete.php?bno=<?php echo $bNo?>">삭제</a>
				<? } ?>
				<a href="./list.php">목록</a>
			</div>
		</div>
	</article>
    <div class="blankBox"></div>
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
              <li><a href="../sub1.html#page1">YG연혁</a></li>
              <li><a href="../sub1.html#page2">음악적 성격</a></li>
              <li><a href="../sub1.html#page3">소속 프로듀서</a></li>
              <li class="itemTitle">
                  <a href="../sub2.html">소속사 연예인</a>
              </li>
              <li class="itemTitle">오시는 길</li>
              <li><a href="../sub3.html#page1">본사</a></li>
              <li><a href="../sub3.html#page2">강남지사</a></li>
              <li class="itemTitle">
                  <a href="list.php">공지사항</a>
              </li>
          </ul>
      </nav>
      <div class="sidebarBanner">
          
      </div>
  </aside>
</body>
</html>