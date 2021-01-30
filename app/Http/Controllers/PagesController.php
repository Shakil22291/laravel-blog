<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function welcome()
    {
        $post = new Post();

        $result = DB::table('posts')->select('title');

        die(
            var_dump(
                $result->addSelect('body')->get()
            )
        );
    }
}
