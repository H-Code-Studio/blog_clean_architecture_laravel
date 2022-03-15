<?php

namespace Domain\Blog\UseCase\UpdatePost;


class UpdatePostRequest
{
    public $id;
    public $title;
    public $content;
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->updatedAt = new \DateTimeImmutable("now",  new \DateTimeZone('Europe/Paris') );
    }


    public function withTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function withContent($content)
    {
        $this->content = $content;
        return $this;
    }
    public function withId($id)
    {
        $this->id = $id;
        return $this;
    }

}
