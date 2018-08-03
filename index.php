<?php
/**
 * Created by PhpStorm.
 * User: jiangchunjie
 * Date: 2018/8/2
 * Time: 22:31
 */

/**
 * 入口文件
 * 1、定义常量
 * 2、加载函数库
 * 3、启动框架
 */

define("LOCAL", realpath("./")); //当前框架所在的目录
define('CORE',LOCAL.'/core');  //框架核心文件所在的目录
define('APP',LOCAL.'/app');    //项目文件所在的目录
define("MODULE", "app");
define("MVC", "simple_mvc");


define('DEBUG',true);  //开启调试模式
if(DEBUG)
{
    //打开显示错误的开关
    ini_set('display_error','On');
}else{
    ini_set('display_error','Off');
}

//加载函数库文件
include CORE."/common/function.php";

//加载框架的核心文件
include CORE."/core.php";

//当我们new的类不存在的时候会触发“spl_autoload_register('core::load');”这个方法
spl_autoload_register('\core\core::load');

\core\core::run();



