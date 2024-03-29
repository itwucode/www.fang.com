<?php
// 角色管理
namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Node;

class RoleController extends BaseController
{
    // 列表
    public function index() {
        $data = Role::paginate($this->pagesize);
        return view('admin.role.index',compact('data'));
    }

    // 添加显示
    public function create() {
        // 读取全部的权限数据以树状形式数组返回
        // 转为数组
        $nodeData = Node::all()->toArray();
        // 递归是针对数组，所在一定把数据转为数组
        $nodeData = treeLevel($nodeData);

        return view('admin.role.create',compact('nodeData'));
    }

    // 添加处理
    public function store(Request $request) {
        // 表单验证
        $data = $this->validate($request,[
            'name'=>'required|unique:roles,name'
        ]);
        $model = Role::create($data);

        // 先根据role_id在中间件中查询，有则删除，没有不作任何操作
        // 清理完毕后，添加新的对应关系进入表中
        // sync() 同步  删除原有的权限，添加新权限
        $model->nodes()->sync($request->get('node_ids'));

        return redirect(route('admin.role.index'))->with('success','添加角色成功');
    }

    // 修改显示 路由参数的隐式转化
    public function edit(Role $role) {
        // 转为数组
        $nodeData = Node::all()->toArray();
        // 递归是针对数组，所在一定把数据转为数组
        $nodeData = treeLevel($nodeData);

        // 属性当前角色权限  模型关联  多对多
        #dump($role->nodes()->get()->toArray());
        #dump($role->nodes->toArray());
        $role_node = $role->nodes()->pluck('id')->toArray();
        return view('admin.role.edit',compact('role','nodeData','role_node'));
    }

    public function update (Request $request,Role $role) {
        // 表单验证
        $data = $this->validate($request,[
            'name'=>'required|unique:roles,name,'.$role->id
        ]);
        $role->update($data);
        $role->nodes()->sync($request->get('node_ids'));

        return redirect(route('admin.role.index'))->with('success','修改角色成功');
    }


}
