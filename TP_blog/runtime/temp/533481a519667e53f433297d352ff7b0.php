<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"I:\phpstudy\WWW\myproject\public/../application/admin\view\goods\create.html";i:1526305771;s:60:"I:\phpstudy\WWW\myproject\application\admin\view\layout.html";i:1526298807;}*/ ?>
<!DOCTYPE html>
<html class="no-js">

<head>
    <title>Admin Home Page</title>
    <!-- Bootstrap -->
    <link href="/static/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/static/admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="/static/admin/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
    <link href="/static/admin/assets/styles.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="/static/admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!--/.fluid-container-->
    <script src="/static/admin/vendors/jquery-1.9.1.min.js"></script>
    <script src="/static/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/static/admin/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
    <script src="/static/admin/assets/scripts.js"></script>
    <script>
        $(function() {
            // Easy pie charts
//            $('.chart').easyPieChart({animate: 1000});
        });
    </script>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Admin Panel</a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i>
                            <?php echo \think\Session::get('UserInfo.username'); ?> <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="#">Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="login.html">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav">
                    <li class="active">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Settings <b class="caret"></b>

                        </a>
                        <ul class="dropdown-menu" id="menu1">
                            <li>
                                <a href="#">Tools <i class="icon-arrow-right"></i>

                                </a>
                                <ul class="dropdown-menu sub-menu">
                                    <li>
                                        <a href="#">Reports</a>
                                    </li>
                                    <li>
                                        <a href="#">Logs</a>
                                    </li>
                                    <li>
                                        <a href="#">Errors</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">SEO Settings</a>
                            </li>
                            <li>
                                <a href="#">Other Link</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">Other Link</a>
                            </li>
                            <li>
                                <a href="#">Other Link</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Content <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="#">Blog</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="#">News</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="#">Custom Pages</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="#">Calendar</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="#">FAQ</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Users <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="#">User List</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="#">Search</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="#">Permissions</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row-fluid">
        <!--后台首页右侧项目栏-->
        <div class="span3" id="sidebar">
            <?php if(is_array($topAuth) || $topAuth instanceof \think\Collection || $topAuth instanceof \think\Paginator): $i = 0; $__LIST__ = $topAuth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$top): $mod = ($i % 2 );++$i;if((in_array($top['id'],$userAuth))): ?>
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse" style="margin-top: 0px;margin-bottom: 10px">
                        <li class="active">
                            <a href="#"><i class="icon-chevron-right"></i><?php echo $top['auth_name']; ?></a>
                        </li>
                        <?php if(is_array($secondAuth) || $secondAuth instanceof \think\Collection || $secondAuth instanceof \think\Paginator): $i = 0; $__LIST__ = $secondAuth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$second): $mod = ($i % 2 );++$i;if((in_array($second['id'],$userAuth))): if(($second['pid']==$top['id'])): ?>
                                    <li>
                                        <a href="<?php echo url($second['auth_c'].'/'.$second['auth_a']); ?>"><span class="badge badge-success pull-right"></span><?php echo $second['auth_name']; ?></a>
                                 </li>
                                <?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>

        <!--后台中间首项目栏-->
        <!--/span-->
        <div class="span9" id="content">
            <div class="row-fluid">

            </div>
        
    <!-- Bootstrap -->
    <link href="/static/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/static/admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="/static/admin/assets/styles.css" rel="stylesheet" media="screen">
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="/static/admin/vendors/flot/excanvas.min.js"></script><![endif]-->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <!--<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>-->
    <![endif]-->
    <script src="/static/admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">商品新增</div>
                        <div style="float: right"><a href="<?php echo url('admin/goods/index'); ?>"><i class="icon-remove"></i></a></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form  class="form-horizontal" action="<?php echo url('admin/goods/save'); ?>">
                                <fieldset>
                                    <div class="alert alert-error hide">
                                        <button class="close" data-dismiss="alert"></button>
                                        You have some form errors. Please check below.
                                    </div>
                                    <div class="alert alert-success hide">
                                        <button class="close" data-dismiss="alert"></button>
                                        Your form validation is successful!
                                    </div>
                                    <!--<div class="control-group">-->
                                        <!--<label class="control-label" for="focusedInput">Name</label>-->
                                        <!--<div class="controls">-->
                                            <!--<input class="input-xlarge focused" id="focusedInput" type="text" value="">-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <legend>基本信息</legend>
                                   <div class="control-group">
                                       <label  class="control-label" for="goods_name">商品名称<span class="required">*</span></label>
                                       <div class="controls">
                                            <input type="text" class="input-xlarge" id="goods_name" name="goods_name" placeholder="请输入商品名称">
                                       </div>
                                    </div>
                                    <div class="control-group">
                                        <label  class="control-label" for="goods_name">商品价格<span class="required">*</span></label>
                                        <div class="controls has-warning">
                                            <input type="number" class="input-xlarge" id="goods_price" name="goods_price" placeholder="请输入商品价格">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label  class="control-label" for="goods_name">商品数量<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="number" name="goods_number" class="input-xlarge" id="goods_number" >
                                            <span class="help-block">请输入整数</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="fileInput">商品Logo</label>
                                        <div class="controls">
                                            <input class="input-file uniform_on" name="goods_logo" id="fileInput" type="file">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="select01">商品一级分类</label>
                                        <div class="controls">
                                            <select id="select01" class="chzn-select">
                                                <option>something</option>
                                                <?php if(is_array($categoryList) || $categoryList instanceof \think\Collection || $categoryList instanceof \think\Paginator): $i = 0; $__LIST__ = $categoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['cate_name']; ?></option>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="select011">商品一级分类</label>
                                        <div class="controls">
                                            <select id="select011">
                                                <option>商品一级分类</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="select02">商品二级分类</label>
                                        <div class="controls">
                                            <select id="select02" class="">
                                                <option>商品二级分类</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="select03">商品三级分类<span class="required">*</span></label>
                                        <div class="controls">
                                            <select id="select03" class="" name="cate_id">
                                                <option>商品三级分类</option>
                                            </select>
                                        </div>
                                    </div>
                                    <legend>商品描述</legend>
                                    <div class="control-group">
                                        <label class="control-label" for="goods_introduce">商品描述</label>
                                        <div class="controls">
                                            <textarea class="input-xlarge textarea" id="goods_introduce" name="goods_introduce" placeholder="请输入商品描述 ..." style="width: 600px; height: 200px"></textarea>
                                        </div>
                                    </div>
                                    <legend>商品属性</legend>
                                    <div class="control-group">
                                        <label class="control-label" for="selectgoodstype">商品类型<span class="required">*</span></label>
                                        <div class="controls">
                                            <select id="selectgoodstype" name="type_id">
                                                <option>选择商品的类型</option>
                                                <?php if(is_array($goodsTypeList) || $goodsTypeList instanceof \think\Collection || $goodsTypeList instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsTypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
                                                    <option value="<?php echo $type['id']; ?>"><?php echo $type['type_name']; ?></option>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="showattr"></div>




                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        <button type="reset" class="btn">Cancel</button>
                                    </div>
                                    </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
<script src="/static/admin/show.js"></script>
<script type="text/javascript">
    $(function($){
            $.ajax({
                'url':"<?php echo url('admin/goodscategory/index'); ?>",
                'type': "POST",
                'data': {id:0},
                'dataType': 'json',
                'success': function (result) {
                 var str = '<option>商品一级分类</option>';
                    $.each(result,function(k,v){
                        str += "<option value='" +v.id +"'>"+ v.cate_name+"</option>";
                    });
                    $('#select011').html(str);
                }
            });
        $('#select01').on('change',(function(){
            var data = {id:$(this).val()};
            $.ajax({
                'url':"<?php echo url('admin/goodscategory/index'); ?>",
                'type': "POST",
                'data': data,
                'dataType': 'json',
                'success': function (result) {
                    var str = '<option>something</option>';
                    var str = '';
                    $.each(result,function(k,v){
                        str += "<option value='" +v.id +"'>"+ v.cate_name+"</option>";
                    });
                    console.log(str);
                    $('#select02').html(str);
                }
            });
        }));
        $('#select011').change(function(){
            var data = {id:$(this).val()};
            console.log(data);
            $.ajax({
                'url':"<?php echo url('admin/goodscategory/index'); ?>",
                'type': "POST",
                'data': data,
                'dataType': 'json',
                'success': function (result) {
                    var str = '<option>商品二级分类</option>';
                    $.each(result,function(k,v){
                        str += "<option value='" +v.id +"'>"+ v.cate_name+"</option>";
                    });
                    $('#select02').html(str);
                }
            });
        });
        $('#select02').change(function(){
            var data = {id:$(this).val()};
            console.log(data);
            $.ajax({
                'url':"<?php echo url('admin/goodscategory/index'); ?>",
                'type': "POST",
                'data': data,
                'dataType': 'json',
                'success': function (result) {
                    var str = '<option>something</option>';
                    var str = '';
                    $.each(result,function(k,v){
                        str += "<option value='" +v.id +"'>"+ v.cate_name+"</option>";
                    });
                    $('#select03').html(str);
                }
            });
        });
        $('#selectgoodstype').change(function(){
            $.ajax({
                'url':"<?php echo url('admin/goodstype/read'); ?>",
                'type': "POST",
                'data': {id:$(this).val()},
                'dataType': 'json',
                'success': function (result) {
                    console.log(result);
                 show(result);
                }
            });
        });

    });
</script>


<!--/.fluid-container-->
<link href="/static/admin/vendors/datepicker.css" rel="stylesheet" media="screen">
<link href="/static/admin/vendors/uniform.default.css" rel="stylesheet" media="screen">
<link href="/static/admin/vendors/chosen.min.css" rel="stylesheet" media="screen">

<link href="/static/admin/vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

<script src="/static/admin/vendors/jquery-1.9.1.js"></script>
<script src="/static/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="/static/admin/vendors/jquery.uniform.min.js"></script>
<script src="/static/admin/vendors/chosen.jquery.min.js"></script>
<script src="/static/admin/vendors/bootstrap-datepicker.js"></script>

<script src="/static/admin/vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="/static/admin/vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

<script src="/static/admin/vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

<script type="text/javascript" src="/static/admin/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/static/admin/assets/form-validation.js"></script>

<script src="/static/admin/assets/scripts.js"></script>
<script>

    jQuery(document).ready(function() {
        FormValidation.init();
    });


    $(function() {
        $(".datepicker").datepicker();
        $(".uniform_on").uniform();
        $(".chzn-select").chosen();
        $('.textarea').wysihtml5();

        $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('#rootwizard').find('.bar').css({width:$percent+'%'});
            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('#rootwizard').find('.pager .next').hide();
                $('#rootwizard').find('.pager .finish').show();
                $('#rootwizard').find('.pager .finish').removeClass('disabled');
            } else {
                $('#rootwizard').find('.pager .next').show();
                $('#rootwizard').find('.pager .finish').hide();
            }
        }});
        $('#rootwizard .finish').click(function() {
            alert('Finished!, Starting over!');
            $('#rootwizard').find("a[href*='tab1']").trigger('click');
        });
    });
</script>


            <hr>
            <footer>
                <p>&copy; Vincent Gabriel 2013 - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="cssmoban">cssmoban</a>
            </footer>
        </div>
</body>
<script type="text/javascript">
    $(function($){
        $('div.container-fluid div.row-fluid div.span3 ul li.active').click(function(){
           $(this).nextAll().toggle();
        });
    });
</script>
</html>