<?php

namespace App\Services;

use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\DTOs\CommentDTO;

class CommentService
{
    public function __construct(protected CommentRepositoryInterface $commentRepository) {}

    public function index(int $article_id, array $requestParams)
    {
        return $this->commentRepository->index(
            $article_id,
            $requestParams['per_page'] ?? 10,
            $requestParams['page'] ?? 1
        );
    }

    public function store(CommentDTO $commentDTO)
    {
        return $this->commentRepository->store($commentDTO);
    }

    public function update(int $id, CommentDTO $commentDTO)
    {
        return $this->commentRepository->update($id, $commentDTO);
    }

    public function delete(int $id)
    {
        return $this->commentRepository->delete($id);
    }
}
