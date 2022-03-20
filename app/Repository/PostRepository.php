<?php

namespace App\Repository;

use App\Models\Post as PostModel;
use Domain\Blog\Entity\Post;
use Domain\Blog\Repository\PostRepositoryInterface;
use App\Repository\PostEntityToModelAdapter;

class PostRepository implements PostRepositoryInterface
{
    private PostEntityToModelAdapter $modelEntityAdapter;


    public function __construct(PostEntityToModelAdapter $modelEntityAdapter)
    {
        $this->modelEntityAdapter = $modelEntityAdapter;
    }


    public function createPost(Post $post)
    {
        $this->modelEntityAdapter->postEntityToModel($post)->save();
    }

    public function getPostById(string $id): ?Post
    {
        try {
            $postModel = PostModel::find($id)->first();
            return $this->modelEntityAdapter->postModelToEntity($postModel);
        } catch (\Throwable $th) {
            return null;
        }
    }
    public function updatePost(Post $post):void
    {
        $this->modelEntityAdapter->postEntityToModel($post)->update([
            'title' => $post->getTitle(),
            'content' => $post->getContent()
        ]);

    }

}
