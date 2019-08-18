<?php

namespace app\admin\model;

class ArticleContent extends \app\common\model\ArticleContent
{
    public function add(array $data)
    {
        $data['content'] = base64_encode($data['content']);
        return $this->insert($data);
    }

    public function edit($id, $content)
    {
        return $this->where('id', $id)->update(['content' => base64_encode($content)]);
    }
}
