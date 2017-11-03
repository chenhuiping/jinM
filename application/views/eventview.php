<html>
<head>
<style>
.button.gray{
color: #8c96a0;
text-shadow:1px 1px 1px #fff;
border:1px solid #dce1e6;
box-shadow: 0 1px 2px #fff inset,0 -1px 0 #a8abae inset;
background: -webkit-linear-gradient(top,#f2f3f7,#e4e8ec);
background: -moz-linear-gradient(top,#f2f3f7,#e4e8ec);
background: linear-gradient(top,#f2f3f7,#737475);
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="m.178hui.com" />
<meta name="applicable-device" content="mobile" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <base href="<?= base_url()?>" />
<title>详情页面</title>
<link href="assets/css/public.css" rel="stylesheet" type="text/css" />
<link href="assets/css/news.css" rel="stylesheet" type="text/css" />
<script src="assets/js/jquery-1.8.3.min.js"></script>
<script>
$(window).load(function() {
	$("#status").fadeOut();
	$("#preloader").delay(350).fadeOut("slow");
})
</script>
</head>

<body>
<div class="mobile">
	<!--页面加载 开始-->
  <div id="preloader">
    <div id="status">
      <p class="center-text"><span>拼命加载中···</span></p>
    </div>
  </div>
  <!--页面加载 结束--> 
  <!--header 开始-->
  <header>
    <div class="header">
<!--        <a class="new-a-back" href="javascript:history.back();"> <span><img src="assets/img/iconfont-fanhui.png"></span> </a>-->
      <h2>EVENT</h2>
      <!--<div class="head_right"><a href="news_list.html" style="color:#FFFFFF; font-size:14px;">返回</a></div>-->
    </div>
  </header>
  <!--header 结束-->
    <h1><?=$eventList['name']?></h1>
    <div class="news_tags"><span>date：<?=$eventList['date']?></span><span>address：<?=$eventList['address']?></span></div>
    <div class="news_content">
<!--        <span style="text-align:center; width:100%; float:left;"><img src="http://www.178hui.com/upload/2015/0721/09131716125.png" /></span>-->
<!--        <p>-->
<!--            <span style="font-size:16px;">&nbsp;&nbsp;&nbsp;&nbsp;7月20日消息，据最新获悉，今日开始截止与中午12点期间，滴滴顺风车订单量已经突破了106万。据悉，滴滴顺风车服务已上线全国338座城市。</span>-->
<!--        </p>-->
        <?=$eventList['content']?>
  </div>
<!--    <div class="m_user w" style="position: fixed;bottom: -0.22em;height:2.5em">-->
<!--        <a href="#"><button class="button gray" style="width:100%;height:100%;font-size:1.2em;color:black">评价</button></a>-->
<!--        <a href="#"><button class="button gray" style="width:100%;height:100%;font-size:1.2em;color:black">点赞</button></a>-->
<!--        <a href="tel:18002160216"><button class="button gray" style="width:100%;height:100%;font-size:1.2em;color:black">联系我们</button></a>-->
<!--    </div>-->

</div>
</body>
</html>