<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"I:\phpstudy\WWW\myproject\public/../application/admin\view\auth\index.html";i:1526093043;s:60:"I:\phpstudy\WWW\myproject\application\admin\view\layout.html";i:1526043875;}*/ ?>
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
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse" style="margin-top: 0px;margin-bottom: 10px">
                <li class="active">
                    <a href="#"><i class="icon-chevron-right"></i>权限管理</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/auth/index'); ?>"><span class="badge badge-success pull-right">731</span>权限管理</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/manager/index'); ?>"><span class="badge badge-success pull-right">812</span>用户管理</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/role/index'); ?>"><span class="badge badge-success pull-right">812</span>角色管理</a>
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
                    <a href="<?php echo url('admin/goods/create'); ?>"><span class="badge badge-success pull-right">731</span>商品新增</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/goodstype/index'); ?>"><span class="badge badge-success pull-right">812</span>商品类型</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/goodsattr/index'); ?>"><span class="badge badge-success pull-right">812</span>商品属性</a>
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
        

<link href="/static/admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen">

<script src="/static/admin/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="/static/admin/assets/DT_bootstrap.js"></script>
<div class="alert alert-block">
    <a class="close" data-dismiss="alert" href="#">&times;</a>
    <h4 class="alert-heading">Warning!</h4>
    Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
</div>

<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">权限管理</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a href="<?php echo url('admin/auth/create'); ?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                    </div>
                    <div class="btn-group pull-right">
                        <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Print</a></li>
                            <li><a href="#">Save as PDF</a></li>
                            <li><a href="#">Export to Excel</a></li>
                        </ul>
                    </div>
                </div>

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>权限名称</th>
                        <th>创建时间</th>
                        <th>修改时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($authList) || $authList instanceof \think\Collection || $authList instanceof \think\Paginator): $i = 0; $__LIST__ = $authList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$auth): $mod = ($i % 2 );++$i;?>
                    <tr class="odd gradeX">
                        <th><?php echo $auth['id']; ?></th>
                        <th><?php echo str_repeat('&emsp;',$auth['level']*2); ?><?php echo $auth['auth_name']; ?></th>
                        <th><?php echo $auth['create_time']; ?></th>
                        <th><?php echo $auth['update_time']; ?></th>
                        <th>  <a href="#<?php echo $auth['id']; ?>" data-toggle="modal"><i class="icon-eye-open"></i></a>&nbsp;<a href="<?php echo url('admin/auth/edit',['id'=>$auth['id']]); ?>"><i class="icon-edit"></i></a>&nbsp;<a href="<?php echo url('admin/auth/delete',['id'=>$auth['id']]); ?>"><i class="icon-remove-sign"></i></a></th>
                        <div id="<?php echo $auth['id']; ?>" class="modal hide">
                            <div class="modal-header">
                                <button data-dismiss="modal" class="close" type="button">&times;</button>
                                <h3>权限详情</h3>
                            </div>
                            <div class="modal-body">
                                <p>权限名:<?php echo $auth['auth_name']; ?></p>
                                <p>Pid:<?php echo $auth['pid']; ?></p>
                                <p>控制器名:<?php echo $auth['auth_c']; ?></p>
                                <p>方法名:<?php echo $auth['auth_a']; ?></p>
                                <p>是否列表栏显示:<?php echo $auth['is_nav']; ?></p>
                            </div>
                        </div>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /block -->
</div>


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