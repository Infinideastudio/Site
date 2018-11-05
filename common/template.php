<?php

namespace Common {
	function loadHeader($pageTitle = "新创无际 INFINIDEAS", $title = "新创无际 INFINIDEAS", $extHead = "") {
        echo '
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
            <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
            <link rel="stylesheet" type="text/css" href="/common/css/styles_new.css" />
            <meta charset="UTF-8" />
            <meta name="author" content="qiaozhanrong" />
            <meta name="keywords" content="Infinideas,新创无际" />
            <meta name="description" content="INFINIDEAS" />
            <link rel="shortcut icon" type="image/ico" href="favicon.ico"/>
            <title>' . $pageTitle . '</title>
            <script type="text/javascript" src="/common/js/ajax.js"></script>
			<script type="text/javascript" src="/common/js/functions.js"></script>
			<script type="text/javascript">
				function navi_menu_click(){
					var navi=document.getElementById("navi_container");
					var width=navi.style.width;
					if(width.indexOf("80%")==-1){
						navi.style.width="80%";
						window.ontouchmove=function(e){
							var touch=e.changedTouches[0];
							touchX=touch.screenX;
							touchY=touch.screenY;
							if(navi.contains(e.target))e.preventDefault();
						};
					}else{
						navi.style.width=null;
						window.ontouchmove=null;
					}
				}
			</script>
            ' . $extHead . '
        </head>
        <body>
            <div id="navi">
                <div class="navi_menu_button" onclick="navi_menu_click();">
                    <div class="menu_button_three_bars">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                </div>
                <a id="title" href="/">
                    <img id="navi_logo" src="/logo.svg" />
                    ' . $title . '
                </a>
                <div id="navi_container">
                    <li><a href="/">主页</a></li>
                    <li><a href="/blog">博客</a></li>
                    <li><a href="/account_new">登录/注册 [公测]</a></li>
                    <li><a href="/myomyw">Myomyw</a></li>
                    <li><a href="/messageboard.php">留言板</a></li>
                    <li><a href="/about.php">关于</a></li>
					<li><a href="/intro.php">新创简史</a></li>
                </div>
            </div>
            <div id="main">
				<!--<div style="margin-top:-1px;padding-top:1px;color:#ffffff;background-color:#80ccff;text-align:center;border-bottom:6px solid #80ccff;">
                    请记住我们的新域名：
                    <a href="http://www.infinideas.org/">http://www.infinideas.org/</a>
                </div>-->';
    }
	
    function loadFooter() {
        echo '
            </div>
			<div id="footer">
				<div id="links">
					<span class="caption">友情链接</span>
					<a href="http://www.snang.cc/">山岚幽阳</a>
					<a href="http://x-y.studio/">平衍之域</a>
					<a href="http://www.skyju.cc/">居正网站</a>
					<a href="http://ptree.top/">淀粉月刊</a>
					<a href="https://www.boulkoo.com/">BOULKOO</a>
					<a href="" class="other_links">申请添加[暂未开放]</a>
					<a href="http://www.cnzz.com/stat/website.php?web_id=1255967045" class="other_links" target="_blank" title="站长统计">站长统计</a>
				</div>
				<div class="left">
					© INFINIDEAS 2015 - 2017
				</div>
				<div class="right">
					Site content under CC BY-SA 3.0 Unported.
				</div>
				<div style="display:none;">
				</div>
			</div>
		</body>
	</html>';
    }
	
}

?>
