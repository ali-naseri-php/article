<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Models\Article;
use App\DTOs\ArticleDTO;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function store(ArticleDTO $articleDTO): Article
    {
        return Article::create([
            'title'   => $articleDTO->title,
            'content' => $articleDTO->content,
            'user_id' => $articleDTO->user_id,
        ]);
    }
}

