<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"I:\phpstudy\WWW\myproject\public/../application/home\view\index\index.html";i:1526643191;s:59:"I:\phpstudy\WWW\myproject\application\home\view\layout.html";i:1526661583;}*/ ?>

<html>
<head>
    <title>Roope</title>
    <link href="/static/home/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/css/pages.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/static/home/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="/static/home/js/script.js"></script>
    <style type="text/css">
        #myul_show {
            width:960px;
            height: 360px;
            position: relative;
            overflow: hidden;
        }
        #myul_show img{
            position: absolute;
            left: 0px;
            top:0px;
            z-index: 1;
        }
        img:first-child{
            /*z-index: 3;*/

        }
    </style>
    <script type="text/javascript">
        //逐渐将要显示的图片的透明度调到100%
        function changeItem(inIndex, fn){
            $($('#myul_show img')[inIndex]).css('opacity', 0);
            for(var i=0; i<=60; i++){
                (function(j){
                    setTimeout(function(){
                        $($('#myul_show img')[inIndex]).css('opacity', 5*j/100);
                        if(j>=20) fn(); //将要消失的图片的zIndex修改为1
                    },j*50);
                })(i);
            }
        }


        $(function(){
            var outIndex = 0;
            var inIndex = 1;
            setInterval(function(){
                if(outIndex>=$('#myul_show img').length)
                    outIndex = 0;
                if(inIndex >= $('#myul_show img').length)
                    inIndex = 0;
                $($('#myul_show img')[outIndex]).css('zIndex', 2) ;
//                $('#myul_show img')[outIndex].css('zIndex', 1) ;
                $($('#myul_show img')[inIndex]).css('zIndex', 3);
//                对数组格式的jquery对象执行下标操作时，获取到的时js的dom对象，使用$()将其在转化为jquery对象
                changeItem(inIndex, function(){
                    $($('#myul_show img')[outIndex-1]).css('zIndex',1);
                });
                outIndex++;
                inIndex++;
            },4000);

            $.ajax({
                'url' : "<?php echo url('home/index/sentence'); ?>",
                'type' : 'get',
                'data' : {},
                'dataType' : 'json',
                'success' : function(result){
                    if(result.msg == 'success'){
                        var date = result.sentence;
                        $('#mysentence').text(date[0]['sentence']);
                        var i = 1;
                        setInterval(function(){
                            if(i >= date.length){
                                i = 0;
                            }
                            $('#mysentence').text(date[i]['sentence']);
                            i++;
                        },10000);
                    }
                }
            });
        });
    </script>
