<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Blog;
use App\Models\News;
use App\Models\Comment;
use DB;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function index(){
        // 1. Get 5 latest blogs and their comments
        Blog::withCount('comments')->orderBy('id', 'DESC')->limit(5)->get();

        // 2.1 Get 1 blogs has biggest comments
        Blog::withCount('comments')->orderBy('comments_count', 'DESC')->limit(1)->get();

        // 2.2 Get 1 news has biggest comments
        News::withCount('comments')->orderBy('comments_count', 'DESC')->limit(1)->get();


        // 3. Get blogs that user making it doesn't have comment in any blogs
        Blog::with('user')->whereDoesntHave('comments', function($query){
            return $query->where('target_table', 'blogs');
        })->get(); 

        // 4. Get the most-viewed blog
        Blog::orderBy('view', 'DESC')->limit(1)->get();

        // 5. Calculate mark
        $mark = 0;
        $comments = User::where('email', 'nam@gmail.com')->first()->comments;
        foreach($comments as $comment){
            if($comment['target_table'] == 'blogs') {
                $mark += 2;
            } else if ($comment['target_table'] == 'news'){
                $mark += 1;
            }
        }
        dd($mark);
    }
}
