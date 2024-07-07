<?php

namespace App\Console\Commands;

use App\Mail\DailyArticleCountMail;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDailyNewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-daily-news-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Article count send on admin e-mail';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $articleCount = Article::whereDate('created_at', Carbon::yesterday())->get()->count();

        Mail::to('admin@mail.com')->send(new DailyArticleCountMail($articleCount));
    }
}
