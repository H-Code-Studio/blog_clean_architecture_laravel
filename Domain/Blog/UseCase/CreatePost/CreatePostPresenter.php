<?php

namespace Domain\Blog\UseCase\CreatePost;

use Domain\Blog\UseCase\CreatePost\CreatePostResponse;

interface CreatePostPresenterInterface
{
    public function present(CreatePostResponse $response): void;
}
