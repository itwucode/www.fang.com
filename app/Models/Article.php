<?php

namespace App\Models;

class Article extends Base {

    # 动态添加对象属性
    // 添加删除和修改按钮
    protected $appends = ['actionBtn', 'dt'];

    // 分类
    public function cate() {
        return $this->belongsTo(Cate::class, 'cid');
    }

    // 和访问器合作
    // 修改按钮和删除按钮
    public function getActionBtnAttribute() {
        return $this->editBtn('admin.article.edit') . ' ' . $this->delBtn('admin.article.destroy');
    }

    // 获取器，封面图片
    public function getPicAttribute() {
        if (stristr($this->attributes['pic'], 'http')) {
            return $this->attributes['pic'];
        }
        return self::$host . '/' . ltrim($this->attributes['pic'], '/');
    }

    // 日期
    public function getDtAttribute() {
        return date('Y-m-d',strtotime($this->attributes['created_at']));
    }


}
