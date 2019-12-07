<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FangAttrRequest;
use App\Models\FangAttr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FangAttrController extends Controller {
    // 列表
    public function index(Request $request) {
        // ajax请求
        if ($request->ajax()){
            $data = FangAttr::all()->toArray();
            $data = treeLevel($data);
            return $data;
        }
        return view('admin.fangattr.index');
    }

    // 添加显示
    public function create() {
        // 读取顶级房源属性
        $data = FangAttr::where('pid', 0)->pluck('name', 'id')->toArray();
        $data[0] = '==项级==';
        return view('admin.fangattr.create', ['data' => $data]);
    }

    // 表单接受
    public function store(FangAttrRequest $request) {
       $data = $request->except(['file','_token']);
       FangAttr::create($data);
       return redirect(route('admin.fangattr.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FangAttr $fangAttr
     * @return \Illuminate\Http\Response
     */
    public function show(FangAttr $fangAttr) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FangAttr $fangAttr
     * @return \Illuminate\Http\Response
     */
    public function edit(FangAttr $fangAttr) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FangAttr $fangAttr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FangAttr $fangAttr) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FangAttr $fangAttr
     * @return \Illuminate\Http\Response
     */
    public function destroy(FangAttr $fangAttr) {
        //
    }
}
