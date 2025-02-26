<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreArticleRequest;
use App\DTOs\ArticleDTO;
use App\Http\Resources\ArticleResource;
use App\Services\ArticleService;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function store(StoreArticleRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;

        $articleDTO = ArticleDTO::fromArray($validated);
        $article    = $this->articleService->storeArticle($articleDTO);

        return response()->json([
            'message' => 'مقاله با موفقیت ایجاد شد',
            'data'    => new ArticleResource($article),
        ], 201);
    }
}
