<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $reviews = Review::all();
        $reviews = Review::with('tour')->get(); // Завантаження турів для кожного відгуку
        return  view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.reviews.create');
        $tours = Tour::all(); // Отримайте всі тури з бази даних
        return view('admin.reviews.create', compact('tours')); // Передайте $tours до шаблону
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'tour_id' => 'required|exists:tours,id',
        ]);

        // Створюємо новий об'єкт Review
        $review = new Review($validatedData);

        // Отримати ім'я користувача, який створив огляд
        $review->author = auth()->user()->name;

        // Встановлюємо користувача, що залишив відгук
        $review->user_id = Auth::id();

        $review->save();

        return redirect()->route('tour.show', $review->tour); // Перенаправлення на сторінку туру
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
