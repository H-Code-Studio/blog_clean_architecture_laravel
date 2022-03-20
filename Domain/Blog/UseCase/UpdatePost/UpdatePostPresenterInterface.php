<?php

namespace Domain\Blog\UseCase\UpdatePost;

use Domain\Blog\UseCase\UpdatePost\UpdatePostResponse;

interface UpdatePostPresenterInterface
{
    public function present(UpdatePostResponse $response): void;
}
