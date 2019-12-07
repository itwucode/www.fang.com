<?php

Route::get('movie', function () {

    $arr = [];
    for ($i = 1; $i <= 50; $i++) {
        $arr[] = [
            'id' => $i,
            "name" => "user${i}",
            "age" => $i
        ];
    }

    return $arr;


    #return ['status' => 0, 'msg' => '成功', 'data' => ['id' => 1, 'name' => '小明', 'age' => 20]];
});

/*Route::get('aa',function (){
    return 'bbbb';
})->middleware('checkapi');*/

// restful规范中uri中最好有版本  api/v1/ 有此前缀
Route::group(['prefix' => 'v1', 'namespace' => 'Api', 'middleware' => ['checkapi']], function () {

    // 实现小程序的登录
    Route::post('wxlogin', 'WxloginController@login');

    // 小程序授权
    Route::post('userinfo', 'WxloginController@userinfo');

    // 图片上传
    Route::post('upfile', 'RentingController@upfile');
    // 租客信息接受处理
    Route::put('editrenting', 'RentingController@editrenting');

    // 以openid来返回用户信息
    Route::get('renting', 'RentingController@show');

    // 看房通知
    Route::get('notices', 'NoticeController@index');
    Route::get('sipder', 'NoticeController@sipder');


    // 记录用户浏览次数记录
    Route::post('articles/history', 'ArticleController@history');
    // 文章列表
    Route::get('articles/{article}', 'ArticleController@show');
    Route::get('articles', 'ArticleController@index');

    // 房源推荐接口
    Route::get('fang/recommend', 'FangController@recommend');

    // 租房小组
    Route::get('fang/group', 'FangController@group');

    // 房源列表
    Route::get('fang/fanglist', 'FangController@fanglist');

    // 房源详情
    // 房源列表
    Route::get('fang/detail', 'FangController@detail');


    // 收藏记录
    Route::get('fang/fav', 'FavController@fav');
    // 是否收藏
    Route::get('fang/isfav', 'FavController@isfav');

    // 收藏记录
    Route::get('fav/list', 'FavController@list');

    // 看房
    Route::get('fang/can', function () {
        return ['statuts' => 0, 'msg' => '看房'];
    });

    // 房源属性
    Route::get('fang/attr', 'FangController@fangAttr');

    // es模糊查询
    Route::get('fang/search', 'FangController@search');

});


