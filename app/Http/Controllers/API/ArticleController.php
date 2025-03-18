<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\PaginateRequest;
use App\Http\Requests\Article\StoreArticleRequest;
use App\DTOs\ArticleDTO;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index(PaginateRequest $request)
    {

        $articles = $this->articleService->indexArticle($request->validated());
        return ArticleResource::collection($articles->items())
            ->additional([
                'meta' => [
                    'current_page' => $articles->currentPage(),
                    'total' => $articles->total(),
                    'per_page' => $articles->perPage(),
                    'last_page' => $articles->lastPage(),
                    'next_page_url' => $articles->nextPageUrl(),
                    'prev_page_url' => $articles->previousPageUrl(),
                ]
            ]);
    }
    public function update(UpdateArticleRequest $request, int $id): JsonResponse
    {

        $article = Article::findOrFail($id);

        $validated = $request->validated();

        $articleDTO = ArticleDTO::fromArray([
            'title'   => $validated['title'],
            'content' => $validated['content'],
            'user_id' => $article->user_id,
        ]);
        $updatedArticle = $this->articleService->updateArticle($id, $articleDTO);

        return response()->json([
            'message' => 'مقاله با موفقیت اپدیت شد',
            'data' => new ArticleResource($updatedArticle),
        ], 201);
    }
    public function store(StoreArticleRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;

        $articleDTO = ArticleDTO::fromArray($validated);
        $article = $this->articleService->storeArticle($articleDTO);

        return response()->json([
            'message' => 'مقاله با موفقیت ایجاد شد',
            'data' => new ArticleResource($article),
        ], 201);
    }
}
