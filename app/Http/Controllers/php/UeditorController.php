<?php



namespace App\Http\Controllers\php;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;


class UeditorController extends Controller
{
    public function index(Request $req)
    {


header('Access-Control-Allow-Origin: http://www.6673.com/'); //设置http://www.baidu.com允许跨域访问
header('Access-Control-Allow-Headers: X-Requested-With,X_Requested_With'); //设置允许的跨域header
date_default_timezone_set("Asia/chongqing");
error_reporting(E_ERROR);
header("Content-Type: text/html; charset=utf-8");

$CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents("..\public\ueditor\php\config.json")), true);
// dd(file_get_contents("..\public\ueditor\php\config.json"));
$action = $req->input('action');
$result="";
// dd($action);
switch ($action) {
    case 'config':
        $result =  json_encode($CONFIG);
        // dd($result);
        break;

    /* 上传图片 */
    case 'uploadimage':
    /* 上传涂鸦 */
    case 'uploadscrawl':
    /* 上传视频 */
    case 'uploadvideo':
    /* 上传文件 */
    case 'uploadfile':
        $result = include("action_upload.php");
        echo $result;
        exit(0);
        break;

    /* 列出图片 */
    case 'listimage':
        $result= include("action_list.php");
        break;
    /* 列出文件 */
    case 'listfile':
        $result = include("action_list.php");
        break;

    /* 抓取远程文件 */
    case 'catchimage':
        $result = include("action_crawler.php");
        break;

    default:
        $result = json_encode(array(
            'state'=> '请求地址出错'
        ));
        break;
}

/* 输出结果 */
if ($req->exists('callback')) {
  
    if (preg_match("/^[\w_]+$/", $req->input('callback'))) {
        echo htmlspecialchars($req->input('callback')) . '(' . $result . ')';
    } else {
        echo json_encode(array(
            'state'=> 'callback参数不合法'
        ));
    }
} else {
    echo $result;
    exit(0);
}
    }
}


?>
