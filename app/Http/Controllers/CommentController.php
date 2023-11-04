<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{


    public function addComment(Request $request, $id) {

        $request->validate([
            'comment' => 'required',
            'rating' => 'required'
        ]);

     $data =  Comment::insert([
          'product_id' => $id,
          'comment' => $request->comment,
          'rating' => $request->rating,
          'user_id' => Auth::user()->id,
      ]);

      return redirect('/products');


    }
    public function destroy($id){
        $comments = Comment::find($id);
        $comments->delete();

        return redirect()->back()->with('success', 'Cooments Deleted Successfully!');
    }

    // public function loadComments($id) {

    //     $comments = Comment::where('product_id', $id)->get();
    //     dd($comments);
    //     return response()->json($comments);

    // }



}
