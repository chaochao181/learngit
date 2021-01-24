<?php


namespace app\admin\controller;


use app\admin\service\AdminLogService;
use app\common\controller\Backend;

class Adminlog extends Backend
{

    /**
     * 初始化
     * @author 牧羊人
     * @since 2020/8/26
     */
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->model = new \app\admin\model\ActionLog();
        $this->service = new AdminLogService();
    }

}