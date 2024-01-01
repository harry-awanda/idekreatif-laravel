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

    if ($category = Categories::create($request->all())) {
      return redirect()->route('categories.index')->with('success', 'Berhasil menyimpan data!');
    } else {
      return redirect()->route('categories.index')->with('error', 'Gagal menyimpan data.');
    }
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
    if (!$data_categories) {
      return redirect()->route('categories.index')->with('error', 'Data tidak ditemukan.');
    }
    $request->validate([
      "category_name" => 'required'
    ]);
    if ($data_categories->update($request->all())) {
      return redirect()->route('categories.index')->with('success', 'Berhasil memperbarui data!');
    } else {
      return redirect()->route('categories.index')->with('error', 'Gagal memperbarui data.');
    }
}

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $categories = Categories::find($id);
    if (!$categories) {
      return redirect()->route('categories.index')->with('error', 'Data tidak ditemukan.');
    }
    if ($categories->delete()) {
      return redirect()->route('categories.index')->with('success', 'Berhasil menghapus data!');
    } else {
      return redirect()->route('categories.index')->with('error', 'Gagal menghapus data.');
    }
}
}
