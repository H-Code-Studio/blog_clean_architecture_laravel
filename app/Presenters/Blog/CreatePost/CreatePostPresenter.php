<?php

use Domain\Blog\UseCase\CreatePost\CreatePostPresenterInterface as CreatePostCreatePostPresenter;
use Domain\Blog\UseCase\CreatePost\CreatePostResponse;

class CreatePostPresenter implements CreatePostCreatePostPresenter
{
    private $viewModel;

    public function present(CreatePostResponse $response): void
    {

    }
}
