<?php

namespace App\Models;

class Fav extends Base {
    // 房源 属性
    public function fang() {
        return $this->belongsTo(Fang::class,'fang_id');
    }
}
