<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs=Blog::latest()->with('category.category')->paginate(5);
        
        return view('blogs.index', compact('blogs'));
    }

}