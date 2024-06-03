<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\SendDailyNewsCommand;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

/*Artisan::command('app:send-daily-news-command', function () {

})->everyMinute();*/

Schedule::command(SendDailyNewsCommand::class)->everyMinute();
