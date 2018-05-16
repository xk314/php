<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"I:\phpstudy\WWW\myproject\public/../application/home\view\article\detail.html";i:1526484944;s:59:"I:\phpstudy\WWW\myproject\application\home\view\layout.html";i:1525764835;}*/ ?>

<html>
<head>
    <title>Roope</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/static/home/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/static/home/css/pages.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/static/home/css/coin-slider.css" />
    <script type="text/javascript" src="/static/home/js/cufon-yui.js"></script>
    <script type="text/javascript" src="/static/home/js/droid_sans_400-droid_sans_700.font.js"></script>
    <script type="text/javascript" src="/static/home/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="/static/home/js/script.js"></script>
    <script type="text/javascript" src="/static/home/js/coin-slider.min.js"></script>
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
                    <li><a href="support.html"><span>Support</span></a></li>
                    <li><a href="about.html"><span>About Us</span></a></li>
                    <li><a href="blog.html"><span>Blog</span></a></li>
                    <li><a href="contact.html"><span>Contact Us</span></a></li>
                </ul>
            </div>
            <div class="clr"></div>
            <div class="logo">
                <h1><a href="index.html"><span>Roope</span> <small>Company Slogan Here</small></a></h1>
            </div>
            <div class="clr"></div>
            <div class="slider">
                <div id="coin-slider">
                    <?php $__FOR_START_16784__=1;$__FOR_END_16784__=4;for($i=$__FOR_START_16784__;$i < $__FOR_END_16784__;$i+=1){ ?>
                        <a href="javascript:void(0)" >
                            <img class='showdetail' num="<?php echo $topShow[$i-1]['id']; ?>" src="/static/home/images/slide<?php echo $i; ?>.jpg" width="960" height="360" alt="" />
                            <span><big><?php echo $topShow[$i-1]['title']; ?></big><br />
                               <?php echo $topShow[$i-1]['content']; ?> </span>
                        </a>
                    <?php } ?>
                </div>
                <div class="clr"></div>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
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
          <div><span style="font-size: 25px;color: #0e0e0e;margin-bottom: 10px"><?php echo $article['title']; ?></span></div>
          <div class="clr"></div>
          <p><?php echo $article['content']; ?></p>
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
                  <b><a href="#"><?php echo $comment['username']; ?></a> 发布于<?php echo $comment['addate']; ?></b>
                  <a href="javascript:void(0)">回复</a>
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
              <br><input type="button" value="提交" />
            </form>
          </div><!--//评论-->






          <div class="clr"></div>
          <div class="comment"> <a href="#"><img src="/static/home/images/userpic.gif" width="40" height="40" alt="" class="userpic" /></a>
            <p><a href="#">admin</a> Says:<br />
              April 20th, 2009 at 2:17 pm</p>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.</p>
          </div>
          <div class="comment"> <a href="#"><img src="/static/home/images/userpic.gif" width="40" height="40" alt="" class="userpic" /></a>
            <p><a href="#">Admin</a> Says:<br />
              April 20th, 2009 at 3:21 pm</p>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo.</p>
          </div>
          <div class="comment"> <a href="#"><img src="/static/home/images/userpic.gif" width="40" height="40" alt="" class="userpic" /></a>
            <p><a href="#">admin</a> Says:<br />
              April 20th, 2009 at 2:17 pm</p>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.</p>
          </div>
        </div>
        <!--<div class="article">-->
          <!--<h2><span>Leave a</span> Reply</h2>-->
          <!--<div class="clr"></div>-->
          <!--<form action="#" method="post" id="leavereply">-->
            <!--<ol>-->
              <!--<li>-->
                <!--<label for="name">Name (required)</label>-->
                <!--<input id="name" name="name" class="text" />-->
              <!--</li>-->
              <!--<li>-->
                <!--<label for="email">Email Address (required)</label>-->
                <!--<input id="email" name="email" class="text" />-->
              <!--</li>-->
              <!--<li>-->
                <!--<label for="website">Website</label>-->
                <!--<input id="website" name="website" class="text" />-->
              <!--</li>-->
              <!--<li>-->
                <!--<label for="message">Your Message</label>-->
                <!--<textarea id="message" name="message" rows="8" cols="50"></textarea>-->
              <!--</li>-->
              <!--<li>-->
                <!--<input type="image" name="imageField" id="imageField" src="/static/home/images/submit.gif" class="send" />-->
                <!--<div class="clr"></div>-->
              <!--</li>-->
            <!--</ol>-->
          <!--</form>-->
        <!--</div>-->
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
    $('input[type=button]').click(function(){
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
          if(result.msg == 'success')
            var str ="<li class='topcomment'><p class='p1'><b>" +
                    "<a href='#'>" + "<{comment.username}></a> 发布于<{comment.addate}></b>"
                    +"<a href='javascript:void(0)'>回复</a></p><p class='p2'>" + comment +"</p>";
            $('ul.comment').append($(str));
          $('textarea').val('')

        }
      });
    });

  });
</script>

    <div class="sidebar">
        <div class="gadget">
            <h2 class="star"><span>Sidebar</span> Menu</h2>
            <div class="clr"></div>
            <ul class="sb_menu">
                <?php if(is_array($categoryInfo) || $categoryInfo instanceof \think\Collection || $categoryInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $categoryInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo url('home/index/index',['category_id'=>$category['id']]); ?>" class='category' category_id='<?php echo $category['id']; ?>'><?php echo $category['classname']; ?></a>
                    <a href="<?php echo url('home/index/index',['category_id'=>$category['id']]); ?>" class="com"><span><?php echo $category['article_count']; ?></span></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="gadget">
            <h2 class="star"><span>Sponsors</span></h2>
            <div class="clr"></div>
            <ul class="ex_menu">
                <li><a href="#">Lorem ipsum dolor</a><br />
                    Donec libero. Suspendisse bibendum</li>
                <li><a href="#">Dui pede condimentum</a><br />
                    Phasellus suscipit, leo a pharetra</li>
                <li><a href="#">Condimentum lorem</a><br />
                    Tellus eleifend magna eget</li>
                <li><a href="#">Fringilla velit magna</a><br />
                    Curabitur vel urna in tristique</li>
                <li><a href="#">Suspendisse bibendum</a><br />
                    Cras id urna orbi tincidunt orci ac</li>
                <li><a href="#">Donec mattis</a><br />
                    purus nec placerat bibendum</li>
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
