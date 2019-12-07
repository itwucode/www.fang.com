<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\MyValidateException;
use App\Http\Resources\FavResourceCollection;
use App\Models\Fav;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPUnit\Runner\BaseTestRunner;

class FavController extends Controller {
    // openid用户是否收藏
    public function isfav(Request $request) {

        // 表单验证
        try {
            $data = $this->validate($request, [
                'openid' => 'required',
                'fang_id' => 'required|numeric'
            ]);
        } catch (\Exception $exception) {
            throw new MyValidateException('验证异常', 3);
        }
        // 验证通过，进行数据唯一性判断，openid+房源Id在此表中数据唯一
        #$model = Fav::where($data)->toSql();
        $model = Fav::where($data)->first();
        if ($model) {
            return ['status' => 0, 'msg' => '取消收藏', 'data' => 1];
        }
        return ['status' => 0, 'msg' => '添加收藏', 'data' => 0];
    }

    // 添加或取消收藏
    public function fav(Request $request) {
        // 表单验证
        try {
            $data = $this->validate($request, [
                'openid' => 'required',
                'fang_id' => 'required|numeric',
                // 添加还是收藏的标识位
                'add' => 'required|numeric'
            ]);
        } catch (\Exception $exception) {
            throw new MyValidateException('验证异常', 3);
        }
        $add = $data['add'];
        unset($data['add']);
        $msg = '';

        // 验证通过，进行数据唯一性判断，openid+房源Id在此表中数据唯一
        $model = Fav::where($data)->first();
        if ($add > 0) { // 判断是取消还是添加  0 取消 大于0 添加
            // 添加
            if (!$model) {
                // 数据不存在则添加，存在什么操作都不去执行
                Fav::create($data);
            }
            $msg = '添加收藏成功';
        } else {
            // 取消是数据存在才操作，不存在什么事情都不去操作
            if ($model) {
                // 永久删除
                $model->forceDelete();
            }
            $msg = '取消收藏成功';
        }
        return ['status' => 0, 'msg' => $msg];
    }

    // 收藏房源列表
    public function list(Request $request) {
        try {
            $data = $this->validate($request, [
                'openid' => 'required'
            ]);
        } catch (\Exception $exception) {
            throw new MyValidateException('验证异常', 3);
        }
        $data = Fav::where('openid', $data['openid'])->orderBy('updated_at', 'asc')->paginate(10);
        return ['status' => 0, 'msg' => 'ok', 'data' => new FavResourceCollection($data)];
    }



}
