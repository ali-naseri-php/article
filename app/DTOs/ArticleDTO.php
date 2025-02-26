<?php

namespace App\DTOs;

class ArticleDTO
{
    public string $title;
    public string $content;
    public int $user_id;

    public function __construct(string $title, string $content, int $user_id)
    {
        $this->title   = $title;
        $this->content = $content;
        $this->user_id = $user_id;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['title'],
            $data['content'],
            $data['user_id']
        );
    }
}
