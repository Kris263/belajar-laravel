<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class OuterController extends Controller
{
    public function index() {
        $artikel = Artikel::get();
        return view('home', [
            'title' => 'SELURUH ARTIKEL',
            'artikel' => $artikel
        ]);
    }

    public function article_detail($id) {
        return view('article', [
            'title' => 'article ' . $id,
            'article' => Artikel::find($id)
        ]); 
    }
}