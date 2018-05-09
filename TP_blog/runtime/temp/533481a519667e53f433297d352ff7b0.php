<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"I:\phpstudy\WWW\myproject\public/../application/admin\view\goods\create.html";i:1525885525;s:60:"I:\phpstudy\WWW\myproject\application\admin\view\layout.html";i:1525878198;}*/ ?>
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
                            <?php echo \think\Session::get('userInfo.username'); ?> <i class="caret"></i>
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
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse" style="margin-top: 0px;margin-bottom: 10px">
                <li class="active">
                    <a href="#"><i class="icon-chevron-right"></i>权限管理</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/auth/index'); ?>"><span class="badge badge-success pull-right">731</span>权限管理</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/manager/index'); ?>"><span class="badge badge-success pull-right">812</span>管理员列表</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/role/index'); ?>"><span class="badge badge-success pull-right">812</span>角色管理</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/manager/index'); ?>"><span class="badge badge-success pull-right">812</span>权限管理</a>
                </li>
            </ul>
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse" style="margin-top: 0px;margin-bottom: 10px">
                <li class="active">
                    <a href="#"><i class="icon-chevron-right"></i>商品管理</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/goods/index'); ?>"><span class="badge badge-success pull-right">731</span>商品列表</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/goods/create'); ?>"><span class="badge badge-success pull-right">812</span>商品新增</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/role/index'); ?>"><span class="badge badge-success pull-right">812</span>商品类型</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/manager/index'); ?>"><span class="badge badge-success pull-right">812</span>商品属性</a>
                </li>
            </ul>
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse" style="margin-top: 0px;margin-bottom: 10px">
                <li class="active">
                    <a href="#"><i class="icon-chevron-right"></i>订单管理</a>
                </li>
                <li>
                    <a href="{:url('admin/auth/index')"><span class="badge badge-success pull-right">731</span>订单列表</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/manager/index'); ?>"><span class="badge badge-success pull-right">812</span>添加订单</a>
                </li>
            </ul>
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse" style="margin-top: 0px;margin-bottom: 10px">
                <li class="active">
                    <a href="#"><i class="icon-chevron-right"></i>日程管理</a>
                </li>
                <li>
                    <a href="{:url('admin/plan/index')"><span class="badge badge-success pull-right">731</span>日程管理</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/manager/index'); ?>"><span class="badge badge-success pull-right">812</span>管理员管理</a>
                </li>
            </ul>
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
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form id="form_sample_1" class="form-horizontal">
                                <fieldset>
                                    <legend><span class="label label-important">商品详情</span></legend>
                                    <div class="control-group">
                                        <label class="control-label">商品名称<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="name" data-required="1" class=""/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">商品价格<span class="required">*</span></label>
                                        <div class="controls">
                                            <input name="number" type="text" class="m-wrap"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">商品数量<span class="required">*</span></label>
                                        <div class="controls">
                                            <input name="digits" type="text" class=" m-wrap"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="fileInput">上传商品Logo</label>
                                        <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" type="file">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="select01">一级分类</label>
                                        <div class="controls">
                                            <select id="select01" class="chzn-select" name="x">
                                                <option>一级商品分类</option>
                                                <?php if(is_array($categoryList) || $categoryList instanceof \think\Collection || $categoryList instanceof \think\Paginator): $i = 0; $__LIST__ = $categoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                                                <option value="<?php echo $category['id']; ?>"><?php echo $category['cate_name']; ?></option>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">二级分类</label>
                                        <div class="controls">
                                            <select class="m-wrap" name="category">
                                                <option value="">Select...</option>
                                                <option value="Category 1">Category 1</option>
                                                <option value="Category 2">Category 2</option>
                                                <option value="Category 3">Category 5</option>
                                                <option value="Category 4">Category 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">三级分类<span class="required">*</span></label>
                                        <div class="controls">
                                            <select class="m-wrap" name="category">
                                                <option value="">Select...</option>
                                                <option value="Category 1">Category 1</option>
                                                <option value="Category 2">Category 2</option>
                                                <option value="Category 3">Category 5</option>
                                                <option value="Category 4">Category 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="date01">Date input</label>
                                        <div class="controls">
                                            <input type="text" class="input-xlarge datepicker" id="date01" value="02/16/12">
                                            <p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="optionsCheckbox">Checkbox</label>
                                        <div class="controls">
                                            <label class="uniform">
                                                <input class="uniform_on" type="checkbox" id="optionsCheckbox" value="option1">
                                                Option one is this and that&mdash;be sure to include why it's great
                                            </label>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="multiSelect">Multicon-select</label>
                                        <div class="controls">
                                            <select multiple="multiple" id="multiSelect" class="chzn-select span4">
                                                <option>Alabama</option><option>Alaska</option><option>Arizona</option><option>Arkansas</option><option>California</option><option>Colorado</option><option>Connecticut</option><option>Delaware</option><option>District Of Columbia</option><option>Florida</option><option>Georgia</option><option>Hawaii</option><option>Idaho</option><option>Illinois</option><option>Indiana</option><option>Iowa</option><option>Kansas</option><option>Kentucky</option><option>Louisiana</option><option>Maine</option><option>Maryland</option><option>Massachusetts</option><option>Michigan</option><option>Minnesota</option><option>Mississippi</option><option>Missouri</option><option>Montana</option><option>Nebraska</option><option>Nevada</option><option>New Hampshire</option><option>New Jersey</option><option>New Mexico</option><option>New York</option><option>North Carolina</option><option>North Dakota</option><option>Ohio</option><option>Oklahoma</option><option>Oregon</option><option>Pennsylvania</option><option>Rhode Island</option><option>South Carolina</option><option>South Dakota</option><option>Tennessee</option><option>Texas</option><option>Utah</option><option>Vermont</option><option>Virginia</option><option>Washington</option><option>West Virginia</option><option>Wisconsin</option><option>Wyoming</option>
                                            </select>
                                            <p class="help-block">Start typing to activate auto complete!</p>
                                        </div>

                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="textarea2">Textarea WYSIWYG</label>
                                        <div class="controls">
                                            <textarea class="input-xlarge textarea" placeholder="Enter text ..." style="width: 810px; height: 200px"></textarea>
                                        </div>
                                    </div>
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

