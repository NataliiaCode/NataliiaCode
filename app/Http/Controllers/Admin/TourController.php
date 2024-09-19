<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::with('category')->get();
        return  view('admin.tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.tours.create', compact('categories'));
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
            'name' => 'required|min:3',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tour = Tour::create($request->all());

        if ($request->image) {

            $image = 'storage/' . $request->file('image')->store('public/images');
            // $request->merge(['image' => $image]);

            $tour->image = $image;
            $tour->save();
        }



        return redirect()->route('tours.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    // public function show(Tour $tour)
    // {
    //     // return view('tours.show', compact('tour'));
    //     $tour = Tour::with('reviews')->find($tour->id);

    //     return view('admin.tours.show', compact('tour')); // Правильний шлях до шаблону
    // }

    public function show(Tour $tour)
    {
        if (Auth::check()) { // Перевірка авторизації
            $tour = Tour::with('reviews')->find($tour->id);
            return view('admin.tours.show', compact('tour'));
        } else {
            // Якщо користувач не авторизований, перенаправляємо на сторінку авторизації
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tour $tour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('tours.index');
    }
}
