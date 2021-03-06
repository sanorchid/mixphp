<?php

/**
 * 控制器
 * @author 刘健 <code.liu@qq.com>
 */

namespace mixhttpd\command;

use mix\console\Controller;

class ServiceController extends Controller
{

    // 服务是否启动
    public function isStart()
    {
        $output = \Mix::app()->exec('ps -ef | grep mixhttpd');
        foreach ($output as $item) {
            if (strpos($item, 'mixhttpd') !== false && strpos($item, 'master') !== false) {
                return true;
            }
        }
        return false;
    }

    // 启动服务
    public function actionStart()
    {
        if ($this->isStart()) {
            return '服务运行中' . PHP_EOL;
        }
        return \Mix::app()->server->start();
    }

    // 停止服务
    public function actionStop()
    {
        if ($this->isStart()) {
            \Mix::app()->exec('ps -ef | grep mixhttpd | awk \'NR==1{print $2}\' | xargs -n1 kill');
        }
        sleep(1);
        return '服务停止完成' . PHP_EOL;
    }

    // 重启服务
    public function actionRestart()
    {
        $this->actionStop();
        $this->actionStart();
    }

}
