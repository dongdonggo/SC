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
            <li><a href="member.php?c=edit">用户信息设置</a></li>
            <li style="border-left-width: 4px;border-left-style: solid;border-left-color: #35be9e;"><a href="member.php?c=favorite"  style="color:#099759; margin-left:-4px">下载推荐</a></li>                     
                      </ul>
            </div>
      </div>
        </div>
    <!-- sideBar    end -->
    
  <div id="content" class="" style="float:left;">
          <div class="contentMain" id="list_contentMain_again" style=" display:none">
                <h1 class="list_page_title"></h1>
              </div>
          <div class="contentMain" id="list_contentMain">
        <div class="content_tab">
              <div class="cb"></div>
              <div class="tab_content">
            <div class="allContent">
                                   
                                   <?php
			$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=1 OR parentstr LIKE '%,1,%') AND delstate='' AND is_hot=1 AND checkinfo=true ORDER BY orderid DESC";
			
		    $dopage->GetPage($sql,7);
				while($row = $dosql->GetArray())
				{
				$clid=$row['classid'];
			if($row['linkurl']=='' and $cfg_isreurl!='Y') $gourl = 'show.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y') $gourl = 'show-'.$row['classid'].'-'.$row['id'].'-1.html';
					else $gourl = $row['linkurl'];
			?>    
                              
                                  <ul class="text_list_ul fl">
                <li> <a href="<?php echo $gourl; ?>"><img src="<?php echo $row['picurl']; ?>" alt="<?php echo $row['title']; ?>" class="listUl_Img"></a> </li>
                <li>
                      <p class="listUl_title"> <a href="<?php echo $gourl; ?>">
                        <?php echo $row['title']; ?> </a> </p>
                    </li>
                <li class="border-bottom">
				<span><?php echo GetDateMk($row['posttime']); ?></span>
				 <span style="color:#CC0000; font-weight:bold; margin-left:5px">价格：￥<?php echo $row['author']; ?></span> <span style="color:#CC0000; font-weight:bold; margin-left:5px">下载权限：<?php if($row['is_hy']==-1 || $row['is_hy']==0){ ?>普通会员及上级会员<?php }elseif($row['is_hy']==1){ ?>初级会员及上级会员<?php }elseif($row['is_hy']==2){ ?>高级会员及上级会员<?php }elseif($row['is_hy']==3){ ?>终身会员<?php } ?></span></li>
                <li class="list_summary">
                      <p style="font-size:12px;" class="list_bottom_text">
                                      </p>
                    </li>
              </ul>
             <?php
			}
			?>      
                               
                                  </div>
          </div>
            </div>
      </div>
        </div>
  </div>
    </div>
<?php require('footer.php'); ?>