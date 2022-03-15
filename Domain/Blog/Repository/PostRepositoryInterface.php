<?php

namespace Domain\Framework\Laravel9\Repository;

use Domain\Blog\Entity\Post;

interface PostRepositoryInterface {

    public function createPost(Post $post);
    public function getPostById(string $id): ?Post;
    public function updatePost(Post $post):void;
}
