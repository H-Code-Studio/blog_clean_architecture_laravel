<?php 



namespace Domain\Blog\UseCase\GetPost;
use Domain\Blog\UseCase\GetPost\GetPostResponse;


interface GetPostPresenterInterface {
    public function present(GetPostResponse $getPostResponse): void;
}