<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\FeedbackCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('feedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $categories = FeedbackCategory::all();
        if(Auth::user()->role_as == '1'){
            return view('admin.feedback.create', compact('categories' ,'id'));
        }else{
            return view('feedback.create', compact('categories' ,'id'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $feedback = new Feedback();
        $feedback->title = $request->title;
        $feedback->discription = $request->discription;
        $feedback->category_id = $request->category_id;
        $feedback->user_id = Auth::user()->id;
        $feedback->product_id = $id;
        $insert = $feedback->save();
        if($insert){
            if(Auth::user()->role_as == '1'){
                return redirect()->route('feedback.index');
            }else{
                return redirect()->route('product.index');
            }
            
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedback::find($id);
        $categories = FeedbackCategory::all();
        if(Auth::user()->role_as == '1'){
        return view('admin.feedback.edit', compact('feedback','categories'));
        }else{
            return view('feedback.edit', compact('feedback','categories'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedback = Feedback::find($id);
        $feedback->title = $request->title;
        $feedback->discription = $request->discription;
        $feedback->category_id = $request->category_id;
        $feedback->user_id = Auth::user()->id;
        $update = $feedback->update();
        if($update){
            return redirect()->route('feedback.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedback::find($id);
        $feedback->delete();

        return redirect()->back()->with('success', 'Feedback Deleted Successfully!');
    }


    public function voteup(Request $request, $id) {

        $request->validate([
            'vote' => 'required'
        ]);
      
     $data = Feedback::find($id);
     $data->vote_up =  $data->vote_up +1;
     $data->vote =  $data->vote_up +1;
     $data->save();

     return response()->json(['success' => 'Feedback updated successfully']);
    }

    public function votedown(Request $request, $id) {

        $request->validate([
            'vote' => 'required'
        ]);
      
     $data = Feedback::find($id);
     $data->vote_down =  $data->vote_down + 1;
     $data->vote =  $data->vote -1;
     $data->save();

     return response()->json(['success' => 'Feedback updated successfully']);
    }


}
