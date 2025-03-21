<?php

namespace App\Repositories\Interfaces;

use App\DTOs\CommentDTO;
use App\Models\Comment;
use Illuminate\Pagination\LengthAwarePaginator;

interface CommentRepositoryInterface
{
    public function store(CommentDTO $commentDTO): Comment;
    public function update(int $id, CommentDTO $commentDTO): Comment;
    public function index(int $article_id, int $perPage, int $page): LengthAwarePaginator;
    public function findById(int $id): ?Comment;
    public function delete(int $id): bool;
}
