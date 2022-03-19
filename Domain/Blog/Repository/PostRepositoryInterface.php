<?php

namespace Domain\Blog\Repository;

use Domain\Blog\Entity\Post;

interface PostRepositoryInterface {

    public function createPost(Post $post);
    public function getPostById(string $id): ?Post;
    public function updatePost(Post $post):void;
}
