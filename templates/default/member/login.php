<?php if(!defined('IN_MEMBER')) exit('Request Error!'); ?>
<?php require_once('include/config.inc.php'); ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta content="telephone=no" name="format-detection" />
<meta content="email=no" name="format-detection" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<?php echo GetHeader(); ?>
<!-- Mobile Devices Support @end -->
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/member.js"></script>
<script type="text/javascript" src="js/jQuery.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/helpcss.css"/>
 <?php echo GetHeader(); ?>
<!--[if IE 7]>
            <link href="css/font_awesome_ie7.css" rel="stylesheet" />
        <![endif]-->
<style>
.mod-qiuser-pop dt {
	margin-left: 0;
	padding: 10px 0;
	color: #007AFF;
	font-size: 16px;
}
.login_header {
	line-height:100px;
	margin-bottom:30px;
}
</style>
</head>
<body id="login_bg">
<div class="login_wrapper">
  <div class="login_header"> <a href="index.php" target="_blank" style="color:#fff; font-size:30px;">资源下载平台登陆</a>
    <div id="cloud_s"><img src="http://wx.duduapp.net/tpl/Home/vifnn/common/vifnn/css/images/cloud_s.png" width="81" height="52" alt="cloud" /></div>
    <div id="cloud_m"><img src="http://wx.duduapp.net/tpl/Home/vifnn/common/vifnn/css/images/cloud_m.png" width="136" height="95"  alt="cloud" /></div>
  </div>
  
  <div class="login_box">
       <div class="loginForm">
	<?php
	if($d == md5('reg'))
	{
		echo '<div style="color:#CC0000">恭喜您，注册成功，请登录！</div><br>';
	}
	else if($d == md5('newpwd'))
	{
		echo '<div style="color:#CC0000">重设新密码成功！</div><br>';
	}
	?>
	</span>
	<form id="form" method="post" action="?a=login" onSubmit="return CheckLog();">
<input type="text" class="w_input" id="username" name="username" value="" tabindex="1" placeholder="请输入用户名" />
      <input type="password" class="w_input" id="password" name="password" tabindex="2" placeholder="请输入密码" />
   <input type="text" name="validate" id="validate" class="w_input" maxlength="4" placeholder="请输入验证码" />
						<span class="m_yzm"><img id="ckstr" src="data/captcha/ckstr.php" title="看不清？点击更换" align="absmiddle" style="cursor:pointer;" onClick="this.src=this.src+'?'" /> <a href="javascript:;" onClick="var v=document.getElementById('ckstr');v.src=v.src+'?';return false;">看不清?</a></span><br /><br />
	  <input type="submit" tabindex="4" class="submitLogin" value="立即登录" />
	  </form>
      <div style="color:#c35d00; line-height:46px; text-align:center;" id="error_box"> <span id="error_tips"></span> </div>      
    </div>
    <div class="login_right">
      <div>还没有平台帐号？</div>
      <a href="member.php?c=reg" class="registor_now thickbox">立即注册开通</a></div>
  </div>
  <div class="login_box_btm"></div>
</div>
<script type="text/javascript" src="js/core.min.js"></script>

    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        $('#submitLogin').click(function(){
            $('#error_box').hide();
            var userAgent = window.navigator.userAgent.toLowerCase();
            var ie6 = $.browser.msie && /msie 6\.0/i.test(userAgent);
            if (ie6)
            {
                alert('请不要使用ie6及以下等低版本浏览器');
                return false;
            }

            // 提交前检验
            if('' == $('#username').val()){
                $('#username').focus();
                $('#error_tips').text('请输入账号');
                $('#error_box').slideDown(400);
                setTimeout(function(){
                    $('#error_box').hide();
                }, 1000);
                return false;
            }

            $.post(window.location.href, {action:'chklogin',username:$('#username').val(), password:$('#password').val(), keepalive:$('#keepalive').attr('value')}, function(rs){
                $('#error_tips').text(rs.error);
                $('#error_box').slideDown(400);
                setTimeout(function(){
                    $('#error_box').hide();
                }, 1000);
                if(rs.errno == 200){
                    setTimeout(function(){
                        location.href = rs.url_route;
                    }, 600);
                }
            }, 'json');
        });
    });

    function changeCheckbox(){
        var new_value = (parseInt($('#keepalive').attr('value')) + 1) % 2;
        $('#keepalive').attr('value', new_value);
        if(1 == new_value){
            $('#keepalive').addClass('checked');
        }else{
            $('#keepalive').removeClass('checked');
        }
    }

    function bindEnterKey(event){
        if(13 == event.keyCode){
            $('#submitLogin').click();
        }
    }
</script>
</body>
</html>