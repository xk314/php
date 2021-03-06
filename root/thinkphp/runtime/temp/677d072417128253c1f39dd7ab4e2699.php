<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"I:\phpstudy\WWW\myproject\public/../application/admin\view\manager\read.html";i:1526214752;s:60:"I:\phpstudy\WWW\myproject\application\admin\view\layout.html";i:1526043875;}*/ ?>
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
<div class="row-fluid">
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">用户详情</div>
                <div style="float: right"><a href="<?php echo url('admin/manager/index'); ?>"><i class="icon-remove"></i></a></div>
            </div>
            <div class="block-content collapse in">
                <legend>基本信息</legend>
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">详情</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>用户名字</th>
                                    <th>Email</th>
                                    <th>Nickname</th>
                                    <th>最后登录时间</th>
                                    <th>状态</th>
                                    <th>角色类型</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?php echo $userInfo['id']; ?></td>
                                    <td><?php echo $userInfo['username']; ?></td>
                                    <td><?php echo $userInfo['email']; ?></td>
                                    <td><?php echo $userInfo['nickname']; ?></td>
                                    <td><?php echo $userInfo['last_login_time']; ?></td>
                                    <td><?php echo $userInfo['status']; ?></td>
                                    <td><?php echo $userInfo['role_name']; ?></td>
                                    <td><?php echo $userInfo['create_time']; ?></td>
                                    <td><?php echo $userInfo['update_time']; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /block -->
                <legend>用户权限详情</legend>
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">权限详情</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                <thead>
                                <tr>
                                    <th class="center">权限ID</th>
                                    <th class="center">权限名</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($userInfo['auth'] as $v): ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $v['id']; ?></td>
                                    <td class="center"><?php echo $v['auth_name']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div>
        <!-- /block -->
    </div>
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