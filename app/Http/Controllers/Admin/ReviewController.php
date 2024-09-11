<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return  view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'author' => 'required|string|min:2|max:32',
            'comment' => 'required|string|min:5|max:255',
            'rating' => 'required|integer|min:0|max:5',


        ]);
        //створення нової моделі 
        $review = new Review();
        $review->author = $request->author;
        $review->comment = $request->comment;
        $review->rating = $request->rating;
        $review->save();


        return redirect()->route('reviews.index');
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
    public function edit(Review $review)

    {
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {

        $request->validate([
            'author' => 'required|string|min:2|max:32',
            'comment' => 'required|string|min:5|max:255',


            'rating' => 'required|integer|min:0|max:5',

        ]);
        $review->author = $request->author;
        $review->comment = $request->comment;
        $review->rating = $request->rating;
        $review->save();
        return redirect()->route('reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {

        $review->delete();
        return redirect()->route('reviews.index');
    }
}
