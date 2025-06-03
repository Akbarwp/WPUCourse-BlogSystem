<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    private $colors = ["red", "orange", "amber", "yellow", "lime", "green", "emerald", "teal", "cyan", "sky", "blue", "indigo", "violet", "purple", "fuchsia", "pink", "rose", "slate", "gray", "zinc", "neutral", "stone",];

    public function index()
    {
        $categories = Category::latest()->filter(request(['search']))->paginate(10)->withQueryString();
        return view('dashboard.category.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('dashboard.category.show', compact('category'));
    }

    public function create()
    {
        $colors = $this->colors;
        return view('dashboard.category.create', compact('colors'));
    }

    public function store(CategoryCreateRequest $request)
    {
        Category::create($request->validated());
        return to_route('category')->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        $colors = $this->colors;
        return view('dashboard.category.edit', compact('category', 'colors'));
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update($request->validated());
        return to_route('category')->with('success', 'Category updated successfully');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return to_route('category')->with('success', 'Category deleted successfully');
    }
}
