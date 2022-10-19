<?php

namespace App\Listeners;

use App\Events\UpdatePost;
use App\Models\ActionLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class WriteLogAfterUpdatePost
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param \App\Events\UpdatePost $event
     * @return void
     */
//    public function handle(UpdatePost $event)
//    {
//        $fileName = 'Update_post_' . $event->post->id . '.txt';
//        $data = 'Newly Updated post: ' . $event->post->name . ' with ID: ' . $event->post->id;
//        Storage::disk('local')->put($fileName, $data);
//
//        return true;
//    }

    public function handle(UpdatePost $event)
    {
        $clientIP = request()->ip();
//        $data = (string) $event->post;
//        dd($data);
        $action = ActionLog::create([
            'action' => 'Update post',
            'post_id' => $event->post->id,
            'post_data' => (string) $event->post,
            'user_ip' => $clientIP,
        ]);


        return true;
    }
}
