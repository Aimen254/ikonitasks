<?php

namespace App\Http\Controllers;
use App\Models\FeedbackCategory;
use Illuminate\Http\Request;

class FeedbackCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = FeedbackCategory::all();
        return view('admin.feedbackcategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.feedbackcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new FeedbackCategory();
        $category->name = $request->name;
        $insert = $category->save();
        if($insert){
            return redirect()->route('feebackcategory.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = FeedbackCategory::all();
        return view('admin.feedbackcategory.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories = FeedbackCategory::find($id);
        $categories->name = $request->name;
        $update = $categories->update();
        if($update){
            return redirect()->route('feebackcategory.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = FeedbackCategory::find($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category Deleted Successfully!');
    }
}
