<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel posts melalui Model
        $posts = post::all();

        // Kirim data ke tampilan (view)
        return view('posts.index', compact('posts'));
    }
}