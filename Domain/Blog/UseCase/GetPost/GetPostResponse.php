<?php 

namespace Domain\Blog\UseCase\GetPost;

class GetPostResponse
{
    private $request;


    public function setRequest(GetPostRequest $getPostRequest): void
    {
        $this->request = $getPostRequest;
    }

    
}