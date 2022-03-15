<?php

namespace App\Http\Controllers;

use Domain\Blog\UseCase\CreatePost\CreatePost;
use Domain\Blog\UseCase\CreatePost\CreatePostRequest;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    //
    public function __invoke(Request $request, CreatePost $createPostUseCase )
    {
        dd($request->toArray());
        $postRequest = new CreatePostRequest();
        $postRequest->withContent($request->toArray()['content']);
        $postRequest->withTitle($request->toArray()['title']);

    }
}
