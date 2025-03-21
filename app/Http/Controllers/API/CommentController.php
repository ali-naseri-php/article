<?php

namespace App\Http\Controllers\API;

use App\DTOs\CommentDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\PaginateRequest;
use App\Http\Requests\Article\StoreCommentRequest;
use App\Http\Requests\Article\UpdateCommentRequest;
use App\Http\Resources\CommentResource;

use App\Services\CommentService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CommentController  extends Controller
{
    protected CommentService $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    // نمایش کامنت‌های یک مقاله
    public function index(int $article_id, PaginateRequest $request): AnonymousResourceCollection
    {
        $comments = $this->commentService->index($article_id, $request->all());

        return CommentResource::collection($comments);
    }

    // ذخیره کامنت جدید
    public function store(StoreCommentRequest $request): CommentResource
    {
        $commentDTO = CommentDTO::fromArray($request->validated());
        $comment = $this->commentService->store($commentDTO);

        return new CommentResource($comment);
    }

    // آپدیت کامنت
    public function update(int $id, UpdateCommentRequest $request): CommentResource
    {
        $commentDTO = CommentDTO::fromArray($request->validated());
        $comment = $this->commentService->update($id, $commentDTO);

        return new CommentResource($comment);
    }

    // حذف کامنت
    public function destroy(int $id): \Illuminate\Http\Response
    {

        $this->commentService->delete($id);

        return response()->noContent();
    }
}
