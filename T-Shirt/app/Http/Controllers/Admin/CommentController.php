<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderByDesc('created_at')->get();

        return view('admin.comments.list', [
            'title' => 'Shop quần áo',
            'comments' => $comments,
        ]);
    }

    public function destroy($id){
        $comment = Comment::find($id);

        if($comment){
            $comment->delete();
            return redirect()->back()->with('success', 'Xóa bài viết thành công!');
        }
        else{
            return redirect()->back()->with('error', 'Xóa bài viết không thành công!');
        }
    }
}
