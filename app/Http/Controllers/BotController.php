<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BotController extends Controller
{
    public function index()
    {
        return view('bot.edit');
    }

    public function update(Request $request)
    {
        DB::table('bots')->where('id', 1)->update([
            'channelName' => $request->channelName,
            'channelID' => $request->channelID,
            'botToken' => $request->botToken
        ]);
        return redirect('/');
    }
}
//TestCredoChannel
//-1001395024178
//1265636303:AAFQ8vDjJJmuJUOOXgSuQLPkuJ7n8Cr-Pg4
