<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Channel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function store(Request $req) {
    $file = $req->file('image');
    $destinationPath = 'categories';
    $file->move($destinationPath, $file->getClientOriginalName());
    Category::create([
    'name' => $req->input('name'),
    'url' => $req->input('url'),
    'promoted' => 'niketh',
    'image' => $file->getClientOriginalName(),
]);
    return redirect()->route('admin');
  }

  public function delete($id) {
    $category = Category::find($id);
    $category->delete();
    return redirect()->route('admin');
  }

  public function index($url) {
    $category = Category::where('url', $url)->first();
    $channels = $category->channels()->where('valid', '1')->get()->sortByDesc('members');
    $promoted = Channel::where('url', $category->promoted)->first();
    return view('category', compact('category', 'channels', 'promoted'));
  }
}
