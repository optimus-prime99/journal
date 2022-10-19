<?php

namespace App\Listeners;

use App\Events\DeletePost;
use App\Models\ActionLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class WriteLogAfterDeletePost
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\DeletePost $event
     * @return void
     */
//    public function handle(DeletePost $event)
//    {
//        //
//        $fileName = 'Delete_post_' . $event->id . '.txt';
//        $data = 'Newly deleted post ' . 'with ID: ' . $event->id;
//        Storage::disk('local')->put($fileName, $data);
//
//        return true;
//    }

    public function handle(DeletePost $event)
    {
        //
        $clientIP = request()->ip();
//        dd($clientIP);
//        $data = (string) $event->post;
//        dd($data);
        $action = ActionLog::create([
            'action' => 'Delete post',
            'post_id' => $event->id,
            'post_data' => null,
            'user_ip' => $clientIP,
        ]);


        return true;
    }
}
