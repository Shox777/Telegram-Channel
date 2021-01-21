<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('bots')) { // if have bots table in db?
            $bots = DB::table('bots')->first();
            if ($bots) {
                config([
                    'telegram.channel.id' => $bots->channelID,
                    'telegram.bots.mybot.token' => $bots->botToken
                ]);
            }
        }
        // dd(config('telegram.channel'));

    }
}
