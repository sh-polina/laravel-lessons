<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ArticleDeleterJob implements ShouldQueue
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
        $article = Article::find($this->articleId);
        $article->delete();
    }
}
