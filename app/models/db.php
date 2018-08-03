<?php
/**
 * Created by PhpStorm.
 * User: jiangchunjie
 * Date: 2018/8/2
 * Time: 23:27
 */

namespace app\models;


class db extends \PDO
{

    //模型创建类
    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=school";
        $username = "root";
        $passwd = "";

        try{
            parent::__construct($dsn, $username, $passwd);
        }catch (\PDOException $e) {
            dd($e->getMessage());
        }

    }

}