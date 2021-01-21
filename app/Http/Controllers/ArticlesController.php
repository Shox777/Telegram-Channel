<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class ArticlesController extends Controller
{

    public function index()
    {
        return view('articles.index', [
            'articles' => Article::latest()->get()
        ]);
    }
// End of INDEX
    public function show(Article $id)
    {
        return view('articles.show', ['article' => $id]);
    }
    
// End of SHOW
    public function create()
    {
        return view('articles.create');
    }
// End of Create
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'image' => 'max:500000',
        ]);
        $input = [
            'title' => request('title'),
            'excerpt' => request('excerpt'),
            'image' => request('image')->store('images', 'public'),
        ];

        switch ($request->input('action')) {
            case 'submit':
                $this->sentTelegram($input);
                break;
            case 'save':
                $input['status'] = 1;
                break;
        }

        Article::create($input);

        return redirect('/articles');
    }
    /**
     * Send Telegram
     */
    public function sentTelegram($input)
    {
        $text = "<b>What is new today?</b>\n\n" 
        . $input['title'] . "\n"
        . $input['excerpt'];
        
        Telegram::sendPhoto([
            'chat_id' => config('telegram.channel.id'),
            'photo' => InputFile::createFromContents(file_get_contents(public_path('uploads/' .  $input['image'])), 'file.png'),
            'parse_mode' => 'HTML',
            'caption' => $text
        ]);

        // Telegram::sendMessage([
        //     'chat_id' => config('telegram.channel.id'),
        //     'parse_mode' => 'HTML',
        //     'text' => $text
        // ]);
    }
}
