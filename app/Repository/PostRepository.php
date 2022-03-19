<?php

namespace App\Repository;

use App\Models\Post as PostModel;
use Domain\Blog\Entity\Post;
use Domain\Blog\Repository\PostRepositoryInterface;


class PostRepository implements PostRepositoryInterface
{
    public function createPost(Post $post)
    {
        $postModel = new PostModel();
        $postModel->title = $post->getTitle();
        $postModel->content = $post->getContent();
        $postModel->publishedAt = $post->getPublishedAt();
        $postModel->updated_at = $post->getUpdatedAt();
        $postModel->save();
    }

    public function getPostById(string $id): ?Post
    {
        $postModel = PostModel::findOrFail(['id'=>$id]);
        return new Post('', '', '',null, null);
    }
    public function updatePost(Post $post):void
    {

    }
}
