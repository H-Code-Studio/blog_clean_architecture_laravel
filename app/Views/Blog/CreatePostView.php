<?php



namespace App\Views\Blog;

use App\ViewModels\Blog\CreatePostJsonViewModel;
use Domain\SharedKernel\Service\SerializerInterface;
use Illuminate\Http\JsonResponse;
class CreatePostView
{

    public function generateView(CreatePostJsonViewModel $viewModel, SerializerInterface $serializer)
    {
        return new JsonResponse($viewModel->toArray($serializer));
    }
}
