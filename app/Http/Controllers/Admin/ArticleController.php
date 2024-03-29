<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Cate;
use Illuminate\Http\Request;

use App\Http\Requests\ArticleAddRequest;

class ArticleController extends BaseController {
    // 文章列表
    public function index(Request $request) {
        // 判断是否是ajax请求
        if ($request->ajax()) {
            ### 服务器端分页
            // 分页
            // 起始位置
            $offset = $request->get('start', 0);
            // 获取的记录条数
            $limit = $request->get('length', $this->pagesize);

            # 排序
            $order = $request->get('order')[0];
            # 排字字段数组
            $columns = $request->get('columns')[$order['column']];
            # 排序的规则
            $orderType = $order['dir'];
            # 排序字段
            $field = $columns['data'];
            // 关联关系字段的映射
            $field = $field != 'cate.cname' ? $field : 'cid';
            # 搜索
            $kw = $request->get('kw');
            $builer = Article::when($kw, function ($query) use ($kw) {
                $query->where('title', 'like', "%{$kw}%");
            });
            // 获取记录总数
            $count = $builer->count();

            ## with调用模型关联 推荐
            #$data = Article::with(['cate'])->offset($offset)->limit($limit)->get();
            $data = $builer->with('cate')->orderBy($field, $orderType)->offset($offset)->limit($limit)->get();
            // 返回指定格式的json数据
            return [
                // 客户端调用服务器端次数标识
                'draw' => $request->get('draw'),
                // 获取数据记录总条数
                'recordsTotal' => $count,
                // 数据过滤后的总数量
                'recordsFiltered' => $count,
                // 数据
                'data' => $data
            ];
        }
        return view('admin.article.index');
    }

    // 添加文章显示
    public function create() {
        // 读取分类信息
        $cateData = Cate::all()->toArray();
        $cateData = treeLevel($cateData);

        return view('admin.article.create', compact('cateData'));
    }

    // 文件上传
    public function upfile(Request $request) {
        // 获取上传表单文件域名称对应的对象
        $file = $request->file('file');

        // 上传
        // 参1：在节点名称指定的目录下面创建一个新的以此名称的目录，可以不写为空，不创建
        // 参2： 在config中filesystems.php文件中配置的节点名称
        // 返回上传成功的相对路径
        $uri = $file->store('', 'article');
        return ['status' => 0, 'url' => '/uploads/articles/' . $uri];
    }

    // 删除文件
    public function delfile(Request $request) {
        $id = $request->get('id');
        // 要删除的图片的相对地址
        $src = $request->get('src');
        // 绝对地址
        $filepath = public_path($src);
        if (is_file($filepath)) {
            // 文件存在 注意linux文件的权限问题
            unlink($filepath);
        }
        return ['status' => 0, 'msg' => '删除成功'];
    }

    // 添加处理
    public function store(ArticleAddRequest $request) {
        $data = $request->except(['_token', 'file']);
        // 入库
        Article::create($data);
        return redirect(route('admin.article.index'));
    }

    // 修改显示
    public function edit(Request $request, Article $article) {
        // 获取url参数
        $url_query = $request->all();
        // 读取分类信息
        $cateData = Cate::all()->toArray();
        $cateData = treeLevel($cateData);
        return view('admin.article.edit', compact('cateData', 'article', 'url_query'));
    }

    // 修改处理
    public function update(ArticleAddRequest $request, Article $article) {
        // 传过来的url参数
        $url = $request->get('url');
        $article->update($request->except(['file', '_method', '_token', 'url']));
        $url = route('admin.article.index') . '?' . http_build_query($url);
        return redirect($url);
    }

    // 删除操作
    public function destroy(Article $article) {
        $article->delete();
        return ['status' => 0, 'msg' => '删除成功'];
    }
}
