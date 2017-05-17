<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 1 : intval($cid);
$id  = empty($id)  ? 0 : intval($id);

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta content="telephone=no" name="format-detection" />
<meta content="email=no" name="format-detection" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<?php echo GetHeader(1,$cid,$id); ?>
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
   <div class="m_leftmyc" style="float: left; position: fixed; top: 106px;"> 
      
      <div class="sideBar_Menu1">
        <div class="ulMenu">
          <ul>
            <li><a href="index.php">资源下载</a></li>
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
    <?php

			//检测文档正确性
			$r = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=$id");
			if(@$r)
			{
			//增加一次点击量
			$dosql->ExecNoneQuery("UPDATE `#@__infoimg` SET hits=hits+1 WHERE id=$id");
			$row = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=$id");
			?>
   <div id="content" class=" has-top-image " style="float:left;">
      <h1 class="content_title"><?php echo $row['title']; ?></h1>
	  <h1 class="content_title"><span style="color:#35be9e">价格：<?php echo $row['author']; ?> </span><span style="color:#CC0000; margin-left:10px">下载权限：<?php if($row['is_hy']==-1 || $row['is_hy']==0){ ?>普通会员及上级会员<?php }elseif($row['is_hy']==1){ ?>初级会员及上级会员<?php }elseif($row['is_hy']==2){ ?>高级会员及上级会员<?php }elseif($row['is_hy']==3){ ?>终身会员<?php } ?></span></h1>
	  <h1 class="content_title">资源下载链接: 【<?php if(!empty($c_uname)){?>
			<?php if($r_user['is_hy']>=$row['is_hy']){ ?>
			<?php if(!empty($row['description'])) ?><?php echo $row['source']; ?><?php }else{ ?>
			对不起，系统检测到您权限不够，不能下载该资源，请升级会员等级<?php }}else{?>请先登录，成为平台会员，<a href="member.php" style="color:#35be9e">点击这里登录</a><?php } ?>】</h1>
			<h1 class="content_title"><a href="<?php echo $row['taobaolj']; ?>">点击这里进入官方购买链接</a></h1>
			
      <div class="webOrDate">
      
      </div>
      <div class="contentMain padding_bottom_P">
        <div class="cb"></div>
     <?php
				if($row['content'] != '')
					echo GetContPage($row['content']);
				else
					echo '网站资料更新中...';
				?>
				<p> <?php
	
				//获取上一篇信息
				$r = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE classid=".$row['classid']." AND orderid<".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid DESC");
				if($r < 1)
				{
					echo '上一篇：已经没有了&nbsp;&nbsp;&nbsp;&nbsp;';
				}
				else
				{
					if($cfg_isreurl != 'Y')
						$gourl = 'show.php?cid='.$r['classid'].'&id='.$r['id'];
					else
						$gourl = 'show-'.$r['classid'].'-'.$r['id'].'-1.html';

					echo '上一篇：<a style=" color:#333333" href="'.$gourl.'">'.$r['title'].'</a>&nbsp;&nbsp;&nbsp;&nbsp;';
				}

				//获取下一篇信息
				$r = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE classid=".$row['classid']." AND orderid>".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid ASC");
				if($r < 1)
				{
					echo '下一篇：已经没有了';
				}
				else
				{
					if($cfg_isreurl != 'Y')
						$gourl = 'show.php?cid='.$r['classid'].'&id='.$r['id'];
					else
						$gourl = 'show-'.$r['classid'].'-'.$r['id'].'-1.html';

					echo '下一篇：<a style=" color:#333333" href="'.$gourl.'">'.$r['title'].'</a>';
				}
				?></p>
      </div>
	  	<?php
			}
			?> 
</div>
<?php require('footer.php'); ?>