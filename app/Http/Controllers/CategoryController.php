<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all()->sortByDesc('id');
        return view('admin.category.category',compact('categories'));

    }
    public function categorydata()
    {
        $categories = Category::get();
        // return view('admin.category.category',compact('categories'));
        return response()->json([
            'categories'=>$categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name'=>'required',
        //     'image'=>'required',
        // ]);

        // if($validator->fails()){
        //     return response()->json(['error'=>'Please Insert Valid details']);
        // }
        // else{
            $categories = new Category;
            // $slug=Str::slug($request->name);

            $categories->name = $request->name;
            // $categories->slug = $slug.'-'.date('ymdis').'-'.rand(0,999);
            $categories->parent_id = $request->parent_id;
            //  if($request->hasFile('image')){
            //     $image = $request->file('image');
            //     $image_name = time().'.'.$image->getClientOriginalExtension();
            //     $image->move(public_path().'/admin/assets/images/category/',$image_name);
            //     $categories->image = $image_name;
            //  }
            $categories->save();
            return response()->json(['success'=>'Data Add successfully.']);

        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return response()->json($categories);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
            $categories = Category::find($id);

            //if(!is_null($categories)){
                $slug=Str::slug($request->name);
                $categories->name = $request->name;
                $categories->parent_id = $request->parent_id;
                $categories->slug = $slug.'-'.date('ymdis').'-'.rand(0,999);
                 if($request->hasFile('image')){
                     $path = '/admin/assets/images/category/'.$categories->image;
                     if(File::exists($path))
                     {
                        File::delete($path);
                     }
                    $image = $request->file('image');
                    $image_name = time().'.'.$image->getClientOriginalExtension();
                    $image->move(public_path().'/admin/assets/images/category/',$image_name);
                    $categories->image = $image_name;
                 }
                $categories->save();
                return response()->json($categories);
           // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::find($id);
        if(!is_null($categories)){
            if($categories->parent_id == NULL){
                $sub_categories = Category::orderBy('name','desc')->where('parent_id',$categories->id)->get();
                foreach ($sub_categories as $sub){
                    $image_path = public_path().'/admin/assets/images/category/'.$sub->image;
                    unlink($image_path);
                    $sub->delete();
                }
            }
            $image_path = public_path().'/admin/assets/images/category/'.$categories->image;
            unlink($image_path);
            $categories->delete();
            return response()->json(['success'=>'Data Delete successfully.']);
        }

    }

    public function catstatus($id,$status){
        $category=Category::find($id);
        $category->status = $status;
        $category->update();
        return response()->json(['success'=>'Status changed successfully.']);
    }
}
