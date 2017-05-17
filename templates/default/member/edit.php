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
             <li><a href="member.php">欢迎页</a></li>
            <li style="border-left-width: 4px;border-left-style: solid;border-left-color: #35be9e;"><a style="color:#099759; margin-left:-4px" href="member.php?c=edit">用户信息设置</a></li>
            <li><a href="member.php?c=favorite">下载推荐</a></li>                     
                      </ul>
            </div>
      </div>
        </div>
    <!-- sideBar    end -->
    
    <div id="content" class=" has-top-image " style="float:left; padding-top:50px; padding-left:30px">

<form name="form" id="form" method="post" action="?a=saveedit" onSubmit="return cfm_upmember();">
旧密码<br>
<input name="oldpassword" type="password" id="oldpassword" style="border: 1px solid #35be9e; height:35px; width:300px; margin-bottom:10px" value="" size="40" /><br>
新密码<br>
<input name="password" type="password" id="password" style="border: 1px solid #35be9e; height:35px; width:300px; margin-bottom:10px" value="" size="40" /><br>
确认密码<br>
<input name="repassword" type="password" id="repassword" style="border: 1px solid #35be9e; height:35px; width:300px; margin-bottom:10px" value="" size="40" /><br>
电子邮箱<br>
<input type="text" name="email" id="email" style="border: 1px solid #35be9e; height:35px; width:300px; margin-bottom:10px" value="<?php echo $r_user['email']; ?>" size="40" /><br>
<input type="submit" class="btn" value="保 存" style="border: 1px solid #35be9e; height:35px; width:100px;"  />
<input type="button" class="btn" value="取 消" style="border: 1px solid #35be9e; height:35px; width:100px;" onClick="history.go(-1)"  /><br>
<input type="hidden" name="action" id="action" value="update" />
<input type="hidden" name="id" id="id" value="<?php echo $r_user['id']; ?>" />
</form>

		</div>
    </div>


 </div>
    </div>
<?php require('footer.php'); ?>