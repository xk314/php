<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"I:\phpstudy\WWW\myproject\public/../application/home\view\index\index.html";i:1525776888;s:59:"I:\phpstudy\WWW\myproject\application\home\view\layout.html";i:1525764835;}*/ ?>

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
                    <?php $__FOR_START_15838__=1;$__FOR_END_15838__=4;for($i=$__FOR_START_15838__;$i < $__FOR_END_15838__;$i+=1){ ?>
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
    

<div class="mainbar">
    <?php if(($noData)): ?>
        <div class="article" style="margin-top: 200px">
            <p style="font-size: 40px">当前条件下无数据！</p>
        </div>
    <?php endif; if(is_array($articleList) || $articleList instanceof \think\Collection || $articleList instanceof \think\Paginator): $i = 0; $__LIST__ = $articleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?>
    <div class="article"> <a href="#"  num="<?php echo $article['id']; ?>" class="com"><span><?php echo $article['comment_count']; ?></span></a>
        <p style="font-size: 25px"><?php echo $article['title']; ?></p>
        <p class="infopost">Posted <span class="date"><?php echo $article['addate']; ?></span> by <a href="#"><?php echo $article['username']; ?></a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under <a href="#"><?php echo $article['classname']; ?></a>, <a href="#">internet</a></p>
        <div class="clr"></div>
        <div class="img"><img src="/static/home/images/img1.jpg" width="200" height="210" alt="" class="fl" /></div>
        <div class="post_content">
            <?php echo $article['content']; ?>
        </div>
        <div class="clr"></div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; if((!$noData)): ?><p class="pages"><small>Page <?php echo $current_page; ?> of <?php echo $last_page; ?></small> <?php echo $articleList->render(); ?></p><?php endif; ?>
</div>
      <script type="text/javascript">
              $(function ($) {
                  $('.article .com').click(
                          function() {
                              console.log('sssssssssssssssssssss');
                            var data = {'id': $(this).attr('num')};
                            $.ajax({
                              'url': "<?php echo url('home/article/read'); ?>",
                              'type': "POST",
                              'data': data,
                              'dataType': 'html',
                              'success': function (result) {
                                  $('div.mainbar').html(result);
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
