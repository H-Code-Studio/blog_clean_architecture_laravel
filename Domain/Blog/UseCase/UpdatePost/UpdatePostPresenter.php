<?php

namespace Domain\Blog\UseCase\UpdatePost;

use Domain\Blog\UseCase\UpdatePost\UpdatePostResponse;

interface UpdatePostPresenter
{
    public function present(UpdatePostResponse $response): void;
}
