<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index()
    {
        $categories = Category::get();
        return view('category.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('category.create');
    }
}
