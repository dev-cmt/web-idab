<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Designation;
use DB;
class DesignationController extends Controller
{
    public function _index()
    {
        // $data=DB::table('subcategories')
        //          ->leftjoin('categories','subcategories.category_id','categories.id')->select('categories.category_name','dubcategoreis.*')->get();
        
        //-------Queary Builder (1)
        // $category=DB::table('categories')->get();

        //-------Eloquent ORM (3)
        $category=Category::all();
        return view('admin.category.index',compact('category'));
    }
    //=====_________  Create  ________=====//
    public function _create()
    {
        return view('admin.category.create');
    }
    
    public function _store(Request $request)
    {
        $validated=$request -> validate([
            'category_name'=> 'required|unique:categories|max:255',
        ]);

        //-------Queary Builder (1)
        // $category=new Category();
        // $category=insert(
        //     'category_name'=> $request->category_name,
        //     'category_slug'=> Str::of($request->category_name)->slug('-'),
        // );

        //-------Queary Builder (2)
        // $category=array(
        //     'category_name'=> $request->category_name,
        //     'category_slug'=> Str::of($request->category_name)->slug('-'),
        // );
        // DB::table('categories')->insert($data);
        // return redirect()->back()->with('success','Successfully inserted!');
        

        //-------Eloquent ORM (4)
        // $post =new Event([
        //     "title" =>$request->title,
        //     "caption"=>$request->caption,
        //     "event_date"=>$request->event_date,
        //     "self"=>$request->self,
        // ]);
        // $post->save();

        //-------Eloquent ORM (3)
        $category= new Category();
        $category->category_name=$request->category_name;
        $category->category_slug=Str::of($request->category_name)->slug('-');
        $category->save();
        
        $notification=array('messege'=>'Category save successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    //=====_________  Edit  ________=====//
    public function _edit($id)
    {
        //-------Queary Builder
        // $category=DB::table('categories')->where('id',$id)->first();

        //-------Eloquent
        $category =Category::find($id);

        return view('admin.category.edit',compact('category'));
    }
    public function _update(Request $request, $id)
    {
        //-------Queary Builder (1)
        // $category=Category::find($id);
        // $category=update([
        //     'category_name'=> $request->category_name,
        //     'category_slug'=> Str::of($request->category_name)->slug('-'),
        // ]);

        //-------Queary Builder (2)
        // $category=array(
        //     'category_name'=> $request->category_name,
        //     'category_slug'=> Str::of($request->category_name)->slug('-'),
        // );
        // $category= DB::table('categories')->where('id', $id)->update($data);
        

        //-------Eloquent ORM (3)

        // $data=Event::findOrFail($id);
        // $data->update([
        //     "title" =>$request->title,
        //     "caption"=>$request->caption,
        //     "event_date"=>$request->event_date,
        //     "self"=>$request->self,
        // ]);

        //-------Eloquent ORM (3)
        $category=Category::find($id);
        $category->category_name=$request->category_name;
        $category->category_slug=Str::of($request->category_name)->slug('-');
        $category->save();

        $notification=array('messege'=>'Sub category updated successfully!','alert-type'=>'success');
        return redirect()->route('category.index')->with($notification);
    }
    public function _destroy($id)
    {
        //-------Queary Builder (1)
        // DB::table('categories')->where('id',$id)->delete();

        //-------Eloquent ORM (2)
        // $category=Category::find($id);
        // $category->delete();

        //-------Eloquent ORM (3)
        Category::destroy($id);

        $notification=array('messege'=>'Category Delete successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }






















    









    public function index()
    {
        //-------Eloquent ORM
        $subcategory=Subcategory::all();
        return view('admin.subcategory.index',compact('subcategory'));
    }
    //=====_________  Create  ________=====//
    public function create()
    {
        //-------Eloquent ORM
        $category=Category::all();
        return view('admin.subcategory.create',compact('category'));
    }
    public function store(Request $request)
    {
        $validated=$request -> validate([
            'category_id'=> 'required',
            'subcategory_name'=> 'required|unique:subcategories|max:255',
        ]);

        //-------Eloquent ORM
        $subcategory= new Subcategory();
        $subcategory->category_id=$request->category_id;
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->subcategory_slug=Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();
        
        $notification=array('messege'=>'Sub category save successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    //=====_________  Edit  ________=====//
    public function edit($id)
    {
        //-------Eloquent ORM 
        $category=Category::all();
        $data=Subcategory::find($id);

        return view('admin.subcategory.edit',compact('category','data'));
    }
    public function update(Request $request, $id)
    {
        //-------Eloquent ORM
        $subcategory=Subcategory::find($id);

        $subcategory->category_id=$request->category_id;
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->subcategory_slug=Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        $notification=array('messege'=>'Sub category updated successfully!','alert-type'=>'success');
        return redirect()->route('subcategory.index')->with($notification);
    }
    

    //=====_________  Delete  ________=====//
    public function destroy($id)
    {
         //-------Eloquent ORM
         Subcategory::destroy($id);

         $notification=array('messege'=>'Sub Category Delete successfully!','alert-type'=>'success');
         return redirect()->back()->with($notification);
    }
}


































class ImageUpload{
    public function _construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //-------Eloquent ORM
        $data=Post::all();
        // $posts=DB::table('posts')
        //         ->leftjoin('categories','posts.category_id','categories.id')
        //         ->leftjoin('subcategories','posts.subcategories_id','subcategories.id')
        //         ->select('posts.*','categories.category_name','subcategories.subcategory_name','users.name')
        //         ->get();

        return view('admin.post.index',compact('data'));
    }
    //=====_________  Create  ________=====//
    public function create()
    {
        //-------Eloquent ORM
        $data=Category::all();
        return view('admin.post.create',compact('data'));
    }
    public function store(Request $request)
    {
        $validated=$request -> validate([
            'title'=> 'required|max:255',
        ]);

        //-------Eloquent ORM
        $categoryid=DB::table('subcategories')->where('id',$request->subcategory_id)->first()->category_id;
        $slug=Str::of($request->title)->slug('-');

        $data=array();
        $data['category_id']=$categoryid;
        $data['subcategory_id']=$request->subcategory_id;
        $data['user_id']=Auth::id();
        $data['title']=$request->title;
        $data['slug']=$slug;
        $data['post_date']=$request->post_date;
        $data['description']=$request->description;
        $data['tags']=$request->tags;
        $data['status']=$request->status;

        $photo=$request->image;
        if($photo){
            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(600,400)->save('public/media/'.$photoname);
            $data['image']='public/media/'.$photoname;
            
            DB::table('posts')->insert($data);
            $notification=array('messege'=>'Category save successfully!','alert-type'=>'success');
            return redirect()->back()->with($notification);
        }

        DB::table('posts')->insert($data);
        $notification=array('messege'=>'Category save successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    //=====_________  Edit  ________=====//
    public function edit($id)
    {
        //-------Eloquent ORM
        $category=Category::all();
        $data=Post::find($id);
        return view('admin.post.edit',compact('category','data'));
    }
    public function update(Request $request, $id)
    {
        $validated=$request -> validate([
            'title'=> 'required|max:255',
        ]);

        //-------Eloquent ORM
        $categoryid=DB::table('subcategories')->where('id',$request->subcategory_id)->first()->category_id;
        $slug=Str::of($request->title)->slug('-');

        $data=array();
        $data['category_id']=$categoryid;
        $data['subcategory_id']=$request->subcategory_id;
        $data['user_id']=Auth::id();
        $data['title']=$request->title;
        $data['slug']=$slug;
        $data['post_date']=$request->post_date;
        $data['description']=$request->description;
        $data['tags']=$request->tags;
        $data['status']=$request->status;

        $photo=$request->image;
        if($photo){
            /*___Delete old image____*/
            if(File::exists($request->old_image)){
                File::delete($request->old_image);
            }

            $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(600,400)->save('public/media/'.$photoname);
            $data['image']='public/media/'.$photoname;
            DB::table('posts')->where('id',$id)->update($data);

            $notification=array('messege'=>'Category save successfully!','alert-type'=>'success');
            return redirect()->route('post.index')->with($notification);
        }else{
            $data['image']=$request->old_image;
            DB::table('posts')->where('id',$id)->update($data);

            $notification=array('messege'=>'Category save successfully!','alert-type'=>'success');
            return redirect()->route('post.index')->with($notification);
        }

    }
    public function destroy($id)
    {
        // $image=Brand::find($id);
        // $old_image=$image->brand_image;
        // unlink($old_image);
        // $delete=Brand::find($id)->delete();

        
        // //-------Query Builder
        // $post=DB::table('posts')->where('id',$id)->first();
        // if(File::exists($data->image)){
        //     File::delete($data->image);
        // }
        // $post=DB::table('posts')-where('id',$id)->delete();

        //-------Eloquent ORM
        $data=Post::find($id);
        if(File::exists($data->image)){
            File::delete($data->image);
        }
        $data->delete();

        $notification=array('messege'=>'Category save successfully!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}