<?php
// 房东管理
namespace App\Http\Controllers\Admin;

use App\Http\Requests\FangOwnerRequest;
use App\Models\FangOwner;
use Illuminate\Http\Request;

# 导出的excel类
use Maatwebsite\Excel\Facades\Excel;
# 导出数据类
use App\Exports\FangownerExport;

class FangOwnerController extends BaseController {
    // 列表
    public function index() {
        $excelpath = public_path('/uploads/fangownerexcel/fangowner.xlsx');
        // 判断文件是否存在，存在表示有导出过，显示下载按钮
        $isshow = file_exists($excelpath) ? true : false;
        // 排序并分页
        $data = FangOwner::orderBy('id', 'desc')->paginate($this->pagesize);
        return view('admin.fangowner.index')->with(['data' => $data, 'isshow' => $isshow]);
    }

    // 添加显示
    public function create() {
        return view('admin.fangowner.create');
    }

    // 添加处理
    public function store(FangOwnerRequest $request) {
        $data = $request->except(['file', '_token']);
        FangOwner::create($data);
        return redirect(route('admin.fangowner.index'));
    }

    // 查看
    // 注意和路由参数中的名称要一致，包括大小写
    public function show(FangOwner $fangowner) {
        // 得到图片展示  #xxx.jpg#xxx.jpg
        $pics = $fangowner->pic;
        $picList = explode('#', $pics);
        if (count($picList) <= 1) {
            return ['status' => 1, 'msg' => '没有图片', 'data' => []];
        }
        // 去除第1元素
        array_shift($picList);
        return ['status' => 0, 'msg' => '成功', 'data' => $picList];
    }

    // 导出房东excel
    public function export() {
        // 导出并下载
        #return Excel::download(new FangownerExport(),'fangowner.xlsx');

        # 导出并保存到服务器指定磁盘中
        // 参3 在config/filesystems.php文件中配置的上传文件的节点名称
        $obj = Excel::store(new FangownerExport(), 'fangowner_1.xlsx', 'fangownerexcel');

        // 返回true/false
        dump($obj);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FangOwner $fangOwner
     * @return \Illuminate\Http\Response
     */
    public function edit(FangOwner $fangOwner) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FangOwner $fangOwner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FangOwner $fangOwner) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FangOwner $fangOwner
     * @return \Illuminate\Http\Response
     */
    public function destroy(FangOwner $fangOwner) {
        //
    }
}
