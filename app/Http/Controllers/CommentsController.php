<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request) {
        Comment::create($request->except('_token'));
        return redirect()->back();
    }
}
