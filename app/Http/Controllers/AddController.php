<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function index() {

      //$MadelineProto = new \danog\MadelineProto\API('session.madeline');
      //$MadelineProto->start();
      //$me = $MadelineProto->channels->getFullChannel(['channel' => "@durov",]);
      //$me = $MadelineProto->getSelf();
      //$MadelineProto->messages->sendMessage(['peer' => '@danogentili', 'message' => "Hi!\nThanks for creating MadelineProto! <3"]);
      //$MadelineProto->channels->joinChannel(['channel' => '@MadelineProto']);
      //$me = $MadelineProto->getPwrChat(-100214891824);
      //var_dump($me);

      $categories = Category::all();
      return view('channels.add', compact('categories'));
    }
}
