<?php


namespace App\ViewModels\Blog;

use Domain\SharedKernel\Service\Serializer;
use Symfony\Polyfill\Intl\Normalizer\Normalizer;

class CreatePostJsonViewModel
{

    public int $statusCode;
    public bool $postSaved = false;
    public array $post = [];
    public array $errors = [];

    public function toArray(Serializer $serializer)
    {
       return $serializer->serialize($this);
    }
}
