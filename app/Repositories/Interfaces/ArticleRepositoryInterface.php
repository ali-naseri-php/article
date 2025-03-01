<?php

namespace App\Repositories\Interfaces;

use App\DTOs\ArticleDTO;
use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

interface ArticleRepositoryInterface
{
    public function store(ArticleDTO $articleDTO): Article;

    public function update(int $id, ArticleDTO $articleDTO): Article;
    public function index(array $filters, int $perPage, int $page):LengthAwarePaginator;
}
