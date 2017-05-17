<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta content="telephone=no" name="format-detection" />
<meta content="email=no" name="format-detection" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
 <?php echo GetHeader(); ?>
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
.header-con-2 .header .navv li .active3 {
    color: #35be9e;
    border-top: 4px solid #35be9e;
	-webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.m_mean .m3{color: #35be9e;}
</style>
    <script type="text/javascript">
$(function(){
	$('.text_list_ul:odd').addClass('even');	
	$('.text_list_ul:even').addClass('odd');	
});
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
            <li><a href="#">扫描下面二维码下载更多资源</a></li>
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
<div id="content" class=" has-top-image " style="float:left;">
<?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=4");
		while($row = $dosql->GetArray())
		{
		?>
      <div style="text-align:center" class="content_top_img"> <img src="<?php echo $row['picurl']; ?>" class="top_imgage" alt="如何成为我们的小伙伴？Book"> </div>
      <h1 class="content_title">
        <?php echo $row['content']; ?></h1>
      <div class="webOrDate">
      </div>
	  <?php
		}
		?>
      <div class="contentMain padding_bottom_P">
        <div class="cb"></div>
		<?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=5");
		while($row = $dosql->GetArray())
		{
		?>
        <p style="color:#CC0000"><?php echo $row['title1']; ?></p>
		<p style="color:#CC0000"><?php echo $row['title2']; ?></p>
		<div class="webOrDate">
      </div>
	  <p>会员等级说明：</p>
     <?php echo $row['content']; ?>
	  	  <?php
		}
		?>
      </div></div>
    </div>
<link rel="stylesheet" type="text/css" href="css/ie8online.css">
<?php require('footer.php'); ?>