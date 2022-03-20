<?php

namespace App\Http\Controllers;

use App\Presenters\Blog\UpdatePostPresenter;
use App\Repository\PostRepository;
use App\Views\Blog\UpdatePostView;
use Domain\Blog\UseCase\UpdatePost\UpdatePost;
use Domain\Blog\UseCase\UpdatePost\UpdatePostRequest;
use Domain\SharedKernel\Service\Serializer;
use Illuminate\Http\Request;

class UpdatePostController extends Controller
{
    /**
     * Provision a new web server.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, Request $request, PostRepository $postRepository, UpdatePostPresenter $updatePostPresenter, UpdatePostView $updatePostView, Serializer $serializer)
    {
        $updatePostUseCase = new UpdatePost($postRepository);

        $postRequest = new UpdatePostRequest();
        $postRequest->withContent($request->toArray()['content']);
        $postRequest->withTitle($request->toArray()['title']);
        $postRequest->withId($id);

        $updatePostUseCase->execute($postRequest, $updatePostPresenter);
        
        return $updatePostView->generateView($updatePostPresenter->viewModel(),  $serializer );
        // $createPostUseCase = new CreatePost($postRepository, $idGenerator);

        // $postRequest = new CreatePostRequest();

        // $createPostUseCase->execute($postRequest, $createPostPresenter);


    }
}
