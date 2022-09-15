<?php

namespace App\Listeners;

use App\Events\UpdatePost;
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
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UpdatePost  $event
     * @return void
     */
    public function handle(UpdatePost $event)
    {
        //
        $fileName ='Update_post_' .$event->post->id .'.txt' ;
        $data = 'Newly Updated post: ' .$event->post->name . ' with ID: ' .$event->post->id;
//        File::put(public_path('/txt' .$fileName), $data);
//        Storage::put(public_path('/txt' .$fileName), $data);
        Storage::disk('local')->put($fileName, $data);

        return true;
    }
}
