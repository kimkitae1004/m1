<?php
	@include_once("../dbconfig.php");
	
	/* 페이징 시작 */
	//페이지 get 변수가 있다면 받아오고, 없다면 1페이지를 보여준다.
	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	
	/* 검색 시작 */
	
	if(isset($_GET['searchColumn'])) {
		$searchColumn = $_GET['searchColumn'];
		$subString .= '&amp;searchColumn=' . $searchColumn;
	}
	if(isset($_GET['searchText'])) {
		$searchText = $_GET['searchText'];
		$subString .= '&amp;searchText=' . $searchText;
	}
	
	if(isset($searchColumn) && isset($searchText)) {
		$searchSql = ' where ' . $searchColumn . ' like "%' . $searchText . '%"';
	} else {
		$searchSql = '';
	}
	
	/* 검색 끝 */
	
	$sql = 'select count(*) as cnt from board_free' . $searchSql;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	
	$allPost = $row['cnt']; //전체 게시글의 수
	
	if(empty($allPost)) {
		$emptyData = '<tr><td class="textCenter" colspan="5">글이 존재하지 않습니다.</td></tr>';
	} else {

		$onePage = 15; // 한 페이지에 보여줄 게시글의 수.
		$allPage = ceil($allPost / $onePage); //전체 페이지의 수
		
		if($page < 1 && $page > $allPage) {
?>
			<script>
				alert("존재하지 않는 페이지입니다.");
				history.back();
			</script>
<?php
			exit;
		}
	
		$oneSection = 10; //한번에 보여줄 총 페이지 개수(1 ~ 10, 11 ~ 20 ...)
		$currentSection = ceil($page / $oneSection); //현재 섹션
		$allSection = ceil($allPage / $oneSection); //전체 섹션의 수
		
		$firstPage = ($currentSection * $oneSection) - ($oneSection - 1); //현재 섹션의 처음 페이지
		
		if($currentSection == $allSection) {
			$lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.
		} else {
			$lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지
		}
		
		$prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.
		$nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.
		
		$paging = '<ul>'; // 페이징을 저장할 변수
		
		//첫 페이지가 아니라면 처음 버튼을 생성
		if($page != 1) { 
			$paging .= '<li class="page page_start"><a href="./index.php?page=1' . $subString . '">처음</a></li>';
		}
		//첫 섹션이 아니라면 이전 버튼을 생성
		if($currentSection != 1) { 
			$paging .= '<li class="page page_prev"><a href="./index.php?page=' . $prevPage . $subString . '">이전</a></li>';
		}
		
		for($i = $firstPage; $i <= $lastPage; $i++) {
			if($i == $page) {
				$paging .= '<li class="page current">' . $i . '</li>';
			} else {
				$paging .= '<li class="page"><a href="./index.php?page=' . $i . $subString . '">' . $i . '</a></li>';
			}
		}
		
		//마지막 섹션이 아니라면 다음 버튼을 생성
		if($currentSection != $allSection) { 
			$paging .= '<li class="page page_next"><a href="./index.php?page=' . $nextPage . $subString . '">다음</a></li>';
		}
		
		//마지막 페이지가 아니라면 끝 버튼을 생성
		if($page != $allPage) { 
			$paging .= '<li class="page page_end"><a href="./index.php?page=' . $allPage . $subString . '">끝</a></li>';
		}
		$paging .= '</ul>';
		
		/* 페이징 끝 */
		
		
		$currentLimit = ($onePage * $page) - $onePage; //몇 번째의 글부터 가져오는지
		$sqlLimit = ' limit ' . $currentLimit . ', ' . $onePage; //limit sql 구문
		
		$sql = 'select * from board_free' . $searchSql . ' order by b_no desc' . $sqlLimit; //원하는 개수만큼 가져온다. (0번째부터 20번째까지
		$result = $db->query($sql);
	}
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
	.paging ul { list-style:none; }
	.paging li { float:left; padding-right:10px; }
	</style>
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
    #bbsTable th, #bbsTable th, #bbsTable tr, #bbsTable thead, #bbsTable tfoot, #bbsTable tbody { margin:0; padding:0; }
    #bbsTable { width:100%; margin:10px auto; }
    #bbsTable thead { height:42px; }
    #bbsTable thead tr { height:42px; }
    #bbsTable tbody tr { height:32px; }
    #bbsTable th { height:42px; background:#3d3e43; color:#fff;
        font-size:0.85em; }
    #bbsTable td { height:32px; border-bottom:1px dashed #333; 
    font-size:0.8em; }
    #bbsTable .no {width:10%; text-align:center}
    #bbsTable .bbs_title {width:35%; text-indent:5px; 
    text-overflow:ellipsis; overflow:hidden; white-space:nowrap;}
    #bbsTable .bbs_title a { color:#333; }
    #bbsTable .author { width:17%;text-align:center}
    #bbsTable .date { width:20%; text-align:center}
    #bbsTable .hit { width:17%; text-align:center}
    #bbsArticle .btn { display:block; border-radius:20px;
     height:32px; font-size:0.8em; width:100px; text-align:center; 
    line-height:32px; margin:10px;    }
    #bbsArticle .btnWrite { background:#3d3e43; color:#fff; }
    #bbsArticle .paging { clear:both; height:40px; line-height: 40px; padding-left:20px; }
    #bbsArticle .paging li { padding:5px; float:left; 
    font-size:0.8em; }
    #bbsArticle .paging li.current { background:#3d3e43; color:#fff; }
    #bbsArticle .paging a { display:block; color:#333; background:#fff; font-size:0.8em; }
    #bbsArticle .searchBox { clear:both; margin-top:15px; 
    width:90%; margin:30px auto;}
    #bbsArticle .searchBox select, #bbsArticle .searchBox input { display:block; width:25%;
    height:32px; color:#333; outline:0; border:1px solid #333; 
    font-size:0.8em; float:left; margin-right: 2%; }
    #bbsArticle .searchBox input { width:45%;  }
    #bbsArticle .searchBox button { display:block; border-radius:20px; border:0px; outline:0; 
     height:32px; font-size:0.8em; width:20%; text-align:center; 
    line-height:32px;  background:#3d3e43; color:#fff; }
    .blankBox { width:100%; height:150px;}
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
	<article id="bbsArticle">
		<h3 class="pageTitle">공지사항</h3>
		<div id="boardList">
			<table id="bbsTable">
				<caption class="readHide"></caption>
				<thead>
					<tr>
						<th scope="col" class="no">번호</th>
						<th scope="col" class="bbs_title">제목</th>
						<th scope="col" class="author">작성자</th>
						<th scope="col" class="date">작성일</th>
						<th scope="col" class="hit">조회</th>
					</tr>
				</thead>
				<tbody>
						<?php
						if(isset($emptyData)) {
							echo $emptyData;
						} else {
							while($row = $result->fetch_assoc())
							{
								$datetime = explode(' ', $row['b_date']);
								$date = $datetime[0];
								$time = $datetime[1];
								if($date == Date('Y-m-d'))
									$row['b_date'] = $time;
								else
									$row['b_date'] = $date;
						?>
						<tr>
							<td class="no"><?php echo $row['b_no']?></td>
							<td class="bbs_title">
								<a href="./view.php?bno=<?php echo $row['b_no']?>"><?php echo $row['b_title']?></a>
							</td>
							<td class="author"><?php echo $row['b_id']?></td>
							<td class="date"><?php echo $row['b_date']?></td>
							<td class="hit"><?php echo $row['b_hit']?></td>
						</tr>
						<?php
							}
						}
						?>
				</tbody>
			</table>
			<div class="btnSet">
				<a href="./write.php" class="btnWrite btn">글쓰기</a>
			</div>
			<div class="paging">
				<?php echo $paging ?>
			</div>
			<div class="searchBox">
				<form action="./list.php" method="get">
					<select name="searchColumn">
						<option <?php echo $searchColumn=='b_title'?'selected="selected"':null?> value="b_title">제목</option>
						<option <?php echo $searchColumn=='b_content'?'selected="selected"':null?> value="b_content">내용</option>
						<option <?php echo $searchColumn=='b_id'?'selected="selected"':null?> value="b_id">작성자</option>
					</select>
					<input type="text" name="searchText" value="<?php echo isset($searchText)?$searchText:null?>">
					<button type="submit">검색</button>
				</form>
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