<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"I:\phpstudy\WWW\myproject\public/../application/admin\view\auth\index.html";i:1525787252;s:60:"I:\phpstudy\WWW\myproject\application\admin\view\layout.html";i:1525785923;}*/ ?>
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
            $('.chart').easyPieChart({animate: 1000});
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
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                <li class="active">
                    <a href="index.html"><i class="icon-chevron-right"></i>后台首页</a>
                </li>
                <li>
                    <a href="<?php echo url('admin/auth/index'); ?>"><span class="badge badge-success pull-right">731</span>权限管理</a>
                </li>
                <li>
                    <a href="#"><span class="badge badge-success pull-right">812</span>分类管理</a>
                </li>
                <li>
                    <a href="#"><span class="badge badge-success pull-right">812</span>文章管理</a>
                </li>
                <li>
                    <a href="#"><span class="badge badge-success pull-right">812</span>分类管理</a>
                </li>
                <li>
                    <a href="#"><span class="badge badge-success pull-right">812</span>文章评论</a>
                </li>
                <li>
                    <a href="#"><span class="badge badge-success pull-right">812</span>用户管理</a>
                </li>
            </ul>
        </div>

        <!--后台中间首项目栏-->
        <!--/span-->
        <div class="span9" id="content">
            <div class="row-fluid">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4><?php echo \think\Session::get('userInfo.username'); ?></h4>
                    The login operation completed successfully</div>
            </div>
        

<link href="/static/admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen">

