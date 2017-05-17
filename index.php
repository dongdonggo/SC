<?php require_once(dirname(__FILE__).'/include/config.inc.php'); 
$cid = empty($cid) ? 0 : intval($cid);
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
.m_mean .m1{color: #35be9e;}
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
          <div class="sideBar_Menu1">
<div class="sideBar_Menu1">
        <div class="ulMenu">
              <ul>
            <li <?php if($cid==0){ ?>class="m_leftli"<?php }?>><a href="index.php" <?php if($cid==0){ ?>style="color:#099759; margin-left:-4px"<?php }?>>全部资源</a></li>
			<?php 
	$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=1 ORDER BY orderid ASC");
	while($row = $dosql->GetArray())
	{
	    $id=$row['id'];
		$classname = $row['classname'];
			 ?>
            <li <?php if($cid==$id){ ?>class="m_leftli"<?php }?>><a <?php if($cid==$id){ ?>style="color:#099759; margin-left:-4px"<?php }?> href="index.php?cid=<?php echo $row['id']?>"><?php echo  $classname?></a></li>
            <?php } ?>           
                      </ul>
            </div>
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
			if($cid==0){
			$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=1 OR parentstr LIKE '%,1,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
			}else{
			$sql = "SELECT * FROM `#@__infoimg` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC";
			}
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
<link rel="stylesheet" type="text/css" href="css/ie8online.css">
<?php require('footer.php'); ?>