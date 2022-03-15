<?php

namespace Domain\Blog\UseCase\UpdatePost;

use Domain\Blog\Entity\Post;
use Domain\Blog\UseCase\UpdatePost\UpdatePostRequest;
use Seat\SharedKernel\Error\Notification;

class UpdatePostResponse
{
    private Post $updatedPost;
    private Post $currentPost;
    private Notification $note;
    private UpdatePostRequest $request;

    public function __construct()
    {
        $this->note = new Notification();
    }

    public function addError(string $fieldName, string $error)
    {
        $this->note->addError($fieldName, $error);
    }

    public function notification(): Notification
    {
        return $this->note;
    }

    public function setUpdatedPost(Post $post)
    {
        $this->updatedPost = $post;
        return $this;
    }

    public function getUpdatedPost(): ?Post
    {
        return $this->updatedPost;
    }

    public function setCurrentPost(Post $post)
    {
        $this->currentPost = $post;
        return $this;
    }

    public function getCurrentPost(): ?Post
    {
        return $this->currentPost;
    }


    public function setRequest(UpdatePostRequest $request)
    {
        $this->request = $request;
        return $this;
    }

    public function getRequest(): ?UpdatePostRequest
    {
        return $this->request;
    }
}
