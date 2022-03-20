<?php

namespace Domain\Blog\UseCase\UpdatePost;

use Assert\Assert;
use Assert\LazyAssertionException;
use Domain\Blog\Entity\Post;
use Domain\Blog\Repository\PostRepositoryInterface;
use Domain\Blog\UseCase\UpdatePost\UpdatePostRequest;
use Domain\Blog\UseCase\UpdatePost\UpdatePostPresenterInterface;
use Domain\Blog\UseCase\UpdatePost\UpdatePostResponse;

class UpdatePost {

    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    public function execute(UpdatePostRequest $postRequest, UpdatePostPresenterInterface $updatePostPresenter) :void
    {
        $response = new UpdatePostResponse();
        $response->setRequest($postRequest);

        /** @var Post $post */

        $isValid = $this->validateRequest($postRequest, $response);
        $isValid = $this->validatePost($postRequest, $response, $post);

        if ($isValid){
            $post = new Post(
                $post->getId(),
                $postRequest->title,
                $postRequest->content,
                $post->getPublishedAt(),
                $postRequest->updatedAt,
            );
            $this->postRepository->updatePost($post);
            $response->setUpdatedPost($post);
        }

        $updatePostPresenter->present($response);
    }


    public function validateRequest(UpdatePostRequest $postRequest, UpdatePostResponse $response):bool
    {
        try {
            Assert::lazy()
                ->that($postRequest->title, 'title')->notEmpty('error-notEmpty')->string('error-string')
                ->that($postRequest->content, 'content')->notEmpty('error-notEmpty')->string('error-string')
                ->verifyNow();
            return true;
        } catch (LazyAssertionException $e) {
            foreach ($e->getErrorExceptions() as $error) {
                $response->addError($error->getPropertyPath(), $error->getMessage());
            }
            return false;
        }

    }
    public function validatePost(UpdatePostRequest $postRequest, UpdatePostResponse $response, ?Post &$post):bool
    {
        if($postRequest->id === null){
            return false;
        }
        $post = $this->postRepository->getPostById($postRequest->id);
        if($post === null ){
            $response->addError('post_id', 'unknown post with id = ' . $postRequest->id );
            return false;
        }

        $response->setCurrentPost($post);
        return true;
    }
}
