<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Classification;
use DB;

class IndexController extends Controller
{
    //
    public function home(){
    	$id=$_GET['id'];
    	
  		$data=Classification::where('category_id',$id)
  					->join('shop','shop.classification_id','=','classification.classification_id')
  					->select('shop_id','image','shop_name','price')
  					->take(16)
  					->get();
    	
    //	$data=Shop::take(16)->get();
    	return response()->json($data);
    }
    public function shopID(){
    	$id=$_GET['id'];
    	$data=Shop::where('shop_id',$id)->first();
    	return response()->json($data);
    }
    public function random(){
    	$id=$_GET['id'];
    	$data=Classification::where('classification.classification_id',$id)
    	->join('shop','shop.classification_id','=','classification.classification_id')
    	->OrderBy('sale','desc')
    	//->take(3)
    	->inRandomOrder()
    	->select('shop_id','shop_name','image','price','sale')
    	->get();
    	$max=$data[0]->sale;	//最高商品数量
    	$num=0;	//累加
    	for($i=1;$i<count($data);$i++){
    		if($max==$data[$i]->sale){
    			$num++;	//如果最高商品数量与当前数量一样累加
    		}else{
    			break;
    		}
    	}
    	$rand=[];
    	if($num>=3){	//如果最高数量一样并且超过或者等于3个
    		$arr=range(0,$num-1);	//0到num-1
    		shuffle($arr);	//随机
    		array_push($rand,$data[$arr[0]]);	//添加随机第一个
    		array_push($rand,$data[$arr[1]]);
    		array_push($rand,$data[$arr[2]]);
    	}else{
    		/*
    		for($i=0;$i<$num;$i++){
    			array_push($rand,$data[$i]);
    		}
    		*/
    		for($i=0;$i<count($data)&& $i<3;$i++){
    			array_push($rand,$data[$i]);
    		}
    		
    	}
    	return response()->json($rand);
    }
    public function regix(){
    	$username=$_POST['username'];
    	$password=$_POST['password'];
    	DB::table('users')->insert([
    		'username'=>$username,
    		'password'=>md5($password)
    		]);
    	return response()->json(0);
    }
    public function login(){
    	$username=$_POST['username'];
    	$password=$_POST['password'];
    	$data=DB::table('users')->where('username',$username)->where('password',md5($password))->count();
    	if($data==1){
    		return response()->json(1);
    	}else{
    		return response()->json(0);
    	}
    }
    public function showHobbay(){
    	$user=$_POST['username'];
    	$data=DB::table('hobbay')
    	->join('shop','shop.shop_id','=','hobbay.shop_id')
    	->select('hobbay.shop_id','image','shop_name','price')
    	->get();
    	return response()->json($data);
    }
    public function addHobbay(){
    	$id=$_POST['id'];
    	$username=$_POST['username'];
    	$data=DB::table('hobbay')->where('shop_id',$id)->where('username',$username)->count();
    	if($data!=0){
    		return response()->json(1);
    	}else{

	    	DB::table('hobbay')->insert([
	    			'shop_id'=>$id,
	    			'username'=>$username
	    		]);
	    	return response()->json(0);
    	}	
    	
    }
    public function delHobbay(){
    	$id=$_POST['id'];
    	$username=$_POST['username'];
    	DB::table('hobbay')->where('shop_id',$id)->where('username',$username)->delete();
    	return response()->json(0);
    }
    public function showAddress(){
    	$username=$_POST['username'];
    	$data=DB::table('address')->where('username',$username)->get();
    	return response()->json($data);
    }
    public function addAddress(){
    	$username=$_POST['username'];
    	$address=json_decode($_POST['address'],false);
    	DB::table('address')->insert([
    			'username'=>$username,
    			'addressName'=>$address->addressName,
    			'addressPhone'=>$address->addressPhone,
    			'addressText'=>$address->addressText
    		]);
    	$data=DB::table('address')->where('username',$username)->get();
    	return response()->json($data);
    }
    public function order(){
    	$data=DB::table('shop')->select('shop_name','price','num')->get();
    	return response()->json($data);
    }
}
