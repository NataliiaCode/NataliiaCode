<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = [
            [
                'title' => 'Новина 1',
                'content' => 'Текст першої новини.',
                'date' => '2023-10-26'
            ],
            [
                'title' => 'Новина 2',
                'content' => 'Текст другої новини.',
                'date' => '2023-10-25'
            ],
        ];

        return view('news', compact('news'));
    }
}
