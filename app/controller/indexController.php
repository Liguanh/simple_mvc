<?php
/**
 * Created by PhpStorm.
 * User: jiangchunjie
 * Date: 2018/8/3
 * Time: 8:19
 */

namespace app\controller;


use app\models\db;
use core\core;

class indexController extends core
{

    public function index()
    {
        $model = new db();

        $query = $model->query("select * from admin")->fetchAll();



        echo "test";
    }
}