<?php

namespace App\Views\Composer;

use Illuminate\View\View;
use App\Category;
use App\Post;


class navigatorComposer
{
    public function FunctionName(View $view)
    {
        $this->composeCategories($view);

        $this->composePopularPosts($view);
    }

    private function composeCategories(View $view)
    {
        $categories = Category::with(['posts' => function ($query) {
            $query->published();
        }])->orderBy('title', 'asc')->get();

        $view->with('categories', $categories);
    }

    private function composePopularPosts(View $view)
    {
        $popularPosts = Post::published()->popular()->take(3)->get();
        {
            $view->with('popularPosts', $popularPosts);
        }

    }

}

?>
