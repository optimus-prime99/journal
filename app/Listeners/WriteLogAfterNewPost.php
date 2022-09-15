<?php

namespace App\Listeners;

use App\Events\NewPost;
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
     * @param  \App\Events\NewPost  $event
     * @return void
     */
    public function handle(NewPost $event)
    {
        //
        sleep(2);

        $fileName ='Create_post_' .$event->post->id .'.txt' ;
        $data = 'Newly created post: ' .$event->post->name . ' with ID: ' .$event->post->id;
//        File::put(public_path('/txt' .$fileName), $data);
//        Storage::put(public_path('/txt' .$fileName), $data);
        Storage::disk('local')->put($fileName, $data);

        return true;



    }
}
