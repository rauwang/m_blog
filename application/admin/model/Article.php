<?php

namespace app\admin\model;

use think\model\concern\SoftDelete;

class Article extends \app\common\model\Article
{
    use SoftDelete;

    // 增加文章
    public function add(array $data)
    {
        $validate = new \app\admin\validate\Article();
        if (false == $validate->check($data)) return $validate->getError();
        if (false == $validate->scene('titleLength')) return $validate->getError();
        $data['title'] = base64_encode($data['title']);
        if (false == $validate->scene('titleUnique')->check($data)) return $validate->getError();
        $data['u_id'] = model('User')->getId();
        $id = $this->allowField(true)->insertGetId($data);
        if ($id)
        {
            $res = model('ArticleContent')->add([
                'a_id'      => $id,
                'content'   => $data['content'],
            ]);
            if (1 == $res) return 1;
        } return '新增文章失败';
    }

    public function edit($id, array $data)
    {
        $validate = new \app\admin\validate\Article();
        if (false == $validate->check($data)) return $validate->getError();
        if (false == $validate->scene('titleLength')) return $validate->getError();
        $article = $this->get($id);
        if (empty($article)) return '不存在文章';
        if (model('User')->getId() != $article->u_id) return '没有权限修改';
        if ($data['title'] != base64_decode($article->title))
        {
            if (false == $validate->scene('titleUnique')->check($data)) return $validate->getError();
            $article->title = base64_encode($data['title']);
        }
        $article->c_id = $data['c_id'];
        if ($article->save())
        {
            model('ArticleContent')->edit($id, $data['content']);
            return 1;
        } return '修改文章失败';
    }
}
