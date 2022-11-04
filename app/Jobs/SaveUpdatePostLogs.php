<?php

namespace App\Jobs;

use App\Models\ActionLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveUpdatePostLogs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $post;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        //
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        dd($post);
        $post = $this->post;
        $clientIP = request()->ip();
//        $data = (string) $post->post;
        $action = ActionLog::create([
            'action' => 'Update post',
            'post_id' => $post->id,
            'post_data' => (string) $post,
            'user_ip' => $clientIP,
        ]);


        return true;


    }
}
