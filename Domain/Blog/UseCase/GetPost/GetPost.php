<?php

namespace Domain\Blog\UseCase\GetPost;
use Domain\Blog\Repository\PostRepositoryInterface;
use Domain\Blog\UseCase\GetPost\GetPostRequest;
use Domain\Blog\UseCase\GetPost\GetPostResponse;

class GetPost 
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }    

    public function execute(GetPostRequest $getPostRequest): void
    {
            $response = new GetPostResponse();
            $response->setRequest($getPostRequest);

            //TODO validate Request

    }

}