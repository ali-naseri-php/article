<?php

namespace App\Services;

use App\Repositories\Interfaces\ArticleRepositoryInterface;
use App\DTOs\ArticleDTO;

class ArticleService
{
    protected ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function storeArticle(ArticleDTO $articleDTO)
    {
        $article = $this->articleRepository->store($articleDTO);
        return $article;
    }
}
