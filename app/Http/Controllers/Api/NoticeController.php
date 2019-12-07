<?php
// 看房通知
namespace App\Http\Controllers\Api;

use App\Exceptions\MyValidateException;
use App\Models\Notice;
use App\Models\Renting;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入采集类
use QL\QueryList;

class NoticeController extends Controller {
    public function index(Request $request) {
        // 表单验证
        try {
            $data = $this->validate($request, [
                'openid' => 'required'
            ]);
        } catch (\Exception $exception) {
            throw new MyValidateException('验证异常', 3);
        }
        // 根据openid来获取对应的租客ID  ['openid'=>'xxxx'] ===  where('openid','xxxx')
        $reting_id = Renting::where($data)->value('id');

        // 根据租客ID来返回他对应的看房通知
        $data = Notice::with('fangowner:id,name,phone')->where('renting_id', $reting_id)->orderBy('id', 'asc')->paginate(env('PAGESIZE'));
        return ['status' => 0, 'msg' => 'ok', 'data' => $data];
    }


    public function sipder() {
        /* $data = QueryList::Query('https://news.ke.com/bj/baike/0269254.html', [
             "title" => ['title', 'text']
         ])->getData();
         dump($data);*/

        /*$data = QueryList::Query('http://desk.zol.com.cn/meinv/xingganmeinv/', [
            // 参1 选择器 css选择器一样
            // 参2 属性名,text(标签中的文本) html(标签中的html)
            // 参3 去除的标签，一般和参2中用html  <p><img><div></p>   => <p><img></p>  -div
            // 参4 回调方法，一般用于采集到的数据的处理
            "src" => ['.photo-list-padding .pic img', 'src', '', function ($item) {
                // 图片名称
                $filename = basename($item);
                // 保存到本地路径和文件名称
                $filepath = public_path('img/' . $filename);
                // 请求图片资源
                $client = new Client(['timout' => 5, 'verify' => false]);
                $reponse = $client->get($item);
                // 写入到本地
                file_put_contents($filepath, $reponse->getBody());
                return '/img/' . $filename;
            }]
        ])->getData();
        dump($data);*/

        //多线程扩展
        QueryList::run('Multi', [
            // 待采集链接集合  数组
            'list' => [
                'https://news.ke.com/bj/baike/033/pg1/',
                'https://news.ke.com/bj/baike/033/pg2/',
                'https://news.ke.com/bj/baike/033/pg3/',
            ],
            // 线程curl的相关设置
            'curl' => [
                'opt' => array(
                    //这里根据自身需求设置curl参数
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => false,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_AUTOREFERER => true
                ),
                //设置线程数
                'maxThread' => 100,
                //设置最大尝试数
                'maxTry' => 10
            ],
            // 采集到数据回调处理
            'success' => function ($ret) {
                // 采集规则
                $reg = [
                    'title' => ['.text .tit', 'text']
                ];
                $ql = QueryList::Query($ret['content'], $reg);
                $data = $ql->getData();
                dump($data);
            }
        ]);
    }
}
