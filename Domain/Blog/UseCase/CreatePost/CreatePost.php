<?php

namespace Domain\Blog\UseCase\CreatePost;

use Assert\Assert;
use Assert\LazyAssertionException;
use Domain\Blog\Entity\Post;
use Domain\Blog\UseCase\CreatePost\CreatePostRequest;
use Domain\Blog\UseCase\CreatePost\CreatePostResponse;
use Domain\Blog\UseCase\CreatePost\CreatePostPresenterInterface;
use Domain\Framework\Laravel9\Repository\PostRepositoryInterface;
use Seat\SharedKernel\Service\IdGenerator;

class CreatePost {

    private $postRepository;
    private $idGenerator;

    public function __construct(PostRepositoryInterface $postRepository, IdGenerator $idGenerator)
    {
        $this->postRepository = $postRepository;
        $this->idGenerator = $idGenerator;
    }
    public function execute(CreatePostRequest $postRequest, CreatePostPresenterInterface $createPostPresenter) :void
    {
        $response = new CreatePostResponse();
        $this->validate( $postRequest, $response);

        $createPostPresenter->present($response);
    }

    public function validate(CreatePostRequest $postRequest, CreatePostResponse $createPostResponse)
    {
        $isValid = $this->validateRequest($postRequest, $createPostResponse);
        if ($isValid) {
            $this->save($postRequest, $createPostResponse);
        }
    }



    public function validateRequest(CreatePostRequest $PostRequest, CreatePostResponse $response) :bool
    {
        try {
            Assert::lazy()
                ->that($PostRequest->title, 'title')->notEmpty('error-notEmpty')->string('error-string')
                ->that($PostRequest->content, 'content')->notEmpty('error-notEmpty')->string('error-string')
                ->verifyNow();
            return true;
        } catch (LazyAssertionException $e) {
            foreach ($e->getErrorExceptions() as $error) {
                $response->addError($error->getPropertyPath(), $error->getMessage());
            }
            return false;
        }
    }

    public function save(CreatePostRequest $postRequest, CreatePostResponse $createPostResponse)
    {
        $Post = new Post(
            $this->idGenerator->next(),
            $postRequest->title,
            $postRequest->content,
            $postRequest->publishedAt,
            $postRequest->updatedAt,
        );
        $this->postRepository->createPost($Post);
        $createPostResponse->setPost($Post);
    }
}
