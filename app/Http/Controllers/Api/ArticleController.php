<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\MyValidateException;
use App\Models\Article;
use App\Models\ArticleCount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller {
    // 列表
    public function index() {
        // 要获取的字段数据
        $fields = [
            'id',
            'title',
            'desn',
            'pic',
            'created_at'
        ];
        $data = Article::orderBy('id', 'asc')->select($fields)->paginate(env('PAGESIZE'));
        return ['status' => 0, 'data' => $data, 'msg' => '成功'];
    }

    // 根据id获取数据
    public function show(Article $article) {
        return ['status' => 0, 'data' => $article, 'msg' => 'ok'];
    }

    // 记录用户浏览次数
    public function history(Request $request) {
        try {
            $data = $this->validate($request, [
                'openid' => 'required',
                'art_id' => 'required|numeric'
            ]);
        } catch (\Exception $exception) {
            throw new MyValidateException('验证异常', 3);
        }

        // 判断 openid和art_id文章id和当天日期是否存在，如果存在则修改，如果不存在则添加一条记录
        # 获取当前时间
        $data['vdt'] = date('Y-m-d');

        # 使用openid、artid和当前日期来进行判断是否存在
        // 使用了一个数组作为where条件
        $model = ArticleCount::where($data)->first();
        if (!$model) { // 数据不存在
            $data['click'] = 1;
            $model = ArticleCount::create($data);
        } else {
            // 数据存在则 自增加1
            $model->increment('click');
        }
        // 返回数据 post请求，返回的http状态码为 201
        return response()->json(['status' => 0, 'msg' => '记录成功', 'data' => $model->click], 201);
    }


}
