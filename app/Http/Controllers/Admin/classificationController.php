<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Classification;
use App\Http\Requests\ClassificationRequest;

class classificationController extends Controller
{
    public function index(){
        $data=Category::get();
        return view('admin.classification.index',compact('data'));
    }
    public function add(){
        $data=Category::get();
        return view('admin.classification.add',compact('data'));
    }
    public function insert(ClassificationRequest $request){
        Classification::insert([
            'classification_name'=>$request->input('classification_name'),
            'category_id'=>$request->input('category_id')
        ]);
        return redirect('./classification/index');
    }
    public function edit($id){
        $categorys=Category::get();
        $data=Classification::where('classification_id',$id)->first();
        return view('admin.classification.edit',compact('categorys','data'));
    }
    public function update(ClassificationRequest $request){
        Classification::where('classification_id',$request->input('classification_id'))->update([
            'classification_name'=>$request->input('classification_name'),
            'category_id'=>$request->input('category_id')
        ]);
        return redirect('./classification/index');
    }
    public function delete($id){
        Classification::where('classification_id',$id)->delete();
        return redirect('./classification/index');
    }
}
