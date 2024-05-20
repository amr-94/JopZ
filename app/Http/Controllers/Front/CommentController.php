<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Jop;
use App\Notifications\CommentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CommentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function store(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);
        $jop = Jop::where('slug', $id)->first();

        if ($request->hasfile('comment_file')) {
            $filename = time() . '.' . $request->comment_file->extension();
            $request->comment_file->move(public_path('files/comment/', $filename));
        }
        if ($request->comment_file !== null && $request->comment_file !== $jop->comment->file) {
            File::delete(public_path('files/comment/' . $jop->comment->file));
        }
        $comment = $request->comment;
        $jop->comments()->create($request->all());
        $jop->user->notify(new CommentNotification($jop, $comment));
        return redirect()->back();
    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}