<?php if(!defined('IN_MEMBER')) exit('Request Error!'); ?>
<?php require_once('include/config.inc.php'); 
//获取用户信息
$r_user = $dosql->GetOne("SELECT * FROM `#@__member` WHERE username='$c_uname'");

//当记录出现错误，强制跳转登录页
if(!isset($r_user) or !is_array($r_user))
	header('location:?c=login');
?>
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
<script src="js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/helpcss.css"/>
<script type="text/javascript" src="js/global.js"></script>
<style type="text/css">
#n0 {
display:block;
}
.doc_nav li ul li a.h {
color:#f00;
}
body { background: url(img/bg-h.jpg) fixed #068a70; }
.header-con-2 .header .navv li .active1 {
    color: #35be9e;
    border-top: 4px solid #35be9e;
	-webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
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
    <div class="m_leftm"> 
          <div class="sideBar_Menu1" style="text-align:center; height:auto"> <img src="data/avatar/index.php?uid=<?php echo $r_user['id']; ?>&size=middle" ><br><a href="?c=avatar">【点击这里修改头像】</a> </div>
          <div class="sideBar_Menu1" style="margin-top:15px">
        <div class="ulMenu">
              <ul>
             <li style="border-left-width: 4px;border-left-style: solid;border-left-color: #35be9e;"><a href="member.php" style="color:#099759; margin-left:-4px">欢迎页</a></li>
            <li><a href="member.php?c=edit">用户信息设置</a></li>
            <li><a href="member.php?c=favorite">下载推荐</a></li>                     
                      </ul>
            </div>
      </div>
        </div>
    <!-- sideBar    end -->
    
    <div id="content" class=" has-top-image " style="float:left;">
      <div style="text-align:center" class="content_top_img"> <div id="fes-vendor-dashboard">
	<div id="fes-vendor-announcements">
		<iframe src="data/avatar/upload.php?uid=<?php echo urlencode(AuthCode($r_user['id'],'ENCODE')); ?>" width="458" height="268" frameborder="0" scrolling="no"></iframe>
			<div>头像上传成功后，点击完成或刷新页面(可按F5键)，才能查看最新的头像效果</div></div>

	<div class="fes-comments-wrap">
		
	</div>
</div> </div>
		</div>
    </div>


 </div>
    </div>
<?php require('footer.php'); ?>