<?php 
//初始登录信息
if(!empty($_COOKIE['username']) &&
   !empty($_COOKIE['lastlogintime']) &&
   !empty($_COOKIE['lastloginip']))
{
	$c_uname     = AuthCode($_COOKIE['username']);
	$c_logintime = AuthCode($_COOKIE['lastlogintime']);
	$c_loginip   = AuthCode($_COOKIE['lastloginip']);
}
else
{
	$c_uname     = '';
	$c_logintime = '';
	$c_loginip   = '';
}
//获取用户信息
$r_user = $dosql->GetOne("SELECT * FROM `#@__member` WHERE username='$c_uname'");
?>
<style>
@media (min-width:600px){
.m_leftli{border-left-width: 4px;border-left-style: solid;border-left-color: #35be9e;}
}
@media (max-width:1200px){
.header-con-2 .header {
    width:100%;
    height: 85px;
    margin: 0 auto;
	-webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.header-con-2 .header .navv {
display:none;
}
}
@media (max-width:600px){
#wrap{ width:100%}
#main{width:100%}
.m_hyzx{ width:100%; text-align:center; float:left}
.header-con-2 .header a.loginn{ margin-right:12%; width:30%;}
.header-con-2 .header a.register{ margin-right:12%; width:30%}
.m_logo{ width:100%; float:left; text-align:center}
.m_leftm{float: left; position:relative; top:0; width:100%;}
.ulMenu ul li{ width:33%; float:left;}
.ulMenu ul li a{ font-size:13px; margin:0; padding:0; text-align:center}
.sideBar_Menu1{ width:100%; float:left}
#content{
 width:100%;
 position:static;
 float:left
}
.text_list_ul li{ width:100%; text-align:center}
.text_list_ul fl odd{ width:100%}

#list_contentMain{ width:100%; float:left}
.text_list_ul{ width:100%; float:left}
ul.even{ margin-left:0px}
border-bottom{ width:100%; float:}

.column{ width:100%}
.bottombar .footer ul{ width:100%; border-right:none}
.bottombar .footer ul.flast{ text-align:center; width:100%}
#footer_w{width:100%}
.m_gaodu{ height:50px; width:100%; float:left}
.m_mean{  position:fixed; bottom:0;height:50px; background-color:#000000; float:left; width:100%;z-index:9999; color:#FFFFFF; font-weight:bold; display:block; margin-top:50px}
.m_leftmyc{ display:none}
.content_top_img{ width:100%}
.top_imgage{ width:100%; padding:0}
.top_imgage img{ width:100%}
.content_top_img img{ width:100%}
.has-top-image { width:100%}
.has-top-image h1.content_title{width:100%}
.contentMain{ width:100%;}
.contentMain p{ width:100%}
.contentMain img{ width:100%}
.webOrDate{ width:100%}
.loginForm{ width:100%}
.login_right{ width:100%}
.m_yzm{ width:100%; float:left; margin-bottom:15px}
.login_right{ width:100%}

}
</style>
<div class="header-con-2">
    <div class="header clx">
       <span class="m_logo"> <a href="index.php" class="logo"><?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=1");
		while($row = $dosql->GetArray())
		{
		?><img src="<?php echo $row['picurl']; ?>" alt="logo图片" style="margin-top:20px"><?php
		}
		?></a>
		</span>
		<span class="m_hyzx">
		<?php if(!empty($c_uname)){?>
		 <a href="member.php" class="register aclear pull-right">会员中心</a>
        <a href="member.php?a=logout" class="loginn aclear pull-right h-animate">注销</a>
		<?php }else{?>
        <a href="member.php?c=reg" class="register aclear pull-right">注册</a>
        <a href="member.php?c=login" class="loginn aclear pull-right h-animate">登录</a>
		<?php }?>
		</span>
        <div class="navv c-ul pull-right">
            <ul>
                <li><a href="index.php" class="h-animate aclear active1">首页</a></li>
			    <?php echo GetNav(); ?>
	            <li><a class="h-animate aclear" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $cfg_qqcode; ?>&amp;menu=yes">在线客服</a></li>
            </ul>
        </div>
    </div>
</div>