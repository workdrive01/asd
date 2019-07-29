<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use function Sodium\increment;

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
        $posts = $category->posts()
                          ->with('author')
                          ->latestFirst()
                          ->published()
                          ->simplePaginate($this -> limit);

        return view("blog.index", compact('posts', 'categoryName'));
    }

    public function author(User $author){

        $authorName = $author->name;

        $posts = $author->posts()
                        ->with('category')
                        ->latestFirst()
                        ->published()
                        ->simplePaginate($this -> limit);

        return view("blog.index", compact('posts', 'authorName'));
    }

    public function show(Post $post ){

        //update posts set view_count = view_count + 1 where id = ?
      // $viewCount = $post->view_count + 1;
       // $post->update(['view_count'=>$viewCount]);

        $post -> increment('view_count');
        return view("blog.show", compact('post'));
    }


}
