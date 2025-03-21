<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;
use App\DTOs\CommentDTO;
use Illuminate\Pagination\LengthAwarePaginator;

class CommentRepository implements CommentRepositoryInterface
{
    public function store(CommentDTO $commentDTO): Comment
    {
        return Comment::create((array) $commentDTO)->refresh();
    }

    public function update(int $id, CommentDTO $commentDTO): Comment
    {
        $comment = Comment::findOrFail($id);
        $comment->update((array) $commentDTO);
        return $comment;
    }

    public function index(int $article_id, int $perPage, int $page): LengthAwarePaginator
    {
        return Comment::where('article_id', $article_id)->paginate($perPage, ['*'], 'page', $page);
    }

    public function findById(int $id): ?Comment
    {
        return Comment::find($id);
    }

    public function delete(int $id): bool
    {
        return Comment::destroy($id) > 0;
    }
}
