<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller {

    // 分页数
    protected $pagesize = 1;

    public function __construct() {
        $this->pagesize = env('PAGESIZE');
    }

    // 文件上传
    public function upfile(Request $request) {
        // 上传的节点名称
        $nodeName = $request->get('node');
        // 获取上传表单文件域名称对应的对象
        $file = $request->file('file');

        // 上传
        // 参1：在节点名称指定的目录下面创建一个新的以此名称的目录，可以不写为空，不创建
        // 参2： 在config中filesystems.php文件中配置的节点名称
        // 返回上传成功的相对路径
        $uri = $file->store('', $nodeName);
        return ['status' => 0, 'url' => '/uploads/'.$nodeName.'/' . $uri];
    }
}
