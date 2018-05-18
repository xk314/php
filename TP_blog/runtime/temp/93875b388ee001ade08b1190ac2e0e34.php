<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"I:\phpstudy\WWW\myproject\public/../application/home\view\article\detail.html";i:1526660219;s:59:"I:\phpstudy\WWW\myproject\application\home\view\layout.html";i:1526661583;}*/ ?>

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
                    <!--<?php $__FOR_START_13967__=1;$__FOR_END_13967__=4;for($i=$__FOR_START_13967__;$i < $__FOR_END_13967__;$i+=1){ ?>-->
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
  *{
    margin: 0px;
    padding: 0px;
  }
  a{
    text-decoration: none;
    margin-right: 10px;
  }
  li{
    list-style: none;
  }
  div.son{
    padding-left: 50px;
  }
  div.comment .p1 {
    margin: 0px;
    padding: 5px;
  }
  div.comment .p2 {
    margin: 0px;
    padding-left: 30px;
  }
</style>
<h2><?php echo $article['title']; ?></h2>
      <div class="mainbar">
        <div class="article">
          <div style="margin-bottom: 20px"><span style="font-size: 25px;color: #0e0e0e;margin-bottom: 20px"><?php echo $article['title']; ?></span></div>
          <div class="clr"></div>
          <p>&emsp;&emsp;<?php echo $article['content']; ?></p>
          <!--<p>Tagged: <a href="#">orci</a>, <a href="#">lectus</a>, <a href="#">varius</a>, <a href="#">turpis</a></p>-->
          <p>作者: <a href="#"><?php echo $article['username']; ?></a>
            分类: <a href="#"><?php echo $article['classname']; ?></a>
            <span style="margin-right: 10px">阅读: <?php echo $article['read']; ?></span>
            点赞:<a id="praise" article="<?php echo $article['id']; ?>" href="javascript:void(0)"><?php echo $article['praise']; ?></a>
            <span style="margin-right: 10px">评论:<?php echo $article['comment_count']; ?></span>
            <span style="margin-right: 10px">时间:<?php echo $article['addate']; ?></span>时间:<?php echo $article['addate']; ?>
          </p>

          <!--分页代码-->
          <div class="pagelist2">
            <ul>
              <li>前一篇：
                <?php if($pre): ?>
                <a href="<?php echo url('home/article/read',['id'=>$pre['id']]); ?>"><?php echo $pre['title']; ?></a>
                <?php else: ?>
                <a href="javascript:void(0)">没有啦</a>
                <?php endif; ?>
              </li>
              <li>后一篇：
                <?php if($next): ?>
                <a href="<?php echo url('home/article/read',['id'=>$next['id']]); ?>"><?php echo $next['title']; ?></a>
                <?php else: ?>
                <a href="javascript:void(0)">没有啦</a>
                <?php endif; ?>
              </li>
            </ul>
          </div><!--//分页代码-->
        </div>


        
        <div class="article">
          <!--评论-->
          <h2><span></span>Comment</h2>
          <div class="clr"></div>
          <div class="comment">
            <!--主评论内容-->
            <ul class="comment">
              <?php foreach($comments as $comment): ?>
              <li class="topcomment">
                <p class="p1">
                  <b><a href="javascript:void(0)"><?php echo $comment['username']; ?></a> 发布于<?php echo $comment['addate']; ?></b>
                  <a comment_id='<?php echo $comment['id']; ?>' class="reply" href="javascript:void(0)">回复</a>
                </p>
                <p class="p2"><?php echo $comment['content']; ?></p>

                <div class="son">
                    <!--子评论内容-->
                    <ul class="soncomment">
                      <?php foreach($comment['son'] as $sonComment): ?>
                      <li>
                        <p class="p1">
                          <b><a href="#"><?php echo $sonComment['username']; ?></a> 发布于<?php echo $sonComment['addate']; ?></b>
                        </p>
                        <p class="p2"><?php echo $sonComment['content']; ?></p>
                        <div class="clear"></div>
                      </li>
                      <?php endforeach; ?>
                    </ul><!--//子评论结内容-->
                  </div>
              </li>
              <?php endforeach; ?>



            </ul><!--//主评论内容-->
            <form id="form1">
              <div>发表评论(*)</div>
              <textarea name="content" style="width:95%;height:150px;"></textarea>
              <input type="hidden" name="article_id" value="<?php echo $article['id']; ?>">
              <input type="hidden" name="pid" value="0">
              <input type="hidden" name="user_id" value="<?php echo \think\Session::get('UserInfo.id'); ?>">
              <br><input id='submit' type="button" value="提交" />
            </form>
          </div><!--//评论-->



          <div class="clr"></div>
        </div>
      </div>

<script type="text/javascript">
  $(function(){
    $('#praise').click(function(){

      var _this = this;
      var data = {'id':$(this).attr('article')};
      $.ajax({
        'url': "<?php echo url('home/article/praise'); ?>",
        'type': "POST",
        'data': data,
        'dataType': 'json',
        'success': function (result) {
         if(result.msg == 'success')
           $(_this).html((parseInt($(_this).html())+1));
//          注意this在原页面和ajax处理函数中的区别,两个表示不同的区别
        }
      });
    });


    $('#submit').click(function(){
      if($('textarea').val() == ''){
        alert('评论不能为空');
        return;
      }
      var comment = $('textarea').val();
      var data = $('#form1').serialize();
      $.ajax({
        'url': "<?php echo url('home/article/comment'); ?>",
        'type': "POST",
        'data': data,
        'dataType': 'json',
        'success': function (result) {
          if(result.msg == '未登录') {
              alert('您当前未登录，不能发表评论');return;
          }
          if(result.msg != 'success'){
            alert('评论失败'); return;
          }
          window.location.href = "<?php echo url('home/article/read',['id'=>$article['id']]); ?>";
//            var str ="<li class='topcomment'><p class='p1'><b>" +
//                    "<a href='#'>" + "<?php echo \think\Session::get('UserInfo.username'); ?></a> 发布于<?php echo date('Y-m-d H:i',time()); ?></b>"
//                    +"</p><p class='p2'>" + comment +"</p>";
//            $('ul.comment').append($(str));
//            $('textarea').val('');
        }
      });
    });


    $('.reply').live('click',function(){
      var comment_id = $(this).attr('comment_id');
      $('#form1 input[name=pid]').val(comment_id);
      if($('#del_reply').length > 0) return;
      $('#form1').append("<input id='del_reply' type='button' value='取消回复' />");
    });


    $('#del_reply').live('click', function(){
      $('#form1 input[name=pid]').attr('pid', 0);
      $(this).remove();
      $('#form1 textarea').val('');
    });

    $('#submit').click(function(){
      $('#del_reply').remove();
    });

  });
</script>

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
