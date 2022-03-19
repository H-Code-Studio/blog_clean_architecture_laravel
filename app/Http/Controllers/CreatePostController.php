<?php

namespace App\Http\Controllers;

use App\Repository\PostRepository;
use Domain\Blog\UseCase\CreatePost\CreatePost;
use Domain\Blog\UseCase\CreatePost\CreatePostRequest;
use App\Presenters\Blog\CreatePostPresenter;
use App\Views\Blog\CreatePostView;
use Illuminate\Http\Request;
use Domain\SharedKernel\Service\IdGenerator;
use Domain\SharedKernel\Service\Serializer;

class CreatePostController extends Controller
{
    /**
     * Provision a new web server.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, PostRepository $postRepository, IdGenerator $idGenerator, CreatePostPresenter $createPostPresenter, CreatePostView $createPostView, Serializer $serializer)
    {
        $createPostUseCase = new CreatePost($postRepository, $idGenerator);

        $postRequest = new CreatePostRequest();
        $postRequest->withContent($request->toArray()['content']);
        $postRequest->withTitle($request->toArray()['title']);

        $createPostUseCase->execute($postRequest, $createPostPresenter);

        return $createPostView->generateView($createPostPresenter->viewModel(),  $serializer );

    }
}
