<?php


namespace App\ViewModels\Blog;

use Domain\SharedKernel\Service\Serializer;

class UpdatePostJsonViewModel
{

    public int $statusCode;
    public bool $postUpdated = false;
    public array $post = [];
    public array $errors = [];

    public function toArray(Serializer $serializer)
    {
       return $serializer->serialize($this);
    }
}
