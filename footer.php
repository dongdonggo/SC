<div class="bottombar">
    <div class="footer column">
        <ul class="fl" id="footer_w">
		<?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=3");
		while($row = $dosql->GetArray())
		{
		?>
            <li><h1><?php echo $row['title1']; ?></h1></li>
            <li><?php echo $row['title2']; ?></li>
            <li><?php echo $row['title3']; ?></li>
			<?php
		}
		?>
            <li class="tel"><?php echo $cfg_hotline;?></li>
        </ul>
        <ul class="fl flast">
            <li><?php

		$dopage->GetPage("SELECT * FROM `pmw_imgtext` WHERE id=2");
		while($row = $dosql->GetArray())
		{
		?><img src="<?php echo $row['picurl']; ?>" alt="二维码图片"><?php
		}
		?></li>
        </ul>
    
        <hr/>
        <p><?php echo $cfg_copyright;?><a href="http://www.miitbeian.gov.cn/"><?php echo $cfg_icp;?></a></p>
    </div>
</div>
<div class="m_gaodu"></div>
<div class="m_mean"><a href="index.php" class="m_meanli m1">首页</a><?php echo GetNavm(); ?><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $cfg_qqcode; ?>&amp;menu=yes" class="m_meanli m1">客服</a></div>