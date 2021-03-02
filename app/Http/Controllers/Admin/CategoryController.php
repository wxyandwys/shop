<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Category;
use App\Http\Requests\categoryRequest;

class CategoryController extends Controller
{
    public function home(){
        return view('admin.index');
    }

    public function textshow(){

        $data=DB::table('textarea')->value('textarea');
        return view('admin.text.show',compact('data'));
    }
    public function text(){
        $data=DB::table('textarea')->value('textarea');
        return view('admin.text.update',compact('data'));
    }
    public function textdata(){
        $text=$_POST['text'];
        $data=DB::table('textarea')->first();
        if($data){
            DB::table('textarea')->update([
                'textarea'=>$text
            ]);
        }else{
            DB::table('textarea')->insert([
                'textarea'=>$text
            ]);
        }
        return response()->json('1');
    }


    //
    public function index(){
        $data=Category::get();
        return view('admin.category.index',compact('data'));
    }
    public function add(){
        return view('admin.category.add');
    }
    public function insert(categoryRequest $request){
        Category::insert([
            'category_name'=>$request->input('category_name')
        ]);
        return redirect('./category/index');
    }
    public function edit($id){
        $data=Category::where('category_id',$id)->first();
        return view('admin.category.edit',compact('data'));
    }
    public function update(categoryRequest $request){
        Category::where('category_id',$request->input('category_id'))->update([
            'category_name'=>$request->input('category_name')
        ]);
        return redirect('./category/index');
    }
    public function delete($id){
        Category::where('category_id',$id)->delete();
        return redirect('./category/index');
    }
}

