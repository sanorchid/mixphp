<?php

/**
 * 默认控制器
 * @author 刘健 <code.liu@qq.com>
 */
namespace index\controller;

use mix\web\Controller;

class IndexController extends Controller
{

    public function actionIndex()
    {
        return 'Hello World' . PHP_EOL;
    }

}
