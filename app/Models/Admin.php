<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
// 软删除  导入类
use Illuminate\Database\Eloquent\SoftDeletes;

// 引入按钮组trait
use App\Models\Traits\Btn;

class Admin extends Authenticatable {
    /*// 继承 trait
    use SoftDeletes;
    // 按钮组
    use Btn;*/
    // 多继承
    use SoftDeletes, Btn;

    // 指定软删除字段 deleted_at 数据表中的字段
    protected $dates = ['deleted_at'];


    // 黑名单
    protected $guarded = [];

    // 修改器
    // set字段名(首字母大写)Attribute
    // 如果字段有下或线，则下划线不要，下划线后的首字母大写  例 created_at => CreatedAt
    public function setPasswordAttribute($value) {
        // 给密码字段加密
        $this->attributes['password'] = bcrypt($value);
    }

    // 用户与角色之间的关系为 属于
    public function role() {
        // 参1  关联模型
        // 参2  本模型对应关联模型的对应字段ID
        return $this->belongsTo(Role::class, 'role_id');
    }


}
