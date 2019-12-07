<?php
// excel导出数据类
namespace App\Exports;

use App\Models\FangOwner;
use Maatwebsite\Excel\Concerns\FromCollection;

class FangownerExport implements FromCollection {
    public $offset;

    public function __construct($offset = 0) {
        $this->offset = $offset;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection() {
        // 取出所有的房东数据
        //return FangOwner::get(['id', 'name']);

        return FangOwner::offset($this->offset)->limit(1000)->get();

    }
}
