<?php
/**
 * Created by PhpStorm.
 * User: jiangchunjie
 * Date: 2018/8/2
 * Time: 22:43
 */

/**
 * @desc 格式化打印
 * @param $var
 */
function dd($var)
{
    if(is_bool($var))
    {
        var_dump($var);
    }else if(is_null($var))
    {
        var_dump(NULL);
    }else{
        echo "<pre style='position:relative;z-index:1000;
              padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #aaa;
              font-size:14px;line-height:18px;opacity:0.9'>".print_r($var,true)."</pre>";

    }
}
