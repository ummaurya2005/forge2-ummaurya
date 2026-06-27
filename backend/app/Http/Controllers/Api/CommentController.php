<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function index()
    {
        return CommentResource::collection(
            Comment::with('user')
                ->latest()
                ->paginate(10)
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'ticket_id' => 'required|exists:tickets,id',

            'user_id' => 'required|exists:users,id',

            'message' => 'required|string',

            'is_internal' => 'boolean',

            'attachment' => 'nullable|string'

        ]);

        $comment = Comment::create($request->all());

        return response()->json([

            'success' => true,

            'message' => 'Comment Added',

            'data' => new CommentResource($comment->load('user'))

        ], 201);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json([

            'success' => true,

            'message' => 'Comment Deleted'

        ]);
    }
}