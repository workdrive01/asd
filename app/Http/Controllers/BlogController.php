<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    protected $limit = 3;

    public function index(){

        $posts = Post::with('author')
            ->latestfirst()
            ->published()
            ->simplePaginate($this -> limit);

        return view("blog.index", compact('posts'));
    }
    public function category(Category $category){

        $categoryName = $category->title;
//
//        $categories = Category::with(['posts' => function($query){
//            $query->published();
//        }])->orderBy('title', 'asc')->get();


//        $posts = Post::with('author')
////            ->latestfirst()
////            ->published()
////            ->where('category_id', $id)
////            ->simplePaginate($this -> limit);

        $posts = $category
            ->posts()
            ->with('author')
            ->latestFirst()
            ->published()
            ->simplePaginate($this -> limit);

        return view("blog.index", compact('posts', 'categoryName'));
    }

    public function show(Post $post ){

        return view("blog.show", compact('post'));
    }
}
