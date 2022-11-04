<?php

namespace App\Jobs;

use App\Models\ActionLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveDeletePostLogs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        dd($post);
        $id = $this->id;
        $clientIP = request()->ip();
//        $data = (string) $post->post;
        $action = ActionLog::create([
            'action' => 'Delete post',
            'post_id' => $id,
            'post_data' => null,
            'user_ip' => $clientIP,
        ]);


        return true;


    }
}
