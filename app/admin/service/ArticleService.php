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

namespace app\admin\service;


use app\admin\model\Article;
use app\common\service\BaseService;

/**
 * 文章管理-服务类
 * @author 牧羊人
 * @since 2020/7/4
 * Class ArticleService
 * @package app\admin\service
 */
class ArticleService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/7/4
     * ArticleService constructor.
     */
    public function __construct()
    {
        $this->model = new Article();
    }

    /**
     * 添加或编辑
     * @return array
     * @since 2020/7/4
     * @author 牧羊人
     */
    public function edit()
    {
        $data = request()->param();
        // 封面处理
        $cover = trim($data['cover']);
        if (strpos($cover, "temp")) {
            $data['cover'] = save_image($cover, 'article');
        } else {
            $data['cover'] = str_replace(IMG_URL, "", $data['cover']);
        }
        // 文章图集
        $imgStr = [];
        $imgsList = trim($data['imgs']);
        if ($imgsList) {
            $imgArr = explode(',', $imgsList);
            foreach ($imgArr as $key => $val) {
                if (strpos($val, "temp")) {
                    //新上传图片
                    $imgStr[] = save_image($val, 'article');
                } else {
                    //过滤已上传图片
                    $imgStr[] = str_replace(IMG_URL, "", $val);
                }
            }
        }
        $data['imgs'] = serialize($imgStr);
        //内容处理
        save_image_content($data['content'], $data['title'], "article");
        return parent::edit($data); // TODO: Change the autogenerated stub
    }
}