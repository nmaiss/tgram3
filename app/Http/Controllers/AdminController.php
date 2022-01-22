<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
      //$channel = new Channel;
      //return view('channels.admin', ['data' => $channel->all()->where('valid', '0')]);
      $categories = Category::all();
      $data = Channel::all()->where('valid', '0');
      return view('channels.admin', compact('categories', 'data'));
    }

    public function accept(Request $req){
      $channel = Channel::find($req->input('id'));
        $file = $req->file('image');
        $destinationPath = 'channels';
        $file->move($destinationPath, $channel->url.'.jpeg');
        $channel->valid = true;
        $channel->quality = true;
        $channel->description = $req->input('description');
        $channel->name = $req->input('name');
        $channel->members = $req->input('members');

        $channel->save();

        return redirect()->route('admin');
    }

    public function reject($id){
        Channel::find($id)->delete();
        return redirect()->route('admin');
    }
}
