<?php

namespace app\admin\model;

use think\model\concern\SoftDelete;

class Category extends \app\common\model\Category
{
    use SoftDelete;

    public function add(array $data)
    {
        $validate = new \app\admin\validate\Category();
        if (false == $validate->scene('nameLength')->check($data)) return $validate->getError();
        $data['name'] = base64_encode($data['name']);
        if (false == $validate->scene('nameUnique')->check($data)) return $validate->getError();
        if ($this->allowField(true)->save($data)) return 1;
        return '添加分类失败';
    }

    public function edit($id, array $data)
    {
        $validate = new \app\admin\validate\Category();
        if (false == $validate->scene('nameLength')->check($data)) return $validate->getError();
        $category = $this->get($id);
        if (empty($category)) return '不存在分类';
        if ($data['name'] != base64_decode($category['name']))
        {
            if (false == $validate->scene('nameUnique')->check($data)) return $validate->getError();
            $category['name'] = base64_encode($data['name']);
            if (0 == $category->save()) return '保存分类失败';
        } return 1;
    }
}
