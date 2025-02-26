<?php

namespace App\Repositories\Interfaces;

use App\DTOs\ArticleDTO;
use App\Models\Article;

interface ArticleRepositoryInterface
{
    public function store(ArticleDTO $articleDTO): Article;
}
