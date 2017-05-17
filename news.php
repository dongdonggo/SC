<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 2 : intval($cid);
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta content="telephone=no" name="format-detection" />
<meta content="email=no" name="format-detection" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<?php echo GetHeader(1,$cid); ?>
<link href="/logo.ico" rel="Shortcut Icon">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/helper.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/cont.css">
<script src="js/jquery-1.8.0.min.js"></script><link rel="stylesheet" type="text/css" href="css/helpcss.css"/>
<script type="text/javascript" src="js/global.js"></script>
<style type="text/css">
#n0 {
display:block;
}
.doc_nav li ul li a.h {
color:#f00;
}
body { background: url(img/bg-h.jpg) fixed #068a70; }
.header-con-2 .header .navv li .active5 {
    color: #35be9e;
    border-top: 4px solid #35be9e;
	-webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.m_mean .m5{color: #35be9e;}
.pro_up { position: relative; }
.pro_up>h4 { margin-left: 45px; display: inline-block; position: relative; font-size: 24px; padding: 5px 30px 5px 15px; ; color: #fff; background: #CCC; cursor: pointer; border-radius: 3px; margin-bottom: 7px; }
.pro_up>h4:before { position: absolute; content: ''; display: block; left: 50%; margin-left: -10px; bottom: -17px; border: 10px solid #ccc; border-color: #ccc transparent transparent transparent; }
.pro_up>h4:after { position: absolute; content: ''; display: block; right: 10px; top: 50%; border: 6px solid #ccc; border-color: transparent transparent #fff transparent; margin-top: -7px; }
.pro_up>h4.expend:after { border-color: #fff transparent transparent transparent; margin-top: 0px; }
.pro_up>h4:hover, .pro_up>h4.expend { background: #1599DD; }
.pro_up>h4:hover:before, .pro_up>h4.expend:before { border: 10px solid #1599DD; border-color: #1599DD transparent transparent transparent; }
.pro_up>ul>li { position: relative; padding: 20px 0; overflow: hidden; }
.pro_up>ul>li:before { border-left: 2px solid #ddd; content: ""; display: block; position: absolute; left: 93px; height: 100%; top: 0; }
.pro_up>ul>li:after, .pro_up:after { content: ''; display: block; background: #1599DD; width: 10px; height: 10px; border-radius: 50%; position: absolute; top: 29px; left: 89px; }
.pro_up:after { bottom: -10px; top: auto; }
.pro_up>ul>li>span { color: #666; line-height: 30px; width: 80px; display: inline-block; text-align: right; float: left; font-size:13px}
.pro_up>ul>li>ol { margin-left: 80px; background: #eaeaea; float: left; position: relative; padding: 0 10px 10px; top: 13px; max-width: 600px; border-radius: 10px; counter-reset: li; }
.pro_up>ul>li>ol:before { position: absolute; content: ''; display: block; left: -15px; top: 0; border: 10px solid #ccc; border-color: #eaeaea #eaeaea transparent transparent; }
.pro_up>ul>li>ol>li { position: relative; }
.pro_up>ul>li>ol.shownum>li:before { content: counter(li)'.'; counter-increment: li; display: block; float: left; padding-right: 5px; }
.pro_up>ul>li>ol>li>h5, .pro_up>ul>li>ol.shownum>li:before { line-height: 48px; color: #333; font-size: 16px; cursor: pointer; white-space: nowrap; }
.pro_up>ul>li>ol>li>h5>a { float: right; color: #429BD6; font-size: 12px; padding-left: 25px; }
.pro_up>ul>li>ol>li>h5>a.expend:hover { color: #429BD6; }
.pro_up>ul>li>ol>li>h5>a.expend { color: #9A9A9A; }
.pro_up>ul>li>ol>li>div { background: #f4f4f4; padding: 10px; display: none; color: #333 }
</style>
<script type="text/javascript">
$(function(){
	$('.text_list_ul:odd').addClass('even');	
	$('.text_list_ul:even').addClass('odd');	
});
</script>
<script type="text/javascript">
$(function(){

  // 点击年份出现更新日志
	$('.pro_up>h4').on('click',function(){
		var line = $(this).next();
		var display = line.css('display');
		$(this).toggleClass("expend");
		if(display == 'none'){
			line.slideDown();
		}else{
			line.slideUp();
		}
	});
	$('.pro_up>ul>li>ol>li>h5').click(function(){
		$(this).next().toggle();
		$(this).children('a').toggleClass('expend');
	});
	$('.pro_up>ul>li:first>ol>li>h5').click();
	$('.pro_up>ul>li>ol>li>h5');
	$('.pro_up>ul>li>ol').each(function(i,n){
		if($(n).children('li').length>1){
			$(this).addClass('shownum');
		}
	});
})
</script>

</head>
<body>
<!-- header-->
<?php require('header.php'); ?>
<!-- /header-->
<div id="wrap" class="function_introduction_style">
      <div id="main">
   <div class="m_leftmyc" style="float: left; position: fixed; top: 106px;"> 
      
      <div class="sideBar_Menu1">
        <div class="ulMenu">
          <ul>
            <li><a href="index.php">会员手册</a></li>
          </ul>
        </div>
      </div>
      <div class="sideBar_Menu2" style="text-align:center; height:auto"> <?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=2");
		while($row = $dosql->GetArray())
		{
		?><img src="<?php echo $row['picurl']; ?>" alt="二维码图片"><?php
		}
		?> </div>
    </div>
    <!-- sideBar    end -->
<div id="content" class="" style="float:left;">
          <div class="contentMain" id="list_contentMain">
        <div class="content_tab">
             
              <div class="tab_content">
            <div class="allContent">
                                    <div class="pro_up">
                <h4>
                      2015                    </h4>
                <ul>
				
                            <?php

				$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC",8);
				while($row = $dosql->GetArray())
				{
					if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];

					$row2 = $dosql->GetOne("SELECT `classname` FROM `#@__infoclass` WHERE `id`=".$row['classid']);
					if($cfg_isreurl!='Y') $gourl2 = 'news.php?cid='.$row['classid'];
					else $gourl2 = 'news-'.$row['classid'].'-1.html';
				?>
										  
										  <li><span>
                        <?php echo GetDateTime($row['posttime']); ?> </span>
                    <ol class="shownum">
                                                    <li>
                        <h5><a href="javascript:;">[展开/收起]</a>
                              <?php echo $row['title']; ?>                        </h5>
                        <div>
                             <?php
				if($row['content'] != '')
					echo GetContPage($row['content']);
				else
					echo '网站资料更新中...';
				?>                         </div>
                      </li>      </ol>
					  
				<?php
				}
				?>					  
												  
                     
                                          </li></ul>
              </div>
                                  </div>
          </div>
            </div>
      </div>
      </div>
    </div>
<link rel="stylesheet" type="text/css" href="css/ie8online.css">
<?php require('footer.php'); ?>