<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FangGroupRescource extends JsonResource {
    // 单个模型对应输出的指定
    public function toArray($request) {
        // 输出字段与数据表中的字段不一致
        return [
            'id' => $this->id,
            'gname' => $this->name,
            'pic' => $this->icon
        ];
    }
}
