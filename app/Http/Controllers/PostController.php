<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('post.index', compact('posts'));
    }

    public function recentPost()
    {
        $posts = Post::with('category')->orderBy('created_at', 'desc')->take(9)->get();
        dd($posts);
           return view('home.index', compact('posts'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function show(string $id)
    {
         $post = Post::with('category')->find($id);
         return view('post.show',compact('post'));
    }
    public function create(){
        $user = Auth::user();
        $categories = Category::all();
        return view('post.create', compact('user','categories'));
     }
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'category_id' => 'required',
            'author' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('image_path')) {
            $file_name = $request->file('image_path')->getClientOriginalName();
            $request->image_path->move(public_path('images'), $file_name);

            $post = $request->except(['image_path']);
            $post['image_path'] = 'images/'.$file_name;

            Post::create($post);

            return redirect()->route('post.index')->with('success', 'Post created successfully.');
        } else {
            return back()->with('error', 'Error uploading image.');
        }
    }

    /**
     * Display the specified resource.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
