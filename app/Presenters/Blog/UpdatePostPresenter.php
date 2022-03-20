<?php

namespace App\Presenters\Blog;

use App\ViewModels\Blog\UpdatePostJsonViewModel;
use Domain\Blog\UseCase\UpdatePost\UpdatePostPresenterInterface;
use Domain\Blog\UseCase\UpdatePost\UpdatePostResponse;

class UpdatePostPresenter implements UpdatePostPresenterInterface
{
    private $viewModel;

    public function present(UpdatePostResponse $response): void
    {
        $this->viewModel = new UpdatePostJsonViewModel();
        if (!$response->notification()->hasError()) {
            $this->viewModel->postSaved = $response->getUpdatedPost() !== null;
            $this->viewModel->post = [
                'id' => $response->getUpdatedPost()->getId(),
                'title' => $response->getUpdatedPost()->getTitle(),
                'content' => $response->getUpdatedPost()->getContent(),
                'publishedAt' => $response->getUpdatedPost()->getPublishedAt()->format('Y-m-d H:i:s'),
                'updated_at' => $response->getUpdatedPost()->getUpdatedAt()->format('Y-m-d H:i:s'),
            ];
            $this->viewModel->statusCode = 200;
        }else{
            $this->viewModel->postUpdated = false;
            $this->viewModel->errors = $response->notification()->getErrors();
            $this->viewModel->statusCode = 500;
        }
    }
    public function viewModel()
    {
        return $this->viewModel;
    }
}
