<?php

namespace App\DTOs;

class CommentDTO
{
    public function __construct(
        public string $content,
        public int $user_id,
        public int $article_id
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['content'],
            $data['user_id'],
            $data['article_id']
        );
    }
}
