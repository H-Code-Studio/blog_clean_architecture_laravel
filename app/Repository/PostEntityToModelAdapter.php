<?php

namespace App\Repository;

use App\Models\Post as PostModel;
use DateTimeImmutable;
use Domain\Blog\Entity\Post;

class PostEntityToModelAdapter
{
    public function postModelToEntity (PostModel $postModel) : Post
    {
        $post = new Post(
            $postModel->id,
            $postModel->title,
            $postModel->content,
            new DateTimeImmutable($postModel->publishedAt),
            new DateTimeImmutable($postModel->updated_at)
        );
        return $post;
    }
    
    public function postEntityToModel (Post $postEntity): PostModel
    {
        if ($postEntity->getId() !== null) {
            $post = PostModel::find($postEntity->getId());
        }else{
            return false;
        }
        return $post;
    }
}