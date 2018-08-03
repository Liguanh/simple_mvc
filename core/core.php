<?php
/**
 * Created by PhpStorm.
 * User: jiangchunjie
 * Date: 2018/8/2
 * Time: 22:43
 */

namespace core;

use core\lib\route;

class core
{
    public static $classMap = array();//类库

    public $assign;//assign变量的值


    /**
     * @desc 加载控制器和方法
     * @throws \Exception
     */
    public static function run()
    {
        //实例化路由类
        $route = new route();
        $controllerClass = $route->controller;
        $action = $route->action;

        $controllerClassFile = "app/controller/".$controllerClass."Controller.php";//控制器文件

        $controllerClass = '\\'.MODULE.'\controller\\'.$controllerClass."Controller";//控制器class类

        if(is_file($controllerClassFile)) {
            include $controllerClassFile;

            $controller = new $controllerClass();

            $controller->$action();
        }else{
            
            throw new \Exception("找不到控制器的类".$controllerClass);
        }
    }

    /**
     * @desc 自动加载类
     * @param $class
     * @return bool
     */
    public static function load($class)
    {
        //自动加载类库
        if(isset($classMap[$class])) {

            return true;
        }else{
            $class = str_replace('\\', '/', $class);

            $file = LOCAL.'/'.$class.".php";

            if (is_file($file)) {
                include $file;

                self::$classMap[$class] = $class;
            }else{
                return false;
            }
        }

    }



    public function assign($name,$value)
    {
        $this->assign[$name] = $value;
    }

    public function dispaly($file)
    {
        $file = 'app/views/'.$file;
        if(is_file($file))
        {
            extract($this->assign);
            include $file;
        }
    }

}