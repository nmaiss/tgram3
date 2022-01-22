<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Category;
use danog\MadelineProto\Exception;
use Hu\MadelineProto\Facades\Messages;
use Hu\MadelineProto\MadelineProto;
use Hu\MadelineProto\TelegramObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChannelController extends Controller
{

    public function submit(Request $req){
        $category = Category::where('url', $req->input('category'))->first();

        //$/MadelineProto = new \danog\MadelineProto\API('session.madeline');
        //$MadelineProto->start();
        //$me = $MadelineProto->channels->getFullChannel(['channel' => "@durov",]);
        $validatedData = $req->validate([
            'url' => 'required|unique:channels|max:255'

        ]);

        $channel_url = $req->input('url');
        $channel_url = substr(strstr($channel_url, 't.me/'), strlen('t.me/'));
        if ($channel_url == false){
            $channel_url = $req->input('url');
        }
        $channel_url2 = $channel_url;
        $channel_url = substr(strstr($channel_url, '@'), strlen('@'));
        if ($channel_url == false){
            $channel_url = $channel_url2;
        }
        /*try {
            //$channelid = $id = yield $MadelineProto->getID("@" . $channel_url);
            //$messages = $MadelineProto->getFullInfo("@" . $channel_url);
            $messages = $MadelineProto->channels->getFullChannel(['channel' => "@" . $channel_url,], ['async' => false]);
        } catch (\Exception $e){
            return redirect('/add')->with('error', "Il y a eu un problème... Vérifiez bien l'url du canal. ");
        }*/
        $channel = new Channel();
        $channel->url = $channel_url;
        //$channel->name = $messages['chats']['0']['title'];
        $channel->proposed_description = $req->input('description');
        $channel->name = "t";
        $channel->description = "t";
        $channel->members = "t";
        $channel->verified = "0";
        //$channel->description = $messages['full_chat']['about'];
        //$channel->category = $req->input('category');
        //$channel->members = $messages['full_chat']['participants_count'];
        //$channel->verified = $messages['chats']['0']['verified'];
        $channel->valid = '0';
        //$channel->save();

        $category->channels()->save($channel);

        /*try {
            $info = $MadelineProto->getPropicInfo('t.me/' . $channel_url);
            $MadelineProto->downloadToFile($info, 'channels/' . $channel_url . ".jpeg");
        }catch (\Exception $e){
          return redirect('/add')->with('success', 'Le canal va bientôt être ajouté.');
        }*/

        return redirect('/add')->with('success', 'Le canal va bientôt être ajouté.');
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
              $data = Channel::all();
                  /*$data = Channel::where('valid',  '1')
                    ->where(function($q) use ($query){
                        return $q->where('name', 'like', '%'.$query.'%')
                        ->orWhere('url', 'like', '%'.$query.'%')
                        ->orWhere('description', 'like', '%'.$query.'%')
                        ->orWhere('category', 'like', '%'.$query.'%')
                    })
                    ->orderBy('members', 'desc')
                    ->get();*/

            }
            else
            {
                $data = Channel::all();
            }
            $total_row = $data->count();

            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                         <div class="col-sm-6 pb-4 pt-2 p-2 pb-0 bg-white">
                            <div class="d-flex">
                                <img class="rounded-circle" style="width: 55px; height: 55px;" src="/channels/'.$row->url.'.jpeg">
                                <div class="pl-4">
                                    <h5><strong>'.$row->name.'</strong></h5>
                                    <p><a style="font-size: 15px" target="_blank" href="https://t.me/'.$row->url.'">@'.$row->url.'</a><span class="pl-2">'.$row->members.' membres</span></p>
                                </div>
                            </div>
                            <p>'.$row->description.'</p>
                        </div>
                        ';
                }
            }
            else
            {
                $output = "";
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}
