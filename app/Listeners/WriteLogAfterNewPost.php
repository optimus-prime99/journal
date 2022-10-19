<?php

namespace App\Listeners;

use App\Events\NewPost;
use App\Models\ActionLog;
use Faker\Core\File;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class WriteLogAfterNewPost
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
     * @param \App\Events\NewPost $event
     * @return void
     */
//    public function handle(NewPost $event)
//    {
//        //
//        dd($event);
//        sleep(2);
//
//        $fileName = 'Create_post_' . $event->post->id . '.txt';
//        $data = 'Newly created post: ' . $event->post->name . ' with ID: ' . $event->post->id;
//        Storage::disk('local')->put($fileName, $data);
//
//        return true;
//
//
//    }
    public function handle(NewPost $event)
    {
        $clientIP = request()->ip();
//        $data = (string) $event->post;
//        dd($data);
        $action = ActionLog::create([
            'action' => 'Create post',
            'post_id' => $event->post->id,
            'post_data' => (string) $event->post,
            'user_ip' => $clientIP,
        ]);


        return true;


    }
}
