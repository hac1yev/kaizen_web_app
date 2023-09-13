<?php

namespace App\Http\Controllers\Back\CommentController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function commentListIndex(){
        $comments = Comment::orderBy('id','DESC')->get();
        return view('back.comments.list',compact('comments'));
    }
    public function commentEdit(Request $request){
        $comment = Comment::find($request->id);
        if(!$comment){
            return response()->json('0');
        }
        $array = array();
        $user = $comment->getUser->fullname;
        $post = $comment->getPost()->title;
        array_push($array,$comment,$user,$post);
        return $array ?? response()->json('0');
    }
    public function commentEditPost(Request $request){
        $request->validate([
           'id'=>'required',
           'comment'=>'required',
        ]);
        $comment = Comment::find($request->id);
        if(!$comment){
            return redirect()->back()->with('error',true);
        }
        $comment->comment = $request->comment;
        return redirect()->back()->with($comment->save() ? 'success' : 'error',true);
    }
    public function commentStatus(Request $request){
        $comment = Comment::find($request->id);
        if(!$comment){
            return response()->json('0');
        }
        $comment->status = $comment->status == '1' ? '0' : '1';
        return $comment->save() ? response()->json('1') : response()->json('0');
    }
    public function commentDelete(Request $request){
        $comment = Comment::find($request->id);
        if(!$comment){
            return response()->json('0');
        }
        return $comment->delete() ? response()->json('1') : response()->json('0');
    }
}
