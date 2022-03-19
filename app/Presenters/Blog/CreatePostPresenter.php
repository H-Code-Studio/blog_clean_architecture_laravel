<?php

namespace App\Presenters\Blog;

use App\ViewModels\Blog\CreatePostJsonViewModel;
use Domain\Blog\UseCase\CreatePost\CreatePostPresenterInterface;
use Domain\Blog\UseCase\CreatePost\CreatePostResponse;

class CreatePostPresenter implements CreatePostPresenterInterface
{
    private $viewModel;

    public function present(CreatePostResponse $response): void
    {
        $this->viewModel = new CreatePostJsonViewModel();
        if (!$response->notification()->hasError()) {
            $this->viewModel->postSaved = $response->getPost() !== null;
            $this->viewModel->post = [
                'id' => $response->getPost()->getId(),
                'title' => $response->getPost()->getTitle(),
                'content' => $response->getPost()->getContent(),
                'publishedAt' => $response->getPost()->getPublishedAt()->format('Y-m-d H:i:s'),
                'updated_at' => $response->getPost()->getUpdatedAt()->format('Y-m-d H:i:s'),
            ];
            $this->viewModel->statusCode = 200;
        }else{
            $this->viewModel->postSaved = false;
            $this->viewModel->errors = $response->notification()->getErrors();
            $this->viewModel->statusCode = 500;
        }
    }
    public function viewModel()
    {
        return $this->viewModel;
    }
}
