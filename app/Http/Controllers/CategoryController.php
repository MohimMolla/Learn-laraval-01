<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['cats'] = Category::paginate(10);
        return view('categories.all',$data);
        // return view("categories.all",$data);
        // dd(Category::all());
    //   echo "Category mathode called";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect("category")->with("success", "Successfully created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $cat = Category::all();
        dd($cat);
        // dd(Category::find($category)->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $cat = Category::find($category)?->first();
        return view('categories.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->name=$request->name;
        if($category->save()){
            return redirect()->route('category.index')->with('info', 'Category updated successfully');

        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
       if(Category::destroy($category->id)){
        return redirect('category')->with('warning', 'Category deleted successfully');
       }
    }
}
