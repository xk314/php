<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"I:\phpstudy\WWW\myproject\public/../application/admin\view\article\index.html";i:1526355885;s:60:"I:\phpstudy\WWW\myproject\application\admin\view\layout.html";i:1526298807;}*/ ?>
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
        

<link href="/static/admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen">

<script src="/static/admin/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="/static/admin/assets/DT_bootstrap.js"></script>
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">文章管理</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a href="<?php echo url('admin/article/create'); ?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
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
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                    <thead>
                    <tr style="text-align: center">
                        <th>编号</th>
                        <th>文章分类</th>
                        <th>标题</th>
                        <th>作者</th>
                        <th>添加时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($infoArr) || $infoArr instanceof \think\Collection || $infoArr instanceof \think\Paginator): $i = 0; $__LIST__ = $infoArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?>
                    <tr class="odd gradeX" style="text-align: center">
                        <td><?php echo $info['id']; ?></td>
                        <td><?php echo $info['classname']; ?></td>
                        <td align="left">
                            <a target="_blank" href="<?php echo url('admin/article/read',['id'=>$info['id']]); ?>"><?php echo $info['title']; ?></a>
                            <?php if($info['top']=='是'): ?>
                            [<font color="red">顶</font>]
                            <?php endif; ?>
                        </td>
                        <td><?php echo $info['username']; ?></td>
                        <td><?php echo $info['addate']; ?></td>
                        <td><a href="<?php echo url('admin/article/read',['id'=>$info['id']]); ?>"><i class="icon-eye-open"></i></a>&nbsp;<a href="<?php echo url('admin/article/edit',['id'=>$info['id']]); ?>"><i class="icon-edit"></i></a>&nbsp;<a href="<?php echo url('admin/article/delete',['id'=>$info['id']]); ?>"><i class="icon-remove-sign"></i></a></td>
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