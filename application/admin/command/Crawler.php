<?php
namespace app\home\command;

use app\home\model\Author;
use app\home\model\Category;
use app\home\model\Novel;
use think\console\Command;
use think\console\Input;
use think\console\Output;

class Crawler extends Command
{
    protected function configure()
    {

    }

    protected function execute(Input $input, Output $output)
    {
        // TODO 进入spider, 执行nodejs脚本
    }
}
