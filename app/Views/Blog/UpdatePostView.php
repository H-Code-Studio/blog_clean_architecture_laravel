<?php



namespace App\Views\Blog;

use App\ViewModels\Blog\UpdatePostJsonViewModel;
use Domain\SharedKernel\Service\SerializerInterface;
use Illuminate\Http\JsonResponse;

class UpdatePostView
{
    public function generateView(UpdatePostJsonViewModel $viewModel, SerializerInterface $serializer)
    {
        return new JsonResponse($viewModel->toArray($serializer));
    }
}