</head>
<body>
<div class="main">
    <div class="header">
        <div class="header_resize">
            <div class="searchform">
                <form id="formsearch" name="formsearch" method="post" action="<?php echo url('home/index/index'); ?>">
          <span>
          <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our ste:" type="text" />
          </span>
                    <input name="button_search" src="/static/home/images/search.gif" class="button_search" type="image" />
                </form>
            </div>
            <div class="menu_nav">
                <ul>
                    <li class="active"><a href="<?php echo url('home/index/index'); ?>"><span>Home Page</span></a></li>
                    <li><a href="javascript:void(0)"><span>Support</span></a></li>
                    <li><a href="javascript:void(0)"><span>About Us</span></a></li>
                    <li>
                        <?php if((session('?UserInfo'))): ?>
                            <a href="javascript:void(0)"><span><?php echo \think\Session::get('UserInfo.username'); ?></span></a>
                        <?php else: ?>
                            <a href="<?php echo url('home/login/index'); ?>"><span>Login</span></a>
                        <?php endif; ?>
                    </li>
                    <?php if((session('?UserInfo'))): ?>
                    <li><a href="<?php echo url('home/login/loginout'); ?>"><span>Login Out</span></a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="clr"></div>
            <div class="logo">
                <div><h1 id="mysentence"></h1></div>
            </div>
            <div class="clr"></div>
                     <!--<div class="slider">-->
                <!--<div id="coin-slider">-->
                    <!--<?php $__FOR_START_25722__=1;$__FOR_END_25722__=4;for($i=$__FOR_START_25722__;$i < $__FOR_END_25722__;$i+=1){ ?>-->
                        <!--<a href="javascript:void(0)" >-->
                            <!--<img class='showdetail' num="<?php echo $topShow[$i-1]['id']; ?>" src="/static/home/images/slide<?php echo $i; ?>.jpg" width="960" height="360" alt="" />-->
                            <!--&lt;!&ndash;<span><big><?php echo $topShow[$i-1]['title']; ?></big><br />&ndash;&gt;-->
                               <!--&lt;!&ndash;<?php echo $topShow[$i-1]['content']; ?> </span>&ndash;&gt;-->
                        <!--</a>-->
                    <!--<?php } ?>-->
                <!--</div>-->
                <!--<div class="clr"></div>-->
            <!--</div>-->
            <div >
                <div id="myul_show">
                       <img  src="/static/home/images/slide1.jpg" width="960" height="360" alt="" />
                        <img style="float: left" src="/static/home/images/slide2.jpg" width="960" height="360" alt="" />
                        <img style="float: left" src="/static/home/images/slide3.jpg" width="960" height="360" alt="" />
                </div>
                <div class="clr"></div>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <!--<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>-->
    <div class="content">
        <div class="content_resize">
    <style type="text/css">
    a{
        text-decoration: none;
    }
</style>

<div class="mainbar">
    <?php if(($noData)): ?>
        <div class="article" style="margin-top: 200px">
            <p style="font-size: 40px">当前条件下无数据！</p>
        </div>
    <?php endif; if(is_array($articleList) || $articleList instanceof \think\Collection || $articleList instanceof \think\Paginator): $i = 0; $__LIST__ = $articleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?>
    <div class="article"> <a href="<?php echo url('home/article/read',['id'=>$article['id']]); ?>"  num="<?php echo $article['id']; ?>" class="com"><span><?php echo $article['comment_count']; ?></span></a>
        <p style="font-size: 25px"><a href="<?php echo url('home/article/read',['id'=>$article['id']]); ?>"><?php echo $article['title']; ?></a></p>
        <p class="infopost">作者&emsp;<a style="text-decoration: none" href="javascript:void(0)"><?php echo $article['username']; ?></a>&emsp;|&emsp;时间&emsp;<span class="date"><?php echo $article['addate']; ?></span>
            &emsp;|&emsp;类型 <a style="text-decoration: none" href="javascript:void(0)"><?php echo $article['classname']; ?>&emsp;|&emsp;点赞数&emsp;<?php echo $article['praise']; ?>&emsp;|&emsp;评论数&emsp;<?php echo $article['comment_count']; ?></a></p>
        <div class="clr"></div>
        <!--<div class="img"><img src="/static/home/images/img1.jpg" width="200" height="210" alt="" class="fl" /></div>-->
        <div class="post_content">
            &emsp;&emsp;<?php echo $article['content']; ?>
        </div>
        <div class="clr"></div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; if((!$noData)): ?><?php echo $articleList->render(); endif; ?>
    <!--<p class="pages"><small>Page <?php echo $current_page; ?> of <?php echo $last_page; ?></small></p>-->
