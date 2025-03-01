<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Models\Article;
use App\DTOs\ArticleDTO;
use Illuminate\Pagination\LengthAwarePaginator;

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
    public function update(int $id, ArticleDTO $articleDTO): Article
    {
        $article = Article::findOrFail($id);

        $article->update([
            'title'   => $articleDTO->title,
            'content' => $articleDTO->content,
        ]);

        return $article;
    }
    public function index(array $filters, int $perPage, int $page):LengthAwarePaginator
    {
        $query = Article::query();

        // اعمال فیلتر در صورت وجود مقدار
        if (!empty($filters['column']) && !empty($filters['value'])) {
            $query->where($filters['column'], $filters['value']);
        }

        return $query->paginate($perPage, ['*'], 'page', $page);
    }
}

