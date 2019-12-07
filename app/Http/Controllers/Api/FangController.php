<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\FangGroupRescource;
use App\Http\Resources\FangGroupRescourceCollection;
use App\Http\Resources\FangRescource;
use App\Http\Resources\FangRescourceCollection;
use App\Models\Fang;
use App\Models\Fangattr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FangController extends Controller {
    // 推荐房源
    public function recommend(Request $request) {
        $data = Fang::where('is_recommend', '1')->orderBy('updated_at', 'desc')->limit(5)->get(['id', 'fang_name', 'fang_pic']);
        return ['status' => 0, 'msg' => '获取成功', 'data' => $data];
    }

    // 租房小组
    public function group(Request $request) {
        // 字段名称
        $where['field_name'] = 'fang_group';
        // 上级id号
        $pid = Fangattr::where($where)->value('id');
//        $data = Fangattr::where($where)->first();
//        return new FangGroupRescource($data);

        // 根据PID来返回对就的实际数据
        $data = Fangattr::where('pid', $pid)->orderBy('updated_at', 'desc')->limit(4)->get();
        #return ['status' => 0, 'msg' => 'ok', 'data' => $data];
        // 实例化一个集合资源对象，把模型集合对象以参数的形式传过去
        return ['status' => 0, 'msg' => 'ok', 'data' => new FangGroupRescourceCollection($data)];
    }

    // 房源列表
    public function fanglist(Request $request) {

        if (!empty($request->get('kw'))) { //调用一下es搜索
            return $this->search($request);
        }

        // when
        $data = Fang::orderBy('id', 'asc')->paginate(10);
        return ['status' => 0, 'msg' => 'ok', 'data' => new FangRescourceCollection($data)];
    }

    // 房源详情
    public function detail(Request $request) {
        // 房源
        $data = Fang::with('fangowner:id,name,phone')->where('id', $request->get('id'))->first();

        $data['fang_config'] = explode(',', $data['fang_config']);
        $data['fang_config'] = Fangattr::whereIn('id', $data['fang_config'])->pluck('name');
        $data['fang_direction'] = Fangattr::where('id', $data['fang_direction'])->value('name');

        return ['status' => 0, 'msg' => 'ok', 'data' => $data];
    }

    // 房源属性列表
    public function fangAttr(Request $request) {
        // 房源属性
        $attrData = Fangattr::all()->toArray();
        // 以字段名为下标创建多层数组
        $attrData = subTree2($attrData);

        return ['status' => 0, 'msg' => 'ok', 'data' => $attrData];
    }

    // es搜索
    public function search(Request $request) {
        // 关键词的获取
        $kw = $request->get('kw');

        if (empty($kw)) { // kw关键词没有数据，分页显示所有的房源
            $data = Fang::orderBy('id', 'asc')->paginate(10);
            return ['status' => 0, 'msg' => 'ok', 'data' => new FangRescourceCollection($data)];
        }

        // 表示kw有数据
        $client = \Elasticsearch\ClientBuilder::create()->setHosts(config('es.hosts'))->build();
        $params = [
            # 索引名称
            'index' => 'fangs',
            # 查询条件
            'body' => [
                'query' => [
                    'match' => [
                        'desn' => [
                            'query' => $kw
                        ]
                    ]
                ]
            ]
        ];
        $ret = $client->search($params);

        # 获取查询到的记录数 查询到一定大于0
        $total = $ret['hits']['total']['value'];
        if ($total == 0) { // 没有查询到对应的记录数据
            return ['stauts' => 6, 'msg' => '没有查询到数据', 'data' => []];
        }
        // 在二维数组中获取指字下标的值，并返回一维数组
        $data = array_column($ret['hits']['hits'], '_id');
        $data = Fang::whereIn('id', $data)->orderBy('id', 'asc')->paginate(10);
        return ['status' => 0, 'msg' => 'ok', 'data' => new FangRescourceCollection($data)];
    }


}
