<?php

namespace App\Jobs;

use App\Events\NewPost;
use App\Models\ActionLog;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveActLogs implements ShouldQueue
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
        dd($post);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($post)
    {
        dd($post);
//        $clientIP = request()->ip();
//        $data = (string) $event->post;
//        dd($data);
//        $action = ActionLog::create([
//            'action' => 'Create post',
//            'post_id' => $post->post->id,
//            'post_data' => (string) $post->post,
//            'user_ip' => $clientIP,
//        ]);


        return true;


    }
}
