<?php
/**
 * Created by PhpStorm.
 * User: jiangchunjie
 * Date: 2018/8/2
 * Time: 22:49
 */

namespace core\lib;

class route
{
    public $controller;//控制器
    public $action;//操作

    public function __construct()
    {

        //p('route ok');
        /*
         * 1.隐藏index.php
         * 2.获取URL的参数部分
         * 3.获取对应的控制器和方法
         * */
        //获取URL的参数部分
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != "/") {

            //解析pathinfo模式信息
            $path = $_SERVER['REQUEST_URI'];

            //获取pathinfo模式的数组
            $path_arr = explode('/', trim($path,'/'));

            //处理MVC目录的问题
            $offset = array_search(MVC,$path_arr);
            unset($path_arr[$offset]);
            $path_arr = array_values($path_arr);

            //设置控制器, 去除mvc目录层
            if(isset($path_arr[0])) {
                $this->controller = $path_arr['0'];
            }

            unset($path_arr[0]);

            //设置控制器方法
            if(isset($path_arr[1])) {
                $this->action = $path_arr[1];
                unset($path_arr[1]);
            }else{
                $this->action = "index";
            }

            //url多余部分转为get请求
            $count = count($path_arr) + 2;
            $i = 2;
            while ($i < $count) {
                if (isset($path_arr[$i+1])) {
                    $_GET[$path_arr[$i]] = $path_arr[$i+1]; //参数赋值
                }

                $i+=2;
            }
            unset($_GET['url']);
        }else{

            //默认情况下控制器是index
            $this->controller = 'index';
            //默认情况下方法是index
            $this->action = 'index';

        }
    }
}