</div>
      <!--<script type="text/javascript">-->
              <!--$(function ($) {-->
                  <!--$('.article .com').click(-->
                          <!--function() {-->
                            <!--var data = {'id': $(this).attr('num')};-->
                            <!--$.ajax({-->
                              <!--'url': "<?php echo url('home/article/read'); ?>",-->
                              <!--'type': "POST",-->
                              <!--'data': data,-->
                              <!--'dataType': 'html',-->
                              <!--'success': function (result) {-->
                                  <!--$('div.mainbar').html(result);-->
                              <!--}-->
                            <!--});-->
                  <!--});-->
              <!--});-->
      <!--</script>-->


    <div class="sidebar">
        <div class="gadget">
            <span style="font-size: 25px;">文章分类</span>
            <div class="clr"></div>
            <ul class="sb_menu" style="margin-top: 20px;">
                <?php if(is_array($categoryInfo) || $categoryInfo instanceof \think\Collection || $categoryInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $categoryInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo url('home/index/index',['category_id'=>$category['id']]); ?>" class='category' category_id='<?php echo $category['id']; ?>'><?php echo $category['classname']; ?></a>
                    <a href="<?php echo url('home/index/index',['category_id'=>$category['id']]); ?>" class="com"><span><?php echo $category['article_count']; ?></span></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="gadget">
            <span style="font-size: 25px;">友情链接</span>
            <div class="clr"></div>
            <ul class="ex_menu" style="margin-top: 20px;">
                <?php if(is_array($linksList) || $linksList instanceof \think\Collection || $linksList instanceof \think\Paginator): $i = 0; $__LIST__ = $linksList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?>
                <li ><a target="_blank" href="<?php echo $link['url']; ?>" style="color: #9A9A9A"><?php echo $link['domain']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <div class="clr"></div>
</div>
</div>
<div class="fbg">
    <div class="fbg_resize">
        <div class="col c1">
            <h2><span>Image</span> Gallery</h2>
            <a href="#"><img src="/static/home/images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="/static/home/images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="/static/home/images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="/static/home/images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="/static/home/images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="/static/home/images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div>
        <div class="col c2">
            <h2><span>Services</span> Overview</h2>
            <p>Curabitur sed urna id nunc pulvinar semper. Nunc sit amet tortor sit amet lacus sagittis posuere cursus vitae nunc.Etiam venenatis, turpis at eleifend porta, nisl nulla bibendum justo.</p>
            <ul class="fbg_ul">
                <li><a href="#">Lorem ipsum dolor labore et dolore.</a></li>
                <li><a href="#">Excepteur officia deserunt.</a></li>
                <li><a href="#">Integer tellus ipsum tempor sed.</a></li>
            </ul>
        </div>
        <div class="col c3">
            <h2><span>Contact</span> Us</h2>
            <p>Nullam quam lorem, tristique non vestibulum nec, consectetur in risus. Aliquam a quam vel leo gravida gravida eu porttitor dui.</p>
            <p class="contact_info"> <span>Address:</span> 1458 TemplateAccess, USA<br />
                <span>Telephone:</span> +123-1234-5678<br />
                <span>FAX:</span> +458-4578<br />
                <span>Others:</span> +301 - 0125 - 01258<br />
                <span>E-mail:</span> <a href="#">mail@yoursitename.com</a> </p>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="footer">
    <div class="footer_resize">
        <p class="lf">Copyright &copy; 2016.Company name All rights reserved.More Templates</p>
        <p class="rf"></p>
        <div style="clear:both;"></div>
    </div>
</div>
</div>
</body>
<script type="text/javascript">
    $(function ($) {
//        $('.sb_menu a.category').click(
//                function() {
//                    var data = {'id': $(this).attr('category_id')};
//                    console.log(data);
//                    $.ajax({
//                        'url': "<?php echo url('home/article/getByCategory'); ?>",
//                        'type': "POST",
//                        'data': data,
//                        'dataType': 'html',
//                        'success': function (result) {
//                            $('html').html(result.replace(/<html>(.*)<\/html>/, "$1"));
//                        }
//                    });
//        });
        $('.button_search').click(function(){
            $('from').trigger("submit");
        });
//        $('.button_search').focus(function(){
//            if($(this).val()=='Search our ste:'){
//                $(this).val('');
//            }
//        });
//        $('.button_search').blur(function(){
//            if($(this).val()==''){
//                $(this).val('Search our ste:');
//            }
//        });
    });
</script>
</html>
