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

    public function indexArticle(array $requestParams)
    {
        $perPage = $requestParams['per_page'] ?? 10;
        $page = $requestParams['page'] ?? 1;
        $filters = [
            'column' => $requestParams['filter_column'] ?? null,
            'value'  => $requestParams['filter_value'] ?? null,
        ];

        return $this->articleRepository->index($filters, $perPage, $page);
    }
    public function storeArticle(ArticleDTO $articleDTO)
    {
        $article = $this->articleRepository->store($articleDTO);
        return $article;
    }
}
