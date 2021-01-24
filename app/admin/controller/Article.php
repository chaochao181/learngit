<?php
// +----------------------------------------------------------------------
// | RXThinkCMF框架 [ RXThinkCMF ]
// +----------------------------------------------------------------------
// | 版权所有 2017~2020 南京RXThinkCMF研发中心
// +----------------------------------------------------------------------
// | 官方网站: http://www.rxthink.cn
// +----------------------------------------------------------------------
// | Author: 牧羊人 <1175401194@qq.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;


use app\admin\service\ArticleService;
use app\common\controller\Backend;

/**
 * 文章管理-控制器
 * @author 牧羊人
 * @since 2020/7/4
 * Class Article
 * @package app\admin\controller
 */
class Article extends Backend
{
    /**
     * 初始化
     * @author 牧羊人
     * @since 2020/7/4
     */
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->model = new \app\admin\model\Article();
        $this->service = new ArticleService();
    }
}