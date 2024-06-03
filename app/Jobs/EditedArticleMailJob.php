<?php

namespace App\Jobs;

use App\Mail\EditedArticleMail;
use App\Mail\NewArticleMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EditedArticleMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private int $articleId;

    public function __construct($id)
    {
        $this->articleId = $id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('fake@mail.com')->send(new EditedArticleMail($this->articleId));
    }
}
