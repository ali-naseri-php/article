<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    


    /**
     * تعیین اینکه آیا کاربر می‌تواند یک مقاله را ویرایش کند.
     */
    public function update(User $user, Article $article): bool
    {
        return $user->id === $article->user_id ;
    }

   


}
