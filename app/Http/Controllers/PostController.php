<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;

use DataTables;
use Image;

use App\Media;
use App\Post;
use App\Meta;
use App\Category;
use App\Tag;

use App\Services\Mos;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request,[
            'title'=>['required','max:255'],
        ]);
        $post = Post::create([
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'slug'=>str_slug($request->title),
            'content'=>$request->content,
            'status'=>'publish',
            'parent'=>0,
            'type'=>$request->type,
        ]);
        if ($request->type == 'product') {
            $this->productMeta($request, $post->id);
            Session::flash('success','Product has been added');
        }
        return redirect()->back();
    }
    private function productMeta(Request $request, $id)
    {
        //"price" => "500"
        //"sale_price" => null
        //"tax_status" => "Standard"
        //"sku" => null
        Meta::create([
            'post_id'=> $id,
            'option'=>'price',
            'value'=>$request->price
        ]);
        Meta::create([
            'post_id'=> $id,
            'option'=>'tax_status',
            'value'=>$request->tax_status
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function productcreate (){
        $product_categories = Category::where('for','product')->get();
        $tags = Tag::all();
        return view('admin.product.create',['product_categories'=>$product_categories,'tags'=>$tags]);
    }
    public function productcategories (Request $request){
        $product_categories = Category::where('for','product')->get();
        if($request->ajax()) {
            $data = Category::where('for','product')->get();
            return DataTables::of($data)
                ->addColumn('thumbnail', function($data){
                    $src = (Category::find($data->id)->thumbnail)?Category::find($data->id)->thumbnail:'no_image_available.jpg';

                    return '<img class="img-fluid" src="'.route('image',['url'=>$src,'width'=>50]).'">';
                    // return $src;
                })
                ->addColumn('name',function($data){
                    $name = '<b>'.Category::find($data->id)->name.'</b>';
                    if (Category::find($data->id)->slug != 'uncategorized') {
                        $name .= '<div class="row-actions smooth">';
                        $name .= '<a class="edit-catogory" data-id="' . $data->id . '" href="#">Edit</a> | <a class="view-catogory text-info" data-id="' . $data->id . '" href="#">View</a> | <a class="delete-category text-danger" data-id="' . $data->id . '" href="'.route('admin.category.destroy',['id'=>$data->id]).'">delete</a>';
                        $name .= '</div>';
                    }
                    return $name;
                })
                ->addColumn('count', function($data){
                    return Category::find($data->id)->posts->count();
                })
                ->rawColumns(['thumbnail', 'name'])
                // ->rawColumns(['no-short-1', 'no-short-2'])
                ->make(true);
        }
        return view('admin.product.categories',['product_categories'=>$product_categories]);
    }
    public function categorystore(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'name'=>['required','max:255'],
            'for'=>['required','max:255'],
            'parent'=>['nullable','numeric'],
            'thumbnail'=>['nullable','image'],
            'banner'=>['nullable','image'],
        ]);

        $category = Category::create([
            'name'=>$request->name,
            // 'slug'=>str_slug($request->name),
            // 'slug'=>Slug::create($request->name, 0, 'App\Category'),
            'slug'=>Mos::slug($request->name, 0, 'App\Category'),
            'for'=>$request->for,
            'description'=>$request->description,
            'parent'=>($request->parent)?$request->parent:0,
        ]);
        if ($request->hasFile('thumbnail')){
            $thumbnail_upload = Mos::mediastore($request, 'thumbnail');
            $category->thumbnail =  $thumbnail_upload->id;
        }
        if ($request->hasFile('banner')){
            $banner_upload = Mos::mediastore($request, 'banner');
            $category->banner =  $banner_upload->id;
        }
        $category->save();
        Session::flash('success','Category has been added.');
        return redirect()->back();
    }
    public function categoryupdate(Request $request){
        // dd($request->all());
        $category = Category::findOrFail($request->id);
        $this->validate($request,[
            'name'=>['required','max:255'],
            'for'=>['required','max:255'],
            'parent'=>['nullable','numeric'],
            'thumbnail'=>['nullable','image'],
            'banner'=>['nullable','image'],
        ]);
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->for = $request->for;
        $category->description = $request->description;
        $category->parent = ($request->parent)?$request->parent:0;

        if ($request->hasFile('thumbnail')){
            $thumbnail_upload = Mos::mediastore($request, 'thumbnail');
            $category->thumbnail =  $thumbnail_upload->id;
        } else {
            if (!$request->thumbnail_id){
                $category->thumbnail = 0;
                // Delete the image
            }
        }
        if ($request->hasFile('banner')){
            $banner_upload = Mos::mediastore($request, 'banner');
            $category->banner =  $banner_upload->id;
        } else {
            if (!$request->banner_id){
                $category->banner = 0;
                // Delete the image
            }
        }
        $category->save();
        Session::flash('success','Category has been updated.');
        return redirect()->back();
    }
    public function categorydestroy($id){
        Category::destroy($id);
        Session::flash('success','Category has been deleted.');
        return redirect()->back();
    }
}
