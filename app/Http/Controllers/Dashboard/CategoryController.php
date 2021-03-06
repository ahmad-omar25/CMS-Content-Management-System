<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(8);
        return view('dashboard.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('dashboard.categories.edit');
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