<script type="text/javascript">
    $(function($){
        $('#select01').on('change',function(){
            console.log('fdsfdsfsd');
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
        });
    });
</script>

            <!-- validation -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Form Validation</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <!-- BEGIN FORM-->
                            <form action="#" id="form_sample_2" class="form-horizontal">
                                <fieldset>
                                    <div class="alert alert-error hide">
                                        <button class="close" data-dismiss="alert"></button>
                                        You have some form errors. Please check below.
                                    </div>
                                    <div class="alert alert-success hide">
                                        <button class="close" data-dismiss="alert"></button>
                                        Your form validation is successful!
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Name<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="name" data-required="1" class="span6 m-wrap"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Email<span class="required">*</span></label>
                                        <div class="controls">
                                            <input name="email" type="text" class="span6 m-wrap"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">URL<span class="required">*</span></label>
                                        <div class="controls">
                                            <input name="url" type="text" class="span6 m-wrap"/>
                                            <span class="help-block">e.g: http://www.demo.com or http://demo.com</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Number<span class="required">*</span></label>
                                        <div class="controls">
                                            <input name="number" type="text" class="span6 m-wrap"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Digits<span class="required">*</span></label>
                                        <div class="controls">
                                            <input name="digits" type="text" class="span6 m-wrap"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Credit Card<span class="required">*</span></label>
                                        <div class="controls">
                                            <input name="creditcard" type="text" class="span6 m-wrap"/>
                                            <span class="help-block">e.g: 5500 0000 0000 0004</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Occupation&nbsp;&nbsp;</label>
                                        <div class="controls">
                                            <input name="occupation" type="text" class="span6 m-wrap"/>
                                            <span class="help-block">optional field</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Category<span class="required">*</span></label>
                                        <div class="controls">
                                            <select class="span6 m-wrap" name="category">
                                                <option value="">Select...</option>
                                                <option value="Category 1">Category 1</option>
                                                <option value="Category 2">Category 2</option>
                                                <option value="Category 3">Category 5</option>
                                                <option value="Category 4">Category 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Validate</button>
                                        <button type="button" class="btn">Cancel</button>
                                    </div>
                                </fieldset>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
            <!-- /validation -->











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