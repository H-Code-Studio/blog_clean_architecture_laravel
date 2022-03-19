<?php

namespace Domain\Blog\UseCase\CreatePost;

use Domain\Blog\Entity\Post;
use Domain\SharedKernel\Error\Notification;

class CreatePostResponse
{
    private Post $post;
    private Notification $note;

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

    public function setPost(Post $post)
    {
        $this->post = $post;

        return $this;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

}
