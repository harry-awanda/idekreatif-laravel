<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class categoriesController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $title = 'Categories';
    $categories = Categories::all();
    return view('categories.index',compact('title','categories'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      "category_name" => 'required',
  ]);
  
  Categories::create($request->all());
  return redirect()->route('categories.index')->with('success','Data berhasil disimpan!');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $data_categories = Categories::find($id);
        $request->validate([
            "category_name" => 'required'
        ]);
        
        $data_categories->update($request->all());
        return redirect()->route('categories.index')->with('success','Data berhasil disimpan!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $categories = Categories::find($id);
    $categories->delete();
    return redirect()->route('categories.index')->with('success','Data berhasil dihapus!');
  }
}
