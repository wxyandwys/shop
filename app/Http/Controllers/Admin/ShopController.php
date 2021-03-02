<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Classification;
use App\Models\Shop;
use App\Http\Requests\ShopRequest;

class ShopController extends Controller
{
    //
    public function index(){
        $data=Classification::get();
        return view('admin.shop.index',compact('data'));
    }
    public function add(){
        $data=Category::get();
        return view('admin.shop.add',compact('data'));
    }
    public function insert(ShopRequest $request){
        if($request->file('image')){
            $all=['jpg','png','bmp','gif'];
            if(in_array($request->file('image')->getClientOriginalExtension(),$all)){
                $path=time().mt_rand().'.'.$request->file('image')->getClientOriginalExtension();
                Shop::insert([
                    'shop_name'=>$request->input('shop_name'),
                    'image'=>$path,
                    'price'=>$request->input('price'),
                    'num'=>$request->input('num'),
                    'text'=>$request->input('text'),
                    'display'=>$request->input('display'),
                    'top'=>$request->input('top'),
                    'sale'=>0,
                    'time'=>date('Y-m-d H:i:s',time()),
                    'classification_id'=>$request->input('classification_id')
                ]);
                $request->file('image')->move('./image',$path);
                return redirect('./shop/index');
            }else{
                return redirect()->back()->with(['err'=>'图片错误，后缀名为jpg、png、bmp、gif']);
            }
            
        }else{
            return redirect()->back()->with(['err'=>'图片必须添加']);
        }
        return redirect('./shop/index');
    }
    public function edit($id){
        $data=Shop::where('shop_id',$id)->first();
        $categorys=Category::get();
        return view('admin.shop.edit',compact('data','categorys'));
    }
    public function update(ShopRequest $request){
        if($request->file('image')){
            $image=['jpg','png','bmp','gif'];
            if(in_array($request->file('image')->getClientOriginalExtension(),$image)){
                $oldimage=Shop::where('shop_id',$request->input('shop_id'))->value('image');
                $path=time().mt_rand().'.'.$request->file('image')->getClientOriginalExtension();
                Shop::where('shop_id',$request->input('shop_id'))->update([
                    'shop_name'=>$request->input('shop_name'),
                    'image'=>$path,
                    'price'=>$request->input('price'),
                    'num'=>$request->input('num'),
                    'text'=>$request->input('text'),
                    'display'=>$request->input('display'),
                    'top'=>$request->input('top'),
                    'classification_id'=>$request->input('classification_id')
                ]);
                $request->file('image')->move('./image',$path);
                unlink('./image/'.$oldimage);
            }else{
                return redirect()->back()->with(['err'=>'图片错误，后缀名为jpg、png、bmp、gif']);
            }
            return redirect('./shop/index');
        }else{
            Shop::where('shop_id',$request->input('shop_id'))->update([
                'shop_name'=>$request->input('shop_name'),
                'price'=>$request->input('price'),
                'num'=>$request->input('num'),
                'text'=>$request->input('text'),
                'display'=>$request->input('display'),
                'top'=>$request->input('top'),
                'classification_id'=>$request->input('classification_id')
            ]);
            return redirect('./shop/index');
        }
    }
    public function delete($id){
        $oldimage=Shop::where('shop_id',$id)->value('image');
        Shop::where('shop_id',$id)->delete();
        unlink('./image/'.$oldimage);
        return redirect('./shop/index');
    }
}
