<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{

    public function index(Request $request) {
        //return view('admin.blog.list');

        $blogs = Blog::orderBy('created_at','DESC');

        if (!empty($request->keyword)) {
            $blogs = $blogs->where('name','like','%'.$request->keyword.'%');
        }

        $blogs = $blogs->paginate(20);

        $data['blogs'] = $blogs;

        return view('admin.blog.list',$data);
    }

    // This method will show create blog page
    public function create() {
        return view('admin.blog.create');
    }

    // This method will save a blog in DB
    public function save(Request $request,ImageManager $imageManager) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:blogs'
        ]);

        if($validator->passes()) {
            // Form validated successfully

            $blog = new Blog;
            $blog->name = $request->name;
            $blog->description = $request->description;
            $blog->short_desc = $request->short_description;
            $blog->status = $request->status;
            $blog->save();

            if ($request->image_id > 0) {
                $tempImage = TempFile::where('id',$request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $ext = end($imageArray);

                $newFileName = 'blog-'.$blog->id.'.'.$ext;

                $sourcePath = './uploads/temp/'.$tempFileName;

                // Generate Small Thumbnail
                $dPath = './uploads/blogs/thumb/small/'.$newFileName;
                $image=time().'.'.$request->image_id->getclientOriginalName();
                $imagePath=$request->image_id->storeAs($dPath,$image,'public');
                $image=$imagePath;
                $image->save($image);
                // $img = $imageManager::make($sourcePath);
                // $img->fit(360,220);
                // $img->save($dPath);

                // Generate Large Thumbnail
                $dPath = './uploads/blogs/thumb/large/'.$newFileName;
                $img = $imageManager->read($sourcePath);
                $img->resize(1150);
                $img->save($dPath);

                $blog->image = $newFileName;
                $email="test@gmail.com";
                $blog->save();


                File::delete($sourcePath);

            }

            session()->flash('success','Blog Created Successfully');

            return response()->json([
                'status' => 200,
                'message' => 'Blog Created Successfully'
            ]);

        } else {
            // return errors
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }

    }

    public function edit($id, Request $request) {
        $blog = Blog::where('id',$id)->first();

        if(empty($blog)) {
            session()->flash('error','Record not found in DB');
            return redirect()->route('blogList');
        }

        $data['blog'] = $blog;
        return view('admin.blog.edit',$data);
    }

    public function update($id, Request $request,ImageManager $imageManager) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:blogs'
        ]);

        if($validator->passes()) {
            // Form validated successfully

            $blog = Blog::find($id);

            if (empty($blog)) {
                session()->flash('error','Record not found');
                return response()->json([
                    'status' => 0,
                ]);
            }

            $oldImageName = $blog->image;

            $blog->name = $request->name;
            $blog->description = $request->description;
            $blog->short_desc = $request->short_description;
            $blog->status = $request->status;
            $blog->slug = $request->slug;
            $blog->save();

            if ($request->image_id > 0) {
                $tempImage = TempFile::where('id',$request->image_id)->first();
                $tempFileName = $tempImage->name;
                $imageArray = explode('.',$tempFileName);
                $ext = end($imageArray);

                $newFileName = 'blog-'.strtotime('now').'-'.$blog->id.'.'.$ext;

                $sourcePath = './uploads/temp/'.$tempFileName;

                // Generate Small Thumbnail
                $dPath = './uploads/blogs/thumb/small/'.$newFileName;
                $img = $imageManager->read($sourcePath);
                $img->cover(360,220);
                $img->save($dPath);

                // Delete old small thumbnail
                $sourcePathSmall = './uploads/blogs/thumb/small/'.$oldImageName;
                File::delete($sourcePathSmall);

                // Generate Large Thumbnail
                $dPath = './uploads/blogs/thumb/large/'.$newFileName;
                $img = $imageManager->read($sourcePath);
                $img->resizeDown(width:1150  );
                $img->save($dPath);

                // Delete old small thumbnail
                $sourcePathLarge = './uploads/blogs/thumb/large/'.$oldImageName;
                File::delete($sourcePathLarge);

                $blog->image = $newFileName;
                $blog->save();

                File::delete($sourcePath);

            }

            session()->flash('success','Blog updated Successfully');

            return response()->json([
                'status' => 200,
                'message' => 'Blog updated Successfully'
            ]);

        } else {
            // return errors
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function delete($id, Request $request) {

        $blog = Blog::where('id',$id)->first();

        if (empty($blog)) {

            session()->flash('error','Record not found');

            return response([
                'status' => 0
            ]);
        }

        $path = './uploads/blogs/thumb/small/'.$blog->image;
        File::delete($path);

        $path = './uploads/blogs/thumb/large/'.$blog->image;
        File::delete($path);

        Blog::where('id',$id)->delete();

        session()->flash('success','Blog deleted successfully.');

        return response([
            'status' => 1
        ]);

    }

    public function getSlug(Request $request){
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->name);
        return response()->json([
            'status' => true,
            'slug' => $slug
        ]);
    }
}
