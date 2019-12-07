<?php

namespace App\Models;

use App\Observers\FangAttrObserver;

class Fangattr extends Base {
    # 动态添加对象属性
    // 添加删除和修改按钮
    protected $appends = ['actionBtn'];

    // 观察者 boot 模型对象启时第1个执行的方法
    protected static function boot() {
        parent::boot();
        // 注册观察者
        self::observe(FangAttrObserver::class);
    }

    // 和访问器合作
    // 修改按钮和删除按钮
    public function getActionBtnAttribute() {
        return $this->editBtn('admin.fangattr.edit') .' '. $this->delBtn('admin.fangattr.destroy');
    }

    // 获取修改icon字段输出
    public function getIconAttribute() {
        if(stristr($this->attributes['icon'],'http')){
            return $this->attributes['icon'];
        }
        return self::$host.'/'.ltrim($this->attributes['icon'],'/');
    }


}
