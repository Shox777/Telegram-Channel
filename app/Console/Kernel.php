<?php

namespace App\Console;

use App\Models\Article;
use GuzzleHttp\Psr7\Request;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {

            $articles = Article::where('status', 1)->get();

            foreach ($articles as $key => $value) {

                info(public_path('uploads/' .  $value->image));
                
                $text = "<b>What is new today?</b>\n\n" 
                        . $value->title . "\n"
                        . $value->excerpt;
                Telegram::sendPhoto([
                    'chat_id' => config('telegram.channel.id'),
                    'photo' => InputFile::createFromContents(file_get_contents(public_path('uploads/' .  $value->image)), 'file.png'),
                    'parse_mode' => 'HTML',
                    'caption' => $text
                ]);
                $value->update(['status' => 0]);
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
