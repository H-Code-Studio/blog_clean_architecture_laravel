<?php

namespace Domain\Blog\Entity;

use DateTimeInterface;

class Post
{

    private string $id;
    private string $title;
    private string $content;
    private DateTimeInterface $publishedAt;
    private DateTimeInterface $updatedAt;

    public function __construct(string $id,string $title, string $content, ?DateTimeInterface $publishedAt, ?DateTimeInterface $updatedAt)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->publishedAt = $publishedAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): string
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getContent(): string
    {
        return $this->content;
    }
    public function getPublishedAt(): DateTimeInterface
    {
        return $this->publishedAt;
    }
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }
}