<script src="/static/admin/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="/static/admin/assets/DT_bootstrap.js"></script>
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
                        <a href="#"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
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
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="odd gradeX">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 4.0</td>
                        <td>Win 95+</td>
                        <td class="center"> 4</td>
                        <td class="center">X</td>
                    </tr>
                    <tr class="even gradeC">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.0</td>
                        <td>Win 95+</td>
                        <td class="center">5</td>
                        <td class="center">C</td>
                    </tr>
                    <tr class="odd gradeA">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5</td>
                        <td>Win 95+</td>
                        <td class="center">5.5</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="even gradeA">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 6</td>
                        <td>Win 98+</td>
                        <td class="center">6</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="odd gradeA">
                        <td>Trident</td>
                        <td>Internet Explorer 7</td>
                        <td>Win XP SP2+</td>
                        <td class="center">7</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="even gradeA">
                        <td>Trident</td>
                        <td>AOL browser (AOL desktop)</td>
                        <td>Win XP</td>
                        <td class="center">6</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Firefox 1.0</td>
                        <td>Win 98+ / OSX.2+</td>
                        <td class="center">1.7</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Firefox 1.5</td>
                        <td>Win 98+ / OSX.2+</td>
                        <td class="center">1.8</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Firefox 2.0</td>
                        <td>Win 98+ / OSX.2+</td>
                        <td class="center">1.8</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Firefox 3.0</td>
                        <td>Win 2k+ / OSX.3+</td>
                        <td class="center">1.9</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Camino 1.0</td>
                        <td>OSX.2+</td>
                        <td class="center">1.8</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Camino 1.5</td>
                        <td>OSX.3+</td>
                        <td class="center">1.8</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Netscape 7.2</td>
                        <td>Win 95+ / Mac OS 8.6-9.2</td>
                        <td class="center">1.7</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Netscape Browser 8</td>
                        <td>Win 98SE+</td>
                        <td class="center">1.7</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Netscape Navigator 9</td>
                        <td>Win 98+ / OSX.2+</td>
                        <td class="center">1.8</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.0</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center">1</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.1</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center">1.1</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.2</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center">1.2</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.3</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center">1.3</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.4</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center">1.4</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.5</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center">1.5</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.6</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center">1.6</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.7</td>
                        <td>Win 98+ / OSX.1+</td>
                        <td class="center">1.7</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Mozilla 1.8</td>
                        <td>Win 98+ / OSX.1+</td>
                        <td class="center">1.8</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Seamonkey 1.1</td>
                        <td>Win 98+ / OSX.2+</td>
                        <td class="center">1.8</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Gecko</td>
                        <td>Epiphany 2.20</td>
                        <td>Gnome</td>
                        <td class="center">1.8</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Webkit</td>
                        <td>Safari 1.2</td>
                        <td>OSX.3</td>
                        <td class="center">125.5</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Webkit</td>
                        <td>Safari 1.3</td>
                        <td>OSX.3</td>
                        <td class="center">312.8</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Webkit</td>
                        <td>Safari 2.0</td>
                        <td>OSX.4+</td>
                        <td class="center">419.3</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Webkit</td>
                        <td>Safari 3.0</td>
                        <td>OSX.4+</td>
                        <td class="center">522.1</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Webkit</td>
                        <td>OmniWeb 5.5</td>
                        <td>OSX.4+</td>
                        <td class="center">420</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Webkit</td>
                        <td>iPod Touch / iPhone</td>
                        <td>iPod</td>
                        <td class="center">420.1</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Webkit</td>
                        <td>S60</td>
                        <td>S60</td>
                        <td class="center">413</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera 7.0</td>
                        <td>Win 95+ / OSX.1+</td>
                        <td class="center">-</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera 7.5</td>
                        <td>Win 95+ / OSX.2+</td>
                        <td class="center">-</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera 8.0</td>
                        <td>Win 95+ / OSX.2+</td>
                        <td class="center">-</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera 8.5</td>
                        <td>Win 95+ / OSX.2+</td>
                        <td class="center">-</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera 9.0</td>
                        <td>Win 95+ / OSX.3+</td>
                        <td class="center">-</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera 9.2</td>
                        <td>Win 88+ / OSX.3+</td>
                        <td class="center">-</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera 9.5</td>
                        <td>Win 88+ / OSX.3+</td>
                        <td class="center">-</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Opera for Wii</td>
                        <td>Wii</td>
                        <td class="center">-</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Nokia N800</td>
                        <td>N800</td>
                        <td class="center">-</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Presto</td>
                        <td>Nintendo DS browser</td>
                        <td>Nintendo DS</td>
                        <td class="center">8.5</td>
                        <td class="center">C/A<sup>1</sup></td>
                    </tr>
                    <tr class="gradeC">
                        <td>KHTML</td>
                        <td>Konqureror 3.1</td>
                        <td>KDE 3.1</td>
                        <td class="center">3.1</td>
                        <td class="center">C</td>
                    </tr>
                    <tr class="gradeA">
                        <td>KHTML</td>
                        <td>Konqureror 3.3</td>
                        <td>KDE 3.3</td>
                        <td class="center">3.3</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeA">
                        <td>KHTML</td>
                        <td>Konqureror 3.5</td>
                        <td>KDE 3.5</td>
                        <td class="center">3.5</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeX">
                        <td>Tasman</td>
                        <td>Internet Explorer 4.5</td>
                        <td>Mac OS 8-9</td>
                        <td class="center">-</td>
                        <td class="center">X</td>
                    </tr>
                    <tr class="gradeC">
                        <td>Tasman</td>
                        <td>Internet Explorer 5.1</td>
                        <td>Mac OS 7.6-9</td>
                        <td class="center">1</td>
                        <td class="center">C</td>
                    </tr>
                    <tr class="gradeC">
                        <td>Tasman</td>
                        <td>Internet Explorer 5.2</td>
                        <td>Mac OS 8-X</td>
                        <td class="center">1</td>
                        <td class="center">C</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Misc</td>
                        <td>NetFront 3.1</td>
                        <td>Embedded devices</td>
                        <td class="center">-</td>
                        <td class="center">C</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Misc</td>
                        <td>NetFront 3.4</td>
                        <td>Embedded devices</td>
                        <td class="center">-</td>
                        <td class="center">A</td>
                    </tr>
                    <tr class="gradeX">
                        <td>Misc</td>
                        <td>Dillo 0.8</td>
                        <td>Embedded devices</td>
                        <td class="center">-</td>
                        <td class="center">X</td>
                    </tr>
                    <tr class="gradeX">
                        <td>Misc</td>
                        <td>Links</td>
                        <td>Text only</td>
                        <td class="center">-</td>
                        <td class="center">X</td>
                    </tr>
                    <tr class="gradeX">
                        <td>Misc</td>
                        <td>Lynx</td>
                        <td>Text only</td>
                        <td class="center">-</td>
                        <td class="center">X</td>
                    </tr>
                    <tr class="gradeC">
                        <td>Misc</td>
                        <td>IE Mobile</td>
                        <td>Windows Mobile 6</td>
                        <td class="center">-</td>
                        <td class="center">C</td>
                    </tr>
                    <tr class="gradeC">
                        <td>Misc</td>
                        <td>PSP browser</td>
                        <td>PSP</td>
                        <td class="center">-</td>
                        <td class="center">C</td>
                    </tr>
                    <tr class="gradeU">
                        <td>Other browsers</td>
                        <td>All others</td>
                        <td>-</td>
                        <td class="center">-</td>
                        <td class="center">U</td>
                    </tr>
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

</html>