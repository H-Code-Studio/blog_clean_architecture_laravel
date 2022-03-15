<?php

namespace Domain\Blog\UseCase\CreatePost;


class CreatePostRequest
{
    public string $title;
    public string $content;
    public ?\DateTimeInterface $publishedAt;
    public ?\DateTimeInterface $updatedAt;


    public function __construct()
    {
        $this->publishedAt = new \DateTimeImmutable("now",  new \DateTimeZone('Europe/Paris') );
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

}
