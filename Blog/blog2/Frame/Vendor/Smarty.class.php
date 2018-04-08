<?php
namespace Frame\Vendor;
require_once FRAME_PATH."Vendor".DS."Smarty-3.1.16".DS."libs".DS."Smarty.class.php";
//访问定义的常量时一定不能使用引号
//导入第三方类，并在框架中的命名空间中构建起子类。之后在框架中通过此命名空间中的Smarty子类来使用smarty模板。在此继承，只是为了在框架中更方便的使用
final class Smarty extends \Smarty{

}
?>