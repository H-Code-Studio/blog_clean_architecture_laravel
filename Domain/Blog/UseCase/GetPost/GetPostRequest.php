<?php 

namespace Domain\Blog\UseCase\GetPost;

class GetPostRequest
{
    public string $id;
    public string $title;
    public string $createdAt;


    public function withId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function withTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function withCreatedAt($created_at)
    {
        $this->createdAt = $created_at;
        return $this;
    }
